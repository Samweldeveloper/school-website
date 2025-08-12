<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Attendance Records</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f5f5;
      padding: 30px;
    }

    h2 {
      text-align: center;
      color: #222;
    }

    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px 15px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #cc0000;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .no-data {
      text-align: center;
      margin-top: 50px;
      color: #666;
    }
  </style>
</head>
<body>

<h2>Admin - Reported Attendance Records</h2>

<?php
$records = [];
if (file_exists("attendance_records.csv")) {
    $file = fopen("attendance_records.csv", "r");
    while (($data = fgetcsv($file)) !== FALSE) {
        $records[] = $data;
    }
    fclose($file);
}
?>

<?php if (!empty($records)): ?>
  <table>
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Year</th>
        <th>Term</th>
        <th>Date Reported</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($records as $record): 
        list($name, $entry) = $record;
        list($year, $term, $date) = explode('|', $entry);
      ?>
        <tr>
          <td><?= htmlspecialchars($name) ?></td>
          <td><?= $year ?></td>
          <td><?= $term ?></td>
          <td><?= $date ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <p class="no-data">No attendance records available.</p>
<?php endif; ?>

</body>
</html>
