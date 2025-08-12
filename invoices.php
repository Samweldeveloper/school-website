<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice - Foothill High School</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f8f8f8;
      padding: 30px;
    }

    .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 25px;
      background: white;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0,0,0,.15);
      border-radius: 10px;
    }

    .invoice-box h2 {
      text-align: center;
      color: #b30000;
    }

    .school-details, .student-details {
      margin-bottom: 20px;
    }

    .school-details p, .student-details p {
      margin: 4px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #ffe6e6;
    }

    .total-row {
      background-color: #fff0f0;
      font-weight: bold;
    }

    .footer {
      margin-top: 40px;
      text-align: right;
    }

    .signature {
      margin-top: 60px;
      text-align: left;
    }

    .print-btn {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #b30000;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .print-btn:hover {
      background-color: #800000;
    }
  </style>
</head>
<body>

  <div class="invoice-box">
    <h2>Foothill High School - Term 1 Invoice</h2>

    <div class="school-details">
      <p><strong>Foothill High School</strong></p>
      <p>P.O. Box 21-4534, Nyeri</p>
      <p>Email: foothill@gmail.com | Phone: +254 77-9344-23</p>
    </div>

    <div class="student-details">
      <p><strong>Student Name:</strong> John Mwangi</p>
      <p><strong>Admission No.:</strong> FH1234</p>
      <p><strong>Class:</strong> Form 3</p>
      <p><strong>Term:</strong> Term 1</p>
      <p><strong>Year:</strong> 2025</p>
    </div>

    <table>
      <thead>
        <tr>
          <th>Fee Item</th>
          <th>Amount (KES)</th>
          <th>Paid</th>
          <th>Balance</th>
          <th>Method</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Tuition</td>
          <td>10,000</td>
          <td>5,000</td>
          <td>5,000</td>
          <td>Bursary</td>
        </tr>
        <tr>
          <td>Boarding</td>
          <td>7,000</td>
          <td>4,000</td>
          <td>3,000</td>
          <td>Bank Cheque</td>
        </tr>
        <tr>
          <td>Meals</td>
          <td>4,000</td>
          <td>2,000</td>
          <td>2,000</td>
          <td>Cash</td>
        </tr>
        <tr>
          <td>Activity Fee</td>
          <td>2,000</td>
          <td>2,000</td>
          <td>0</td>
          <td>Cash</td>
        </tr>
        <tr class="total-row">
          <td>Total</td>
          <td>23,000</td>
          <td>13,000</td>
          <td>10,000</td>
          <td>—</td>
        </tr>
      </tbody>
    </table>

    <div class="footer">
      <p><strong>Outstanding Balance:</strong> KES 10,000</p>
    </div>

    <div class="signature">
      <p>_________________________</p>
      <p><strong>Signature (Accounts)</strong></p>
    </div>
  </div>

  <button class="print-btn" onclick="window.print()">🖨️ Print Invoice</button>

</body>
</html>
