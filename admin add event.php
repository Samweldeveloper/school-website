<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "student_registration");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$success = "";
$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $event_date = $_POST['event_date'];
  $event_name = $conn->real_escape_string($_POST['event_name']);
  $category = $conn->real_escape_string($_POST['category']);
  $term = $_POST['term'];

  if ($event_date && $event_name && $category && $term) {
    $sql = "INSERT INTO events (event_date, event_name, category, term) 
            VALUES ('$event_date', '$event_name', '$category', '$term')";
    if ($conn->query($sql) === TRUE) {
      $success = "Event added successfully.";
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
  <title>Add School Event</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 20px;
    }

    .container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
    }

    h2 {
      text-align: center;
      color: #b30000;
    }

    form label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    form input, form select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      margin-top: 20px;
      padding: 12px 20px;
      background-color: red;
      color: white;
      border: none;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: darkred;
    }

    .message {
      margin-top: 15px;
      font-weight: bold;
      color: green;
    }

    .error {
      color: red;
    }

    .back-link {
      margin-top: 20px;
      display: block;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Add School Event</h2>

  <?php if ($success): ?>
    <div class="message"><?= $success ?></div>
  <?php elseif ($error): ?>
    <div class="message error"><?= $error ?></div>
  <?php endif; ?>

  <form method="post">
    <label for="event_date">Event Date:</label>
    <input type="date" name="event_date" required>

    <label for="event_name">Event Name:</label>
    <input type="text" name="event_name" required>

    <label for="category">Category:</label>
    <select name="category" required>
      <option value="">-- Select Category --</option>
      <option value="Admin">Admin</option>
      <option value="Academics">Academics</option>
      <option value="Sports">Sports</option>
      <option value="Clubs">Clubs</option>
      <option value="Exams">Exams</option>
      <option value="Holiday">Holiday</option>
      <option value="Cultural">Cultural</option>
      <option value="Religious">Religious</option>
    </select>

    <label for="term">Term:</label>
    <select name="term" required>
      <option value="">-- Select Term --</option>
      <option value="Term 1">Term 1</option>
      <option value="Term 2">Term 2</option>
      <option value="Term 3">Term 3</option>
    </select>

    <button type="submit">Add Event</button>
  </form>

  <a href="events.php" class="back-link">📅 View Event Calendar</a>
</div>

</body>
</html>
