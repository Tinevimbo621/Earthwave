<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $project = htmlspecialchars($_POST['project']);
    $message = htmlspecialchars($_POST['message']);

    // Recipient email
    $to = "florencechigwida10@gmail.com";
    $subject = "New Quote Request from $name $surname";

    // Email content
    $body = "You have received a new quote request:\n\n";
    $body .= "Name: $name $surname\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Project Type: $project\n";
    $body .= "Project Details:\n$message\n";

    // Headers
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<h2>Thank you! Your quote request has been sent successfully.</h2>";
        echo "<a href='home.html'>Back to Home</a>";
    } else {
        echo "<h2>Sorry, there was an error sending your request. Please try again.</h2>";
        echo "<a href='home.html'>Back to Home</a>";
    }
} else {
    // If the form wasn't submitted properly
    header("Location: home.html");
    exit;
}
?>
