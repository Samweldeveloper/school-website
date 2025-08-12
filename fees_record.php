<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Foothill High School - Student Fee Record</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 20px;
    }

    /* Print button styling */
    .print-btn {
      position: fixed;
      top: 20px;
      left: 20px;
      background-color: #b30000;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .print-btn:hover {
      background-color: #990000;
    }

    /* Hide print button when printing */
    @media print {
      .print-btn {
        display: none;
      }
    }

    .container {
      max-width: 1000px;
      margin: auto;
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
    }

    h2 {
      text-align: center;
      color: #b30000;
    }

    .student-info p {
      margin: 5px 0;
      font-weight: bold;
    }

    details {
      margin-top: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 10px;
    }

    summary {
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
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
      vertical-align: top;
    }

    th {
      background-color: #ffe6e6;
      text-align: left;
    }

    .total-row {
      font-weight: bold;
      background-color: #fff0f0;
    }

    .footer-info {
      margin-top: 30px;
      text-align: center;
      font-size: 14px;
      color: #444;
    }

    .footer-info strong {
      color: #b30000;
    }

    .footer-info p {
      margin: 5px;
    }
  </style>
</head>
<body>

  <!-- Print button -->
  <button class="print-btn" onclick="window.print()">🖨 Print</button>

  <div class="container">
    <h2>Foothill High School - Student Fee Record</h2>
    <div class="student-info">
      <p><strong>Name:</strong> John Mwangi</p>
      <p><strong>Admission No.:</strong> FH1234</p>
      <p><strong>Class:</strong> Form 3</p>
      <p><strong>Academic Year:</strong> 2025</p>
    </div>

    <!-- Term 1 -->
    <details open>
      <summary>Term 1 - Fee Details</summary>
      <table>
        <thead>
          <tr>
            <th>Item</th>
            <th>Amount (KES)</th>
            <th>Paid</th>
            <th>Method</th>
            <th>Description</th>
            <th>Balance</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tuition</td>
            <td>10,000</td>
            <td>5,000</td>
            <td>Bursary</td>
            <td>Partial CDF support</td>
            <td>5,000</td>
          </tr>
          <tr>
            <td>Boarding</td>
            <td>7,000</td>
            <td>4,000</td>
            <td>Bank Cheque</td>
            <td>Paid via Family Bank</td>
            <td>3,000</td>
          </tr>
          <tr>
            <td>Meals</td>
            <td>4,000</td>
            <td>2,000</td>
            <td>Cash</td>
            <td>Mid-term deposit</td>
            <td>2,000</td>
          </tr>
          <tr>
            <td>Activity Fee</td>
            <td>2,000</td>
            <td>2,000</td>
            <td>Cash</td>
            <td>Sports and trips</td>
            <td>0</td>
          </tr>
          <tr class="total-row">
            <td>Total</td>
            <td>23,000</td>
            <td>13,000</td>
            <td>—</td>
            <td>—</td>
            <td>10,000</td>
          </tr>
        </tbody>
      </table>
    </details>

    <!-- Term 2 -->
    <details>
      <summary>Term 2 - Fee Details</summary>
      <table>
        <thead>
          <tr>
            <th>Item</th>
            <th>Amount (KES)</th>
            <th>Paid</th>
            <th>Method</th>
            <th>Description</th>
            <th>Balance</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tuition</td>
            <td>8,000</td>
            <td>6,000</td>
            <td>Cheque</td>
            <td>Parent contribution</td>
            <td>2,000</td>
          </tr>
          <tr>
            <td>Library</td>
            <td>1,500</td>
            <td>1,500</td>
            <td>Cash</td>
            <td>Library and book access</td>
            <td>0</td>
          </tr>
          <tr>
            <td>Medical Fee</td>
            <td>1,500</td>
            <td>1,000</td>
            <td>Cash</td>
            <td>Term insurance</td>
            <td>500</td>
          </tr>
          <tr class="total-row">
            <td>Total (inc. Term 1 balance)</td>
            <td>23,000 + 10,000 = 33,000</td>
            <td>21,500</td>
            <td>—</td>
            <td>—</td>
            <td>11,500</td>
          </tr>
        </tbody>
      </table>
    </details>

    <!-- Term 3 -->
    <details>
      <summary>Term 3 - Fee Details</summary>
      <table>
        <thead>
          <tr>
            <th>Item</th>
            <th>Amount (KES)</th>
            <th>Paid</th>
            <th>Method</th>
            <th>Description</th>
            <th>Balance</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tuition</td>
            <td>6,000</td>
            <td>5,000</td>
            <td>Cash</td>
            <td>Final term tuition</td>
            <td>1,000</td>
          </tr>
          <tr>
            <td>Exam Fee</td>
            <td>2,000</td>
            <td>2,000</td>
            <td>Cheque</td>
            <td>KNEC mock exam fee</td>
            <td>0</td>
          </tr>
          <tr>
            <td>Cleaning</td>
            <td>1,500</td>
            <td>1,000</td>
            <td>Cash</td>
            <td>School maintenance</td>
            <td>500</td>
          </tr>
          <tr class="total-row">
            <td>Total (inc. Term 2 balance)</td>
            <td>9,500 + 11,500 = 21,000</td>
            <td>8,000</td>
            <td>—</td>
            <td>—</td>
            <td>13,000</td>
          </tr>
        </tbody>
      </table>
    </details>

    <div class="footer-info">
      <p><strong>Total Outstanding Balance: KES 13,000</strong></p>
      <p><strong>Foothill High School</strong> | P.O. Box 21-4534 Nyeri</p>
      <p><strong>Phone:</strong> +254 77-9344-23 | <strong>Email:</strong> foothill@gmail.com</p>
    </div>
  </div>
</body>
</html>
