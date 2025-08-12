<?php
$conn = new mysqli("localhost", "root", "", "student_registration");
$result = $conn->query("SELECT * FROM support_messages ORDER BY submitted_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Support Messages</title>
  <style>
    body { font-family: Arial; background: #f4f4f4; padding: 20px; }
    .container { max-width: 1000px; margin: auto; background: white; padding: 25px; border-radius: 10px; }
    h2 { text-align: center; color: #b30000; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    th { background: #b30000; color: white; }
  </style>
</head>
<body>
  <div class="container">
    <h2>📨 IT Support Messages</h2>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Date Submitted</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['subject']) ?></td>
              <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
              <td><?= $row['submitted_at'] ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="6">No support messages yet.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
