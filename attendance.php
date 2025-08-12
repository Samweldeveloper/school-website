<?php
$markedAttendance = [];
$studentName = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['attendance'])) {
    $markedAttendance = $_POST['attendance'];
    $studentName = $_POST['student_name'] ?? 'Unknown';

    // Save to file
    if (!empty($markedAttendance)) {
        $file = fopen("attendance_records.csv", "a");
        foreach ($markedAttendance as $entry) {
            // Each entry = Year|Term|Date
            fputcsv($file, [$studentName, $entry]);
        }
        fclose($file);
    }
}

// Define term reporting dates
$termDates = [
    2024 => [
        'Term 1' => '2024-01-08',
        'Term 2' => '2024-05-06',
        'Term 3' => '2024-09-02'
    ],
    2025 => [
        'Term 1' => '2025-01-06',
        'Term 2' => '2025-05-05',
        'Term 3' => '2025-09-01'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simplified Attendance Record</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #1a0000;
      color: white;
      padding: 20px;
    }

    h2 {
      color: #ff3333;
      border-bottom: 2px solid darkred;
    }

    .year-section {
      background-color: #330000;
      margin-bottom: 30px;
      padding: 15px;
      border-radius: 10px;
      border: 1px solid #990000;
    }

    .term-section {
      background-color: #440000;
      margin-top: 10px;
      padding: 10px;
      border-radius: 8px;
      border-left: 5px solid #cc0000;
    }

    label {
      display: block;
      margin: 8px 0;
    }

    input[type="checkbox"] {
      margin-right: 6px;
    }

    .submit-btn {
      margin-top: 20px;
      background-color: #cc0000;
      border: none;
      padding: 10px 20px;
      color: white;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #990000;
    }

    .result-box {
      background-color: #550000;
      margin-top: 30px;
      padding: 20px;
      border-left: 5px solid red;
    }

    .name-field {
      margin-bottom: 20px;
    }

    .name-field input {
      padding: 8px;
      border-radius: 4px;
      border: none;
      width: 300px;
    }
  </style>
</head>
<body>

<h2>Student Attendance Record (2024 - 2025)</h2>

<form method="POST">
  <div class="name-field">
    <label>Student Name:
      <input type="text" name="student_name" required>
    </label>
  </div>

  <?php foreach ($termDates as $year => $terms): ?>
    <div class="year-section">
      <h3>Year: <?= $year ?></h3>
      <?php foreach ($terms as $term => $date): 
        $value = "$year|$term|$date";
        $checked = in_array($value, $markedAttendance) ? "checked" : "";
      ?>
        <div class="term-section">
          <label>
            <input type="checkbox" name="attendance[]" value="<?= $value ?>" <?= $checked ?>>
            <?= $term ?> Reporting Date: <?= $date ?>
          </label>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>

  <button type="submit" class="submit-btn">Save Attendance</button>
</form>

<?php if (!empty($markedAttendance)): ?>
  <div class="result-box">
    <h3>Marked Attendance for <?= htmlspecialchars($studentName) ?>:</h3>
    <ul>
      <?php foreach ($markedAttendance as $entry): 
        list($yr, $tm, $dt) = explode('|', $entry);
      ?>
        <li><strong><?= $yr ?> - <?= $tm ?>:</strong> <?= $dt ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

</body>
</html>
