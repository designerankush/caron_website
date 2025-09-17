<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';    // PHPMailer
$jobs = include __DIR__ . '/data/jobs.php';

function clean_str($v){ return trim(filter_var($v, FILTER_SANITIZE_STRING)); }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: careers.php'); exit; }

$jobId = intval($_POST['job_id'] ?? 0);
$slug  = '';
$job   = null;
foreach($jobs as $j){ if($j['id'] === $jobId){ $job=$j; $slug=$j['slug']; break; } }
if (!$job) { header('Location: careers.php'); exit; }

$full  = clean_str($_POST['full_name'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$phone = clean_str($_POST['phone'] ?? '');
$url   = trim($_POST['profile_url'] ?? '');
$msg   = trim($_POST['message'] ?? '');

$errors = [];
if (strlen($full) < 3) $errors[] = 'name';
if (!$email) $errors[] = 'email';
if (!preg_match('/^[0-9+\- ]{10,15}$/', $phone)) $errors[] = 'phone';
if (strlen($msg) < 20) $errors[] = 'message';

$attach = null;
if (!isset($_FILES['resume']) || $_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
  $errors[] = 'resume';
} else {
  $f   = $_FILES['resume'];
  $ext = strtolower(pathinfo($f['name'], PATHINFO_EXTENSION));
  if ($f['size'] > 5*1024*1024 || !in_array($ext, ['pdf','doc','docx'])) {
    $errors[] = 'resume_invalid';
  } else {
    $tmp = sys_get_temp_dir().'/'.uniqid('cv_',true).'.'.$ext;
    if (!move_uploaded_file($f['tmp_name'], $tmp)) $errors[] = 'resume_move';
    else $attach = $tmp;
  }
}

if ($errors) {
  header('Location: career.php?slug='.urlencode($slug).'&status=error#apply'); exit;
}

$mail = new PHPMailer(true);
try {
  // SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp-relay.brevo.com';
    $mail->SMTPAuth = true;
    $mail->Username = '9690ae001@smtp-brevo.com';
    $mail->Password = 'CQGjZSxsU3VO5JfX';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('contact@caroninfotech.com', 'Caron Careers');
    $mail->addAddress('msrivastav118@gmail.com', 'Caron Careers');
    // $mail->addAddress('mps813@gmail.com', 'Caron Careers');
    $mail->addBcc('mps813@gmail.com', 'Caron Careers');

    if ($attach) $mail->addAttachment($attach, $_FILES['resume']['name']);

        $mail->isHTML(true);
        $mail->Subject = 'Job Application: '.$job['title'].' — '.$full;

        $body  = '<h3>New Application</h3>';
        $body .= '<b>Job:</b> '.htmlspecialchars($job['title']).'<br>';
        $body .= '<b>Name:</b> '.htmlspecialchars($full).'<br>';
        $body .= '<b>Email:</b> '.htmlspecialchars($_POST['email']).'<br>';
        $body .= '<b>Phone:</b> '.htmlspecialchars($phone).'<br>';
        if ($url) $body .= '<b>Profile:</b> '.htmlspecialchars($url).'<br>';
        $body .= '<b>Message:</b><br>'.nl2br(htmlspecialchars($msg)).'<br>';

        $mail->Body    = $body;
        $mail->AltBody = strip_tags(str_replace('<br>', "\n", $body));

        $mail->send();
        if ($attach && file_exists($attach)) unlink($attach);
        header('Location: career.php?slug='.urlencode($slug).'&status=success#apply'); exit;

    } catch (Exception $e) {
        if ($attach && file_exists($attach)) unlink($attach);
        header('Location: career.php?slug='.urlencode($slug).'&status=error#apply'); exit;
}
