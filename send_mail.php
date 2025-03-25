<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    if (!$email) {
        die("Invalid email format.");
    }

    $to = "a.alifonso@aol.com";  // 🔹 Change this to your email
    $subject = "New Contact Form Submission from " . $name;
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Error sending message. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
