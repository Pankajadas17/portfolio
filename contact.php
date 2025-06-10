<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "Pankaja1503@gmail.com";  // Your email
    $subject = "Portfolio Contact Form";
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
}
?>
