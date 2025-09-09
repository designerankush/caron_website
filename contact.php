<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer's classes
require 'vendor/autoload.php'; // Adjust path if needed

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp-relay.brevo.com';
    $mail->SMTPAuth = true;
    $mail->Username = '9690ae001@smtp-brevo.com';
    $mail->Password = 'CQGjZSxsU3VO5JfX';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('contact@caroninfotech.com', 'Caroninfotech');
    $mail->addAddress('msrivastav118@gmail.com', 'Caron Infotech'); // Add a recipient
    $mail->addBcc('mps813@gmail.com', 'Caron Infotech'); // Add a recipient
    $mail->addBcc('contact@caroninfotech.com', 'Caron Infotech'); // Add a recipient

    $email_content  =   '';
    $email_content  .=  'Full Name: '.$_POST['full-name']. '<br/>';
    $email_content  .=  'Email: '.$_POST['email']. '<br/>';
    $email_content  .=  'Project Type: '.$_POST['project']. '<br/>';
    $email_content  .=  'Mobile: '.$_POST['number']. '<br/>';
    $email_content  .=  'Project Details: '.$_POST['message']. '<br/>';
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Caron infortech contat form query.';
    $mail->Body    =    $email_content;
    $mail->AltBody =    $email_content;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header('Location: https://www.caroninfotech.com/contacts.php');

?>
