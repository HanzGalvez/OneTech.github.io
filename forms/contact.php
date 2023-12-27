<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sanitize and retrieve form data
  $to = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
  $headers = "From: " . $to; // You can customize this as needed

  // Send email
  $mailResult = mail($to, $subject, $message, $headers);

  // Check if the email was sent successfully
  if ($mailResult) {
    echo "Email sent successfully.";
  } else {
    echo "Error sending email.";
  }
} else {
  // If the form is not submitted, display an error or redirect as needed
  echo "Form not submitted.";
}
