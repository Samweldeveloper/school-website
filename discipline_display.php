<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_incident'])) {
    // Sanitize inputs
    $student_name = htmlspecialchars($_POST['student_name']);
    $incident_date = htmlspecialchars($_POST['incident_date']);
    $description = htmlspecialchars($_POST['description']);
    $action_taken = htmlspecialchars($_POST['action_taken']);
    $recorded_by = htmlspecialchars($_POST['recorded_by']);

    // Save to CSV file
    $entry = [
        date("Y-m-d H:i:s"),
        $student_name,
        $incident_date,
        $description,
        $action_taken,
        $recorded_by
    ];

    $file = fopen("disciplinary_records.csv", "a");
    fputcsv($file, $entry);
    fclose($file);
} else {
    // If accessed directly without submission, redirect to form
    header("Location: discipline_form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submitted Record</title>
  <style>
    body {
      background-color: #1a0000;
      color: #ffffff;
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    .submitted-box {
      margin-top: 25px;
      padding: 20px;
      background-color: #550000;
      border: 1px solid darkred;
      border-left: 5px solid red;
      max-width: 700px;
      margin: auto;
      border-radius: 8px;
    }

    .submitted-box strong {
      color: #ff8080;
    }

    .submitted-box p {
      margin-bottom: 10px;
    }

    a.back-link {
      display: block;
      margin: 30px auto 0;
      text-align: center;
      background-color: #cc0000;
      color: white;
      padding: 10px;
      width: 150px;
      border-radius: 5px;
      text-decoration: none;
    }

    a.back-link:hover {
      background-color: #990000;
    }
  </style>
</head>
<body>
    
<div class="section">
  <button onclick="window.print()">🖨️ Print</button>

<div class="submitted-box">
  <h2>Submitted Disciplinary Record</h2>
  <p><strong>Student:</strong> <?= $student_name ?></p>
  <p><strong>Date:</strong> <?= $incident_date ?></p>
  <p><strong>Incident:</strong> <?= $description ?></p>
  <p><strong>Action Taken:</strong> <?= $action_taken ?></p>
  <p><strong>Recorded By:</strong> <?= $recorded_by ?></p>

  <a href="discipline_form.php" class="back-link">← Back to Form</a>
</div>

</body>
</html>
