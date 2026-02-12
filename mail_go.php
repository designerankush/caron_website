<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: contacts.php');
  exit;
}

function ci_post($key, $default = '') {
  return isset($_POST[$key]) ? trim((string)$_POST[$key]) : $default;
}

// Basic fields
$fullName = ci_post('full-name');
$email    = ci_post('email');
$project  = ci_post('project');
$number   = ci_post('number');
$message  = ci_post('message');

// Basic validation (keep simple)
if ($fullName === '' || $email === '' || $message === '') {
  header("Location: contacts.php?status=error");
  exit;
}

$mail = new PHPMailer(true);

try {
  // Config (from config.php via bootstrap.php)
  $mailHost = ci_config('mail.host');
  $mailPort = (int) ci_config('mail.port', 587);
  $mailUser = ci_config('mail.username');
  $mailPass = ci_config('mail.password');
  $mailEnc  = ci_config('mail.encryption', 'tls');

  $fromEmail = ci_config('mail.from_email');
  $fromName  = ci_config('mail.from_name', 'Caron Infotech');
  $replyTo   = ci_config('mail.reply_to', $fromEmail);

  $toEmail   = ci_config('mail.to_email', $fromEmail);
  $toName    = ci_config('mail.to_name', 'Caron Infotech');

  // Server settings
  $mail->isSMTP();
  $mail->Host       = $mailHost;
  $mail->SMTPAuth   = true;
  $mail->Username   = $mailUser;
  $mail->Password   = $mailPass;
  $mail->Port       = $mailPort;

  // encryption
  if ($mailEnc === 'ssl') {
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  } else {
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // tls
  }

  // Recipients
  $mail->setFrom($fromEmail, $fromName);
  $mail->addAddress($toEmail, $toName);
  $mail->addReplyTo($replyTo, $fromName);

  // Content
  $mail->isHTML(true);
  $mail->Subject = 'Caron Infotech contact form query';

  $email_content  = '';
  $email_content .= 'Full Name: ' . htmlspecialchars($fullName) . '<br/>';
  $email_content .= 'Email: ' . htmlspecialchars($email) . '<br/>';
  $email_content .= 'Project Type: ' . htmlspecialchars($project) . '<br/>';
  $email_content .= 'Mobile: ' . htmlspecialchars($number) . '<br/>';
  $email_content .= 'Project Details: ' . nl2br(htmlspecialchars($message)) . '<br/>';

  $mail->Body    = $email_content;
  $mail->AltBody = strip_tags(str_replace('<br/>', "\n", $email_content));

  $mail->send();

  // SUCCESS -> Thank you page
  header("Location: thank-you.php");
  exit;

} catch (Exception $e) {
  // FAILURE -> existing popup on contacts page
  header("Location: contacts.php?status=error");
  exit;
}
