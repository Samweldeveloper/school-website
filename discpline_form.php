<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Disciplinary Records Form</title>
  <style>
    body {
      background-color: #1a0000;
      color: #ffffff;
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    .section {
      background-color: #330000;
      border: 1px solid #990000;
      padding: 20px;
      border-radius: 10px;
      max-width: 750px;
      margin: auto;
    }

    form {
      background-color: #220000;
      padding: 15px;
      border-radius: 8px;
      border: 1px solid #aa0000;
      margin-top: 20px;
    }

    label {
      display: block;
      margin-top: 10px;
      color: #ffc2c2;
    }

    input, textarea, select {
      width: 100%;
      padding: 8px;
      background-color: #fff0f0;
      border: 1px solid #990000;
      border-radius: 4px;
      color: black;
    }

    button {
      margin-top: 15px;
      background-color: #cc0000;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background-color: #990000;
    }
  </style>
</head>
<body>

<div class="section">
  <button onclick="window.print()">🖨️ Print</button>
  <h2>Disciplinary Records</h2>

  <form action="discipline_display.php" method="POST">
    <h4>Add New Incident:</h4>

    <label>Student Name:</label>
    <input type="text" name="student_name" required>

    <label>Date of Incident:</label>
    <input type="date" name="incident_date" required>

    <label>Description of Incident:</label>
    <textarea name="description" rows="4" required></textarea>

    <label>Action Taken:</label>
    <select name="action_taken" required>
      <option value="">--Select Action--</option>
      <option value="Verbal Warning">Verbal Warning</option>
      <option value="Written Warning">Written Warning</option>
      <option value="1-day Suspension">1-day Suspension</option>
      <option value="2-day Suspension">2-day Suspension</option>
      <option value="Expulsion">Expulsion</option>
      <option value="Other">Other</option>
    </select>

    <label>Recorded By:</label>
    <input type="text" name="recorded_by" required placeholder="e.g. Teacher, Admin">

    <button type="submit" name="submit_incident">Submit Incident</button>
  </form>
</div>

</body>
</html>
