<?php
// Check if the form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $project = $_POST['project'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate the form data (you can add more validation rules here)
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(['error' => 'Please fill in all required fields']);
        exit;
    }

    // Send the email using PHP's mail function (you can use a mail library like PHPMailer instead)
    $to = 'your_email@example.com'; // replace with your email address
    $subject = 'Contact Form Submission';
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nProject: $project\nSubject: $subject\nMessage: $message";
    $headers = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email;

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(['success' => 'Message sent successfully']);
    } else {
        echo json_encode(['error' => 'Failed to send message']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>