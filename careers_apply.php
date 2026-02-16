<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap.php';

$jobs = include __DIR__ . '/data/jobs.php';

function ci_clean_str($v) {
  $v = is_string($v) ? $v : '';
  $v = trim($v);
  $v = strip_tags($v);
  return $v;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: careers.php');
  exit;
}

$jobId = (int) ($_POST['job_id'] ?? 0);
$slug  = '';
$job   = null;

foreach ($jobs as $j) {
  if ((int)$j['id'] === $jobId) {
    $job = $j;
    $slug = $j['slug'] ?? '';
    break;
  }
}

if (!$job || !$slug) {
  header('Location: careers.php');
  exit;
}

$full  = ci_clean_str($_POST['full_name'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$phone = ci_clean_str($_POST['phone'] ?? '');
$url   = trim((string)($_POST['profile_url'] ?? ''));
$msg   = trim((string)($_POST['message'] ?? ''));

$errors = [];
if (mb_strlen($full) < 3) $errors[] = 'name';
if (!$email) $errors[] = 'email';
if (!preg_match('/^[0-9+\- ]{10,15}$/', $phone)) $errors[] = 'phone';
if (mb_strlen($msg) < 20) $errors[] = 'message';

/**
 * Resume upload
 */
$attach = null;
$attachName = null;

if (!isset($_FILES['resume']) || ($_FILES['resume']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
  $errors[] = 'resume';
} else {
  $f   = $_FILES['resume'];
  $ext = strtolower(pathinfo($f['name'], PATHINFO_EXTENSION));

  if (($f['size'] ?? 0) > 5 * 1024 * 1024 || !in_array($ext, ['pdf','doc','docx'], true)) {
    $errors[] = 'resume_invalid';
  } else {
    $tmp = rtrim(sys_get_temp_dir(), '/').'/'.uniqid('cv_', true).'.'.$ext;
    if (!move_uploaded_file($f['tmp_name'], $tmp)) {
      $errors[] = 'resume_move';
    } else {
      $attach = $tmp;
      $attachName = $f['name'];
    }
  }
}

if ($errors) {
  if ($attach && file_exists($attach)) unlink($attach);
  header('Location: career.php?slug=' . urlencode($slug) . '&status=error#apply');
  exit;
}

$mail = new PHPMailer(true);

try {
  /**
   * Load mail config from config.php via ci_config()
   */
  $mailHost = ci_config('mail.host');
  $mailPort = (int) ci_config('mail.port', 587);
  $mailUser = ci_config('mail.username');
  $mailPass = ci_config('mail.password');
  $mailEnc  = ci_config('mail.encryption', 'tls'); // tls|ssl

  // From / Reply-to
  $fromEmail = ci_config('mail.from_email');
  $fromName  = ci_config('mail.from_name', 'Caron Careers');
  $replyTo   = ci_config('mail.reply_to', $fromEmail);

  /**
   * Careers recipients (add these in config.php)
   * - mail.careers_to_email
   * - mail.careers_to_name
   * - mail.careers_bcc (array or comma string)
   */
  $toEmail = ci_config('mail.careers_to_email', ci_config('mail.to_email', $fromEmail));
  $toName  = ci_config('mail.careers_to_name', 'Caron Careers');

  $bccList = ci_config('mail.careers_bcc', []);
  if (is_string($bccList)) {
    $bccList = array_filter(array_map('trim', explode(',', $bccList)));
  }
  if (!is_array($bccList)) $bccList = [];

  // SMTP
  $mail->isSMTP();
  $mail->Host     = $mailHost;
  $mail->SMTPAuth = true;
  $mail->Username = $mailUser;
  $mail->Password = $mailPass;
  $mail->Port     = $mailPort;

  if ($mailEnc === 'ssl') {
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  } else {
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  }

  // Recipients
  $mail->setFrom($fromEmail, $fromName);
  $mail->addAddress($toEmail, $toName);
  $mail->addReplyTo($replyTo, $fromName);

  foreach ($bccList as $bcc) {
    if (filter_var($bcc, FILTER_VALIDATE_EMAIL)) {
      $mail->addBcc($bcc, 'Caron Careers');
    }
  }

  if ($attach) {
    $mail->addAttachment($attach, $attachName ?: 'resume');
  }

  // Email content
  $mail->isHTML(true);
  $mail->Subject = 'Job Application: ' . ($job['title'] ?? 'Career') . ' — ' . $full;

  $body  = '<h3>New Application</h3>';
  $body .= '<b>Job:</b> ' . htmlspecialchars($job['title'] ?? '') . '<br>';
  $body .= '<b>Name:</b> ' . htmlspecialchars($full) . '<br>';
  $body .= '<b>Email:</b> ' . htmlspecialchars((string)($_POST['email'] ?? '')) . '<br>';
  $body .= '<b>Phone:</b> ' . htmlspecialchars($phone) . '<br>';
  if (!empty($url)) $body .= '<b>Profile:</b> ' . htmlspecialchars($url) . '<br>';
  $body .= '<b>Message:</b><br>' . nl2br(htmlspecialchars($msg)) . '<br>';

  $mail->Body    = $body;
  $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $body));

  $mail->send();

  if ($attach && file_exists($attach)) unlink($attach);

  header('Location: career.php?slug=' . urlencode($slug) . '&status=success#apply');
  exit;

} catch (Exception $e) {
  if ($attach && file_exists($attach)) unlink($attach);

  header('Location: career.php?slug=' . urlencode($slug) . '&status=error#apply');
  exit;
}
