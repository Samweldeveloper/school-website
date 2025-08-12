<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'student_registration';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_payment'])) {
    $student_name = $_POST['student_name'];
    $term = $_POST['term'];
    $item = $_POST['item'];
    $amount = $_POST['amount'];
    $paid = $_POST['paid'];
    $method = $_POST['method'];
    $payment_date = $_POST['payment_date'];
    $balance = $amount - $paid;

    $stmt = $conn->prepare("INSERT INTO payments (student_name, term, item, amount, paid, method, balance, payment_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssddsis", $student_name, $term, $item, $amount, $paid, $method, $balance, $payment_date);
    $stmt->execute();
    $stmt->close();

    $submitted = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Payment Form</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 30px; background: #f9f9f9; }
    .form-box { max-width: 600px; margin: auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
    h2 { text-align: center; color: #b30000; }
    input, select { width: 100%; padding: 8px; margin: 8px 0; }
    label { font-weight: bold; }
    .success { background-color: #e6ffea; padding: 10px; margin-top: 10px; border-left: 5px solid green; }
    button { background: red; color: white; padding: 10px 20px; border: none; cursor: pointer; font-weight: bold; }
    button:hover { background-color: darkred; }
  </style>
</head>
<body>
<div class="form-box">
  <h2>Student Payment</h2>
  <form method="POST">
    <label>Student Name:</label>
    <input type="text" name="student_name" required>

    <label>Term:</label>
    <select name="term" required>
      <option value="Term 1">Term 1</option>
      <option value="Term 2">Term 2</option>
      <option value="Term 3">Term 3</option>
    </select>

    <label>Fee Item:</label>
    <input type="text" name="item" required placeholder="e.g. Tuition, Meals">

    <label>Fee Amount (KES):</label>
    <input type="number" name="amount" id="amount" required oninput="calculateBalance()">

    <label>Amount Paid (KES):</label>
    <input type="number" name="paid" id="paid" required oninput="calculateBalance()">

    <label>Balance (KES):</label>
    <input type="number" id="balance" readonly style="background: #f0f0f0; font-weight: bold;">

    <label>Payment Method:</label>
    <select name="method" required>
      <option value="Cash">Cash</option>
      <option value="Cheque">Cheque</option>
      <option value="Bursary">Bursary</option>
      <option value="Bank Deposit">Bank Deposit</option>
    </select>

    <label>Date of Payment:</label>
    <input type="date" name="payment_date" required>

    <button type="submit" name="submit_payment">Save Payment</button>
  </form>

  <script>
    function calculateBalance() {
      const amount = parseFloat(document.getElementById('amount').value) || 0;
      const paid = parseFloat(document.getElementById('paid').value) || 0;
      const balance = amount - paid;
      document.getElementById('balance').value = balance >= 0 ? balance : 0;
    }
  </script>

  <?php if ($submitted): ?>
    <div class="success">✅ Payment recorded successfully.</div>
  <?php endif; ?>
</div>
</body>
</html>
