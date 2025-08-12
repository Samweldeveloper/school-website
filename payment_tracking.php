<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'student_registration';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM payments ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - View Payments</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background: #f4f4f4;
    }
    .admin-box {
      max-width: 900px;
      margin: auto;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 8px #ccc;
    }
    h2 {
      color: #b30000;
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #ffe6e6;
      color: #b30000;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>
<div class="admin-box">
  <h2>📋 All Student Payment Records</h2>

  <?php if ($result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Term</th>
          <th>Item</th>
          <th>Fee (KES)</th>
          <th>Paid (KES)</th>
          <th>Balance (KES)</th>
          <th>Method</th>
          <th>Payment Date</th>
          <th>Recorded At</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['student_name']) ?></td>
            <td><?= $row['term'] ?></td>
            <td><?= $row['item'] ?></td>
            <td><?= number_format($row['amount']) ?></td>
            <td><?= number_format($row['paid']) ?></td>
            <td><?= number_format($row['balance']) ?></td>
            <td><?= $row['method'] ?></td>
            <td><?= $row['payment_date'] ?></td>
            <td><?= $row['created_at'] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p style="text-align: center; color: gray;">No payment records found.</p>
  <?php endif; ?>
</div>
</body>
</html>
