<?php
$conn = new mysqli('localhost', 'root', '', 'student_registration');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student_name = '';
$admission_number = '';
$report_date = '';
$comments = '';
$signature = '';
$report_data = [];

$sql = "SELECT * FROM academics_reports ORDER BY id DESC LIMIT 8";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $rows = array_reverse($rows); // Keep subject order
    $student_name = $rows[0]['student_name'];
    $admission_number = $rows[0]['admission_number'];
    $report_date = $rows[0]['report_date'];
    $comments = $rows[0]['comment'];
    $signature = $rows[0]['signature'];

    foreach ($rows as $row) {
        $report_data[] = [
            'subject' => $row['subject'],
            'cat' => $row['cat_marks'],
            'exam' => $row['exam_marks'],
            'total' => $row['total'],
            'grade' => $row['grade']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Academic Report</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f9f9f9;
      padding: 30px;
    }
    .container {
      max-width: 1000px;
      margin: auto;
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .header h2 {
      color: #b30000;
      font-size: 28px;
      margin-bottom: 10px;
    }
    .motto {
      font-style: italic;
      color: #cc0000;
      font-size: 16px;
    }
    .print-btn {
      float: right;
      margin-top: -40px;
      padding: 10px 20px;
      background: #b30000;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }
    h3 {
      text-align: center;
      color: #444;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      margin-bottom: 20px;
    }
    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
    }
    th {
      background-color: #ffe6e6;
      color: #b30000;
    }
    p {
      font-size: 16px;
      margin: 8px 0;
    }
    .no-report {
      color: red;
      font-weight: bold;
      text-align: center;
      margin-top: 30px;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="header">
    <h2>FOOTHILL HIGH SCHOOL</h2>
    <p><strong>P.O. Box 21-4534, Nyeri</strong></p>
    <p><strong>Email:</strong> foothill@gmail.com | <strong>Phone:</strong> +254 77-9344-23</p>
    <p class="motto">"Knowledge is Power – Empowering Future Leaders"</p>
  </div>

  <h3>Student Academic Report</h3>

  <?php if ($student_name): ?>
    <button class="print-btn" onclick="window.print()">🖨️ Print Report</button>
    <p><strong>Student Name:</strong> <?= htmlspecialchars($student_name) ?></p>
    <p><strong>Admission Number:</strong> <?= htmlspecialchars($admission_number) ?></p>
    <p><strong>Report Date:</strong> <?= htmlspecialchars($report_date) ?></p>

    <table>
      <thead>
        <tr>
          <th>Subject</th>
          <th>CAT (30)</th>
          <th>Exam (70)</th>
          <th>Total (100)</th>
          <th>Grade</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($report_data as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['subject']) ?></td>
          <td><?= htmlspecialchars($row['cat']) ?></td>
          <td><?= htmlspecialchars($row['exam']) ?></td>
          <td><?= htmlspecialchars($row['total']) ?></td>
          <td><?= htmlspecialchars($row['grade']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <p><strong>Teacher's Comment:</strong><br><?= nl2br(htmlspecialchars($comments)) ?></p>
    <p><strong>Teacher's Signature:</strong> <?= htmlspecialchars($signature) ?></p>

  <?php else: ?>
    <div class="no-report">⚠️ No report found.</div>
  <?php endif; ?>
</div>
</body>
</html>
