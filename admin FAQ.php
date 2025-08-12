<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "student_registration");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Add new FAQ
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_faq'])) {
    $question = $conn->real_escape_string($_POST['question']);
    $answer = $conn->real_escape_string($_POST['answer']);

    if ($question && $answer) {
        $conn->query("INSERT INTO faqs (question, answer) VALUES ('$question', '$answer')");
    }
}

// Delete FAQ
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM faqs WHERE id=$id");
}

// Get all FAQs
$result = $conn->query("SELECT * FROM faqs ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage FAQs</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 30px;
    }

    .container {
      max-width: 900px;
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

    form textarea, form input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #aaa;
    }

    button {
      padding: 10px 20px;
      background-color: red;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    table {
      width: 100%;
      margin-top: 30px;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
    }

    th {
      background: #b30000;
      color: white;
    }

    a.delete {
      color: red;
      text-decoration: none;
    }

    a.delete:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Admin - Manage FAQs</h2>

  <form method="post">
    <label><strong>Question:</strong></label>
    <input type="text" name="question" required>

    <label><strong>Answer:</strong></label>
    <textarea name="answer" rows="4" required></textarea>

    <button type="submit" name="add_faq">Add FAQ</button>
  </form>

  <h3 style="margin-top:40px;">Existing FAQs</h3>
  <table>
    <tr>
      <th>ID</th>
      <th>Question</th>
      <th>Answer</th>
      <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['question']) ?></td>
      <td><?= htmlspecialchars($row['answer']) ?></td>
      <td><a href="?delete=<?= $row['id'] ?>" class="delete" onclick="return confirm('Delete this FAQ?');">Delete</a></td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>

</body>
</html>
