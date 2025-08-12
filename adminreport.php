<?php
$conn = new mysqli('localhost', 'root', '', 'student_registration');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $admission_number = $_POST['admission_number'];
    $comments = $_POST['comment'];
    $signature = $_POST['signature'];
    $report_date = $_POST['report_date'];

    $cats = $_POST['cat'];
    $exams = $_POST['exam'];
    $totals = $_POST['total'];
    $grades = $_POST['grade'];
    $subjects = ["English", "Mathematics", "Biology", "Chemistry", "Physics", "Geography", "History", "Business"];

    for ($i = 0; $i < count($subjects); $i++) {
        $stmt = $conn->prepare("INSERT INTO academics_reports (student_name, admission_number, subject, cat_marks, exam_marks, total, grade, comment, signature, report_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiiissss", $student_name, $admission_number, $subjects[$i], $cats[$i], $exams[$i], $totals[$i], $grades[$i], $comments, $signature, $report_date);
        $stmt->execute();
    }

    header("Location: studentseenmarks.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Enter Student Report</title>
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
      position: relative;
    }
    .logout-btn {
      position: absolute;
      top: 20px;
      right: 25px;
      background: #b30000;
      color: white;
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      font-size: 14px;
      transition: background 0.3s ease;
    }
    .logout-btn:hover {
      background: #a00000;
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
    input, textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 15px;
      background: #fffaf9;
    }
    textarea { height: 80px; resize: vertical; }
    .row-group { display: flex; gap: 15px; flex-wrap: wrap; }
    .row-group input { flex: 1; }
    table {
      width: 100%; border-collapse: collapse;
      margin-top: 15px; margin-bottom: 20px;
    }
    th, td {
      border: 1px solid #ddd; padding: 10px; text-align: center;
    }
    th {
      background-color: #ffe6e6; color: #b30000;
    }
    .submit-btn {
      padding: 12px 25px; background: #b30000; color: white;
      font-weight: bold; font-size: 16px;
      border: none; border-radius: 6px;
      cursor: pointer; transition: background 0.3s ease;
    }
    .submit-btn:hover { background: #a00000; }
  </style>
</head>
<body>
<div class="container">
  <!-- Logout button -->
  <a href="homepage.php" class="logout-btn" onclick="return confirmLogout()">Logout</a>

  <div class="header">
    <h2>THE TEACHER PANEL - ENTER STUDENT REPORT</h2>
  </div>

  <form method="POST">
    <div class="row-group">
      <input type="text" name="student_name" placeholder="Student Name" required>
      <input type="text" name="admission_number" placeholder="Admission Number" required>
    </div>

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
        <script>
          const subjects = ["English", "Mathematics", "Biology", "Chemistry", "Physics", "Geography", "History", "Business"];
          subjects.forEach((subject, index) => {
            document.write(`
              <tr>
                <td>${subject}</td>
                <td><input type="number" name="cat[]" class="cat" data-index="${index}" min="0" max="30" required></td>
                <td><input type="number" name="exam[]" class="exam" data-index="${index}" min="0" max="70" required></td>
                <td><input type="text" name="total[]" class="total" data-index="${index}" readonly></td>
                <td><input type="text" name="grade[]" class="grade" data-index="${index}" readonly></td>
              </tr>
            `);
          });
        </script>
      </tbody>
    </table>

    <label>Teacher's Comment:</label>
    <textarea name="comment" required></textarea>

    <div class="row-group">
      <input type="text" name="signature" placeholder="Teacher's Signature" required>
      <input type="date" name="report_date" value="<?= date('Y-m-d') ?>" required>
    </div>

    <button type="submit" class="submit-btn">Save Report</button>
  </form>
</div>

<script>
  function calculateGrade(score) {
    if (score >= 80) return "A";
    else if (score >= 70) return "B";
    else if (score >= 60) return "C";
    else if (score >= 50) return "D";
    else return "E";
  }
  function updateResult(index) {
    const cat = parseFloat(document.querySelector(`.cat[data-index="${index}"]`).value) || 0;
    const exam = parseFloat(document.querySelector(`.exam[data-index="${index}"]`).value) || 0;
    const total = cat + exam;
    document.querySelector(`.total[data-index="${index}"]`).value = total;
    document.querySelector(`.grade[data-index="${index}"]`).value = calculateGrade(total);
  }
  window.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.cat, .exam').forEach(input => {
      input.addEventListener('input', () => {
        updateResult(input.dataset.index);
      });
    });
  });

  function confirmLogout() {
    return confirm("Are you sure you want to logout?");
  }
</script>
</body>
</html>
