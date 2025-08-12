<?php
$conn = new mysqli('localhost', 'root', '', 'student_registration');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$submitted = false;
$report_data = [];

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

        $report_data[] = [
            'subject' => $subjects[$i],
            'cat' => $cats[$i],
            'exam' => $exams[$i],
            'total' => $totals[$i],
            'grade' => $grades[$i]
        ];
    }

    $submitted = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Foothill High School - Academic Report</title>
  <style>
    body { font-family: Arial; background: #f4f4f4; padding: 30px; }
    .container { max-width: 1000px; margin: auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
    .header { text-align: center; }
    .header h2 { color: #b30000; }
    .motto { font-style: italic; color: #cc0000; font-size: 16px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
    th { background-color: #ffe6e6; }
    input[type="text"], input[type="number"], input[type="date"] { width: 100%; padding: 5px; text-align: center; }
    textarea { width: 100%; height: 70px; padding: 10px; }
    .row-group { display: flex; gap: 10px; margin-top: 10px; }
    .row-group input { flex: 1; }
    .submit-btn { margin-top: 20px; padding: 10px 20px; font-weight: bold; background: #cc0000; color: white; border: none; border-radius: 5px; cursor: pointer; }
    .success { background: #d4edda; padding: 10px; margin-top: 10px; border-left: 5px solid green; }
    .print-btn { float: right; margin-top: 10px; }
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

  <h3 style="text-align:center;">Student Academic Report</h3>

  <?php if ($submitted): ?>
    <div class="success">✅ Report saved successfully.</div>
    <button class="submit-btn print-btn" onclick="window.print()">🖨️ Print Report</button>
    <hr>
    <p><strong>Student Name:</strong> <?= htmlspecialchars($student_name) ?></p>
    <p><strong>Admission No:</strong> <?= htmlspecialchars($admission_number) ?></p>
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
          <td><?= $row['subject'] ?></td>
          <td><?= $row['cat'] ?></td>
          <td><?= $row['exam'] ?></td>
          <td><?= $row['total'] ?></td>
          <td><?= $row['grade'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <p><strong>Teacher's Comment:</strong><br><?= nl2br(htmlspecialchars($comments)) ?></p>
    <p><strong>Teacher's Signature:</strong> <?= htmlspecialchars($signature) ?></p>

  <?php else: ?>
    <!-- Entry Form -->
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
      <textarea name="comment" placeholder="Write comment here..."></textarea>

      <div class="row-group">
        <input type="text" name="signature" placeholder="Teacher's Signature" required>
        <input type="date" name="report_date" value="<?= date('Y-m-d') ?>" required>
      </div>

      <button type="submit" class="submit-btn">Save Report</button>
    </form>
  <?php endif; ?>
</div>

<script>
  function calculateGrade(score) {
    if (score >= 80) return "Compitent";
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
        const index = input.dataset.index;
        updateResult(index);
      });
    });
  });
</script>

</body>
</html>
<script>
  function confirmLogout() {
    return confirm("Are you sure you want to logout?");
  }
</script>
 