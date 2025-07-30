<?php
// Your PHPMailer setup code here...
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Or manual require statements

$mail = new PHPMailer(true);

// ... your form validation logic ...

if (empty($error_message)) {
    try {
        // --- Gmail Server settings ---
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';         // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                     // Enable SMTP authentication
        $mail->Username   = 'natashadownspare@gmail.com';   // Your full Gmail address
        $mail->Password   = 'urdh bcam fncx jbvr';    // The 16-digit App Password you generated
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // --- Recipients ---
        $mail->setFrom('natashadown@gmail.com', 'Website Contact Form'); // Must be your Gmail address
        $mail->addAddress('natashadown@gmail.com', 'Natasha Down');         // The address emails are sent TO
        $mail->addReplyTo($email, $name); // So you can reply directly to the user

        // --- Content ---
        $mail->isHTML(true);
        $mail->Subject = 'New Submission from ' . htmlspecialchars($name);
        $mail->Body    = "Name: " . htmlspecialchars($name) . "<br>Email: " . htmlspecialchars($email) . "<br><br>Message:<br>" . nl2br(htmlspecialchars($message));

        $mail->send();
        echo 'Thank you for your message. We will be in touch with you very soon.';

    } catch (Exception $e) {
        echo "Message could not be sent. Please try again later.";
    }
} else {
    // Show validation errors
    echo $error_message;
}
?>
