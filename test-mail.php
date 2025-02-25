<?php
$to = "your-email@example.com"; // Replace with your actual email
$subject = "Test Email";
$message = "This is a test email from my website.";
$headers = "From: no-reply@yourdomain.com\r\nReply-To: no-reply@yourdomain.com\r\nContent-Type: text/plain; charset=UTF-8";

if (mail($to, $subject, $message, $headers)) {
    echo "Mail sent successfully!";
} else {
    echo "Mail sending failed!";
}
?>
