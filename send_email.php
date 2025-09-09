<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['full-name'];
    $email = $_POST['email'];
    $project = $_POST['project'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        // $mail->SMTPDebug = 2;                                   // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.example.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'your_email@example.com';               // SMTP username
        $mail->Password   = 'your_email_password';                  // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('manish@caroninfotech.com');              // Add a recipient
        $mail->addAddress('mukhpal.singh@caroninfotech.com');       // Add another recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<html><body>
                          <h2>Contact Form Submission</h2>
                          <p><strong>Name:</strong> {$name}</p>
                          <p><strong>Email:</strong> {$email}</p>
                          <p><strong>Project Type:</strong> {$project}</p>
                          <p><strong>Mobile:</strong> {$number}</p>
                          <p><strong>Message:</strong><br>{$message}</p>
                          </body></html>";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
?>
