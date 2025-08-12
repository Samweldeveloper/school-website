<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "student_registration");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$termFilter = $_GET['term'] ?? 'All';

if ($termFilter !== 'All') {
  $stmt = $conn->prepare("SELECT * FROM events WHERE term = ?");
  $stmt->bind_param("s", $termFilter);
  $stmt->execute();
  $result = $stmt->get_result();
} else {
  $result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>School Events Calendar</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 20px;
      color: #333;
    }

    .container {
      max-width: 950px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: rgb(236, 71, 0);
      color: white;
    }

    .category {
      font-weight: bold;
      padding: 5px 10px;
      border-radius: 5px;
      color: white;
      background-color: red;
    }

    .filter-box {
      text-align: center;
      margin: 20px 0;
    }

    select {
      padding: 8px 12px;
      font-size: 16px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>School Events & Activities Repository</h1>

    <div class="filter-box">
      <form method="get">
        <label for="term"><strong>Filter by Term:</strong> </label>
        <select name="term" onchange="this.form.submit()">
          <option value="All" <?= $termFilter === 'All' ? 'selected' : '' ?>>All</option>
          <option value="Term 1" <?= $termFilter === 'Term 1' ? 'selected' : '' ?>>Term 1</option>
          <option value="Term 2" <?= $termFilter === 'Term 2' ? 'selected' : '' ?>>Term 2</option>
          <option value="Term 3" <?= $termFilter === 'Term 3' ? 'selected' : '' ?>>Term 3</option>
        </select>
      </form>
    </div>

    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Event</th>
          <th>Category</th>
          <th>Term</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['event_date']) ?></td>
              <td><?= htmlspecialchars($row['event_name']) ?></td>
              <td><span class="category"><?= htmlspecialchars($row['category']) ?></span></td>
              <td><?= htmlspecialchars($row['term']) ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="4">No events found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</body>
</html>
