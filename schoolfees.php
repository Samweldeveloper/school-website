<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>School Fee Structure - Foothill High School</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    .container {
      background: white;
      max-width: 800px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
      padding: 30px;
    }

    .school-header {
      text-align: center;
      border-bottom: 2px solid #ccc;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    .school-header h2 {
      margin: 0;
      color: #b30000;
    }

    .school-header p {
      margin: 4px 0;
      font-size: 14px;
    }

    .tabs {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .tabs button {
      padding: 10px 20px;
      border: none;
      border-bottom: 3px solid transparent;
      background: none;
      font-weight: bold;
      cursor: pointer;
      color: #b30000;
    }

    .tabs button.active {
      border-bottom: 3px solid #b30000;
    }

    .term-section {
      display: none;
    }

    .term-section.active {
      display: block;
    }

    h3 {
      text-align: center;
      color: #b30000;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
    }

    th {
      background-color: #ffe6e6;
    }

    .total {
      background-color: #fff0f0;
      font-weight: bold;
    }

    .footer {
      text-align: center;
      margin-top: 40px;
      font-size: 13px;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="school-header">
      <h2>Foothill High School</h2>
      <p>P.O. Box 21-4534 Nyeri</p>
      <p>Phone: +254 77-9344-23 | Email: <a href="mailto:foothill@gmail.com">foothill@gmail.com</a></p>
      <p><em>"Shaping the Future with Knowledge"</em></p>
    </div>

    <div class="tabs">
      <button class="tab-btn active" onclick="showTerm('term1')">Term 1</button>
      <button class="tab-btn" onclick="showTerm('term2')">Term 2</button>
      <button class="tab-btn" onclick="showTerm('term3')">Term 3</button>
    </div>

    <!-- TERM 1 -->
    <div id="term1" class="term-section active">
      <h3>Term 1 - Fee Structure</h3>
      <table>
        <tr><th>Fee Item</th><th>Amount (KES)</th></tr>
        <tr><td>Tuition</td><td>10,000</td></tr>
        <tr><td>Boarding</td><td>5,000</td></tr>
        <tr><td>Meals</td><td>3,000</td></tr>
        <tr><td>Development Fund</td><td>2,000</td></tr>
        <tr><td>Library & Lab</td><td>1,500</td></tr>
        <tr><td>Medical Fee</td><td>1,000</td></tr>
        <tr><td>Exam Fee</td><td>1,000</td></tr>
        <tr><td>Insurance</td><td>500</td></tr>
        <tr><td>Activity Fee</td><td>1,000</td></tr>
        <tr class="total"><td>Total</td><td>25,000</td></tr>
      </table>
    </div>

    <!-- TERM 2 -->
    <div id="term2" class="term-section">
      <h3>Term 2 - Fee Structure</h3>
      <table>
        <tr><th>Fee Item</th><th>Amount (KES)</th></tr>
        <tr><td>Tuition</td><td>8,000</td></tr>
        <tr><td>Meals</td><td>3,000</td></tr>
        <tr><td>Exam Fee</td><td>1,000</td></tr>
        <tr><td>Medical Fee</td><td>1,000</td></tr>
        <tr><td>Activity Fee</td><td>2,000</td></tr>
        <tr class="total"><td>Total</td><td>15,000</td></tr>
      </table>
    </div>

    <!-- TERM 3 -->
    <div id="term3" class="term-section">
      <h3>Term 3 - Fee Structure</h3>
      <table>
        <tr><th>Fee Item</th><th>Amount (KES)</th></tr>
        <tr><td>Tuition</td><td>6,000</td></tr>
        <tr><td>Meals</td><td>2,000</td></tr>
        <tr><td>Closing Exam</td><td>500</td></tr>
        <tr class="total"><td>Total</td><td>8,500</td></tr>
      </table>
    </div>

    <div class="footer">
      &copy; 2025 Foothill High School. All rights reserved.
    </div>
  </div>

  <script>
    function showTerm(termId) {
      document.querySelectorAll('.term-section').forEach(section => {
        section.classList.remove('active');
      });
      document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
      });
      document.getElementById(termId).classList.add('active');
      event.target.classList.add('active');
    }
  </script>
</body>
</html>
