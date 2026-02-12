<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require __DIR__ . '/bootstrap.php';

$mail = new PHPMailer(true);

try {

    /* =========================================
       LOAD CONFIG VALUES
    ========================================= */
    $mailHost = ci_config('mail.host');
    $mailPort = ci_config('mail.port', 587);
    $mailUser = ci_config('mail.username');
    $mailPass = ci_config('mail.password');
    $mailEnc  = ci_config('mail.encryption', 'tls');

    $fromEmail = ci_config('mail.from_email');
    $fromName  = ci_config('mail.from_name', 'Caron Infotech');
    $replyTo   = ci_config('mail.reply_to', $fromEmail);

    /* =========================================
       SERVER SETTINGS
    ========================================= */
    $mail->isSMTP();
    $mail->Host       = $mailHost;
    $mail->SMTPAuth   = true;
    $mail->Username   = $mailUser;
    $mail->Password   = $mailPass;
    $mail->SMTPSecure = $mailEnc === 'ssl'
        ? PHPMailer::ENCRYPTION_SMTPS
        : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $mailPort;

    /* =========================================
       RECIPIENTS
    ========================================= */
    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($fromEmail, $fromName); // send to company email

    if (!empty($replyTo)) {
        $mail->addReplyTo($replyTo);
    }

    /* =========================================
       SANITIZE INPUT
    ========================================= */
    $fullName = htmlspecialchars($_POST['full-name'] ?? '');
    $email    = htmlspecialchars($_POST['email'] ?? '');
    $project  = htmlspecialchars($_POST['project'] ?? '');
    $mobile   = htmlspecialchars($_POST['number'] ?? '');
    $message  = nl2br(htmlspecialchars($_POST['message'] ?? ''));

    /* =========================================
       EMAIL CONTENT
    ========================================= */
    $email_content = "
        <h2>New Contact Form Submission</h2>
        <p><strong>Full Name:</strong> {$fullName}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Project Type:</strong> {$project}</p>
        <p><strong>Mobile:</strong> {$mobile}</p>
        <p><strong>Project Details:</strong><br>{$message}</p>
    ";

    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Query - Caron Infotech';
    $mail->Body    = $email_content;
    $mail->AltBody = strip_tags($email_content);

    $mail->send();
    $status = 'success';

} catch (Exception $e) {
    $status = 'error';
}

header("Location: contacts.php?status=$status");
exit;
