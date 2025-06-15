<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize name
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"), array(" "," "), $name);

    // Validate and sanitize email
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Validate and sanitize message
    $message = trim($_POST["message"]);
    if (empty($name) || empty($message)) {
        echo "Please complete all required fields.";
        exit;
    }

    // Email details
    $to = "Pankaja1503@gmail.com";  // Your receiving email
    $subject = "📬 New Contact Inquiry from Portfolio";

    $email_content = "You have a new message from your portfolio contact form:\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $headers = "From: Portfolio Website <no-reply@yourdomain.com>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you, $name! Your message has been sent successfully.";
    } else {
        echo "Oops! Something went wrong and we couldn’t send your message.";
    }
}
?>
