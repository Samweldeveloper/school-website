<?php
$submitted = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = htmlspecialchars($_POST['student_name']);
    $incident_date = htmlspecialchars($_POST['incident_date']);
    $description = htmlspecialchars($_POST['description']);
    $action_taken = htmlspecialchars($_POST['action_taken']);
    $recorded_by = htmlspecialchars($_POST['recorded_by']);
    $submitted = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Disciplinary Records</title>
  <style>
    body {
      background-color: #f9f9f9;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 40px;
      color: #333;
    }

    .section {
      background-color: #ffffff;
      border: 1px solid #ffdddd;
      border-radius: 12px;
      max-width: 650px;
      margin: auto;
      padding: 35px;
      box-shadow: 0 8px 20px rgba(255, 0, 0, 0.08);
      position: relative;
    }

    h2 {
      text-align: center;
      font-size: 26px;
      color: #cc0000;
      border-bottom: 2px solid #ffcccc;
      padding-bottom: 10px;
      margin-bottom: 25px;
    }

    label {
      display: block;
      margin-top: 16px;
      color: #555;
      font-weight: 500;
    }

    input, textarea, select {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 14px;
      color: #333;
      box-sizing: border-box;
    }

    input:focus, textarea:focus, select:focus {
      border-color: #ff6666;
      outline: none;
      box-shadow: 0 0 6px rgba(255, 102, 102, 0.3);
    }

    button {
      margin-top: 25px;
      background-color: #ff4d4d;
      color: #ffffff;
      border: none;
      padding: 12px 22px;
      border-radius: 6px;
      font-size: 15px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button:hover {
      background-color: #cc0000;
      transform: scale(1.03);
    }

    .print-btn {
      background-color: transparent;
      color: #cc0000;
      border: 2px solid #cc0000;
      padding: 8px 16px;
      border-radius: 6px;
      font-weight: bold;
      font-size: 14px;
      cursor: pointer;
      float: right;
      margin-bottom: 15px;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .print-btn:hover {
      background-color: #cc0000;
      color: white;
    }

    .logout-button {
      position: absolute;
      top: 15px;
      left: 15px;
      background-color: #ff4d4d;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: bold;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: background-color 0.3s;
    }

    .logout-button:hover {
      background-color: #cc0000;
    }

    .logout-button i {
      font-style: normal;
    }

    .submitted-box {
      margin-top: 30px;
      background-color: #fff7f7;
      border-left: 5px solid #ff4d4d;
      padding: 15px 20px;
      border-radius: 8px;
    }

    .submitted-box p {
      margin: 6px 0;
      font-size: 15px;
    }

    .submitted-box strong {
      color: #cc0000;
    }

    @media print {
      .print-btn, button, .logout-button {
        display: none;
      }
    }
  </style>
</head>
<body>

  <div class="section">
    <!-- Logout Button -->
    <a href="homepage.php" class="logout-button">
      <i>🚪</i> Logout
    </a>

    <!-- Print Button -->
    <button onclick="window.print()" class="print-btn">🖨️ Print</button>

    <h2>Disciplinary Records</h2>

    <form method="POST">
      <label for="student_name">Student Name:</label>
      <input type="text" name="student_name" id="student_name" required>

      <label for="incident_date">Date of Incident:</label>
      <input type="date" name="incident_date" id="incident_date" required>

      <label for="description">Description of Incident:</label>
      <textarea name="description" id="description" rows="4" required></textarea>

      <label for="action_taken">Action Taken:</label>
      <select name="action_taken" id="action_taken" required>
        <option value="">--Select--</option>
        <option value="Verbal Warning">Verbal Warning</option>
        <option value="Written Warning">Written Warning</option>
        <option value="1-day Suspension">1-day Suspension</option>
        <option value="2-day Suspension">2-day Suspension</option>
        <option value="Expulsion">Expulsion</option>
        <option value="Other">Other</option>
      </select>

      <label for="recorded_by">Recorded By:</label>
      <input type="text" name="recorded_by" id="recorded_by" required placeholder="e.g. Teacher, Admin">

      <button type="submit">Submit</button>
    </form>

    <?php if ($submitted): ?>
      <div class="submitted-box">
        <p><strong>Student:</strong> <?= $student_name ?></p>
        <p><strong>Date:</strong> <?= $incident_date ?></p>
        <p><strong>Incident:</strong> <?= $description ?></p>
        <p><strong>Action Taken:</strong> <?= $action_taken ?></p>
        <p><strong>Recorded By:</strong> <?= $recorded_by ?></p>
      </div>
    <?php endif; ?>
  </div>

</body>
</html>
