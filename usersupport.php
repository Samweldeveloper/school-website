<?php
$conn = new mysqli("localhost", "root", "", "student_registration");
$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);
  $subject = $conn->real_escape_string($_POST['subject']);
  $message = $conn->real_escape_string($_POST['message']);

  if ($name && $email && $subject && $message) {
    $sql = "INSERT INTO support_messages (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";
    if ($conn->query($sql)) {
      $success = "Your message has been sent successfully.";
    } else {
      $error = "Error: " . $conn->error;
    }
  } else {
    $error = "All fields are required.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact IT Support</title>
  <style>
    body { font-family: Arial; background: #f4f4f4; padding: 20px; }
    .container { max-width: 600px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
    h2 { text-align: center; color: #b30000; }
    label { display: block; margin-top: 15px; font-weight: bold; }
    input, textarea { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }
    button { margin-top: 20px; padding: 12px 20px; background-color: #b30000; color: white; border: none; font-size: 16px; border-radius: 5px; cursor: pointer; }
    .message { margin-top: 15px; font-weight: bold; }
    .success { color: green; }
    .error { color: red; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Contact IT Support</h2>

    <?php if ($success): ?><div class="message success"><?= $success ?></div><?php endif; ?>
    <?php if ($error): ?><div class="message error"><?= $error ?></div><?php endif; ?>

    <form method="post" action="">
      <label>Your Name:</label>
      <input type="text" name="name" required>

      <label>Your Email:</label>
      <input type="email" name="email" required>

      <label>Subject:</label>
      <input type="text" name="subject" required>

      <label>Message:</label>
      <textarea name="message" rows="5" required></textarea>

      <button type="submit">Send Message</button>
    </form>
  </div>
</body>
</html>
