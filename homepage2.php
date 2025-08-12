<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>School Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: url('homepage.jpeg') no-repeat center center fixed;
      background-size: cover;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .navbar {
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      gap: 30px;
      padding: 12px 30px;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 999;
      backdrop-filter: blur(5px);
    }

    .menu-item {
      position: relative;
    }

    .menu-item > a {
      text-decoration: none;
      color: white;
      font-weight: 600;
      font-size: 15px;
      padding: 10px 16px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .menu-item > a:hover {
      background-color: red;
      color: white;
    }

    .submenu {
      display: none;
      position: absolute;
      top: 40px;
      left: 0;
      background-color: rgba(0, 0, 0, 0.7);
      border-radius: 8px;
      min-width: 220px;
      z-index: 10;
      box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .menu-item:hover .submenu {
      display: block;
    }

    .submenu a {
      color: white;
      padding: 10px 15px;
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 14px;
      text-decoration: none;
      transition: background 0.3s ease;
      cursor: pointer;
    }

    .submenu a:hover {
      background-color: #222;
      color: #00ffd0;
    }

    .menu-item:last-child a {
      color: #ff5a5a;
    }

    .menu-item:last-child a:hover {
      color: white;
      background-color: red;
    }

    .hero {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 100px 20px 60px;
    }

    .hero h1 {
      font-size: 42px;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
      color: red;
    }

    .hero p {
      font-size: 18px;
      margin-top: 10px;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
    }

    footer {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 20px 15px;
      text-align: center;
      font-size: 13px;
      line-height: 1.7;
      color: #ddd;
      backdrop-filter: blur(3px);
    }

    footer h3 {
      color: white;
      margin-bottom: 10px;
      font-size: 15px;
    }

    .page-container {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1;
      margin-top: 70px;
    }
  </style>
</head>
<body>

<div class="page-container">

  <!-- Navigation Menu -->
  <nav class="navbar">
    <div class="menu-item"><a href="index.php"><i class="fas fa-home"></i> HOME</a></div>

    <div class="menu-item">
      <a href="#"><i class="fas fa-user-graduate"></i> STUDENT RECORDS</a>
      <div class="submenu">
        <a href="studentrecords.php"><i class="fas fa-users"></i> All Student Details</a>
        <a href="new_admissions.php"><i class="fas fa-user-plus"></i> New Admission Requests</a>
        <a href="update_student.php"><i class="fas fa-edit"></i> Update Student Details</a>
        <a href="reporting_records.php"><i class="fas fa-file-alt"></i> Reporting Records</a>
        <a href="disciplinary_records.php"><i class="fas fa-gavel"></i> Disciplinary Records</a>
      </div>
    </div>

    <div class="menu-item">
      <a href="#"><i class="fas fa-money-bill-wave"></i> FINANCIAL & FEES</a>
      <div class="submenu">
        <a href="fee_structure.php"><i class="fas fa-sitemap"></i> Fee Structure</a>
        <a href="student_fees.php"><i class="fas fa-file-invoice-dollar"></i> Student Fee Records</a>
        <a href="payment_tracking.php"><i class="fas fa-chart-line"></i> Payment Tracking</a>
        <a href="generate_invoices.php"><i class="fas fa-file-invoice"></i> Generate Invoices</a>
      </div>
    </div>

    <div class="menu-item">
      <a href="#"><i class="fas fa-chart-pie"></i> REPORT & ANALYTICS</a>
      <div class="submenu">
        <a href="academic_reports.php"><i class="fas fa-clipboard-list"></i> Academic Reports</a>
        <a href="fee_reports.php"><i class="fas fa-coins"></i> Fee Collection Reports</a>
        <a href="attendance_reports.php"><i class="fas fa-calendar-check"></i> Attendance Reports</a>
        <a href="performance_analytics.php"><i class="fas fa-tachometer-alt"></i> Performance Analytics</a>
      </div>
    </div>

    <div class="menu-item">
      <a href="#"><i class="fas fa-book-open"></i> ACADEMIC & CURRICULUM</a>
      <div class="submenu">
        <a href="class_timetables.php"><i class="fas fa-clock"></i> Class Timetables</a>
        <a href="subject_allocation.php"><i class="fas fa-th-list"></i> Subject Allocation</a>
        <a href="syllabus_repo.php"><i class="fas fa-folder-open"></i> Syllabus Repository</a>
        <a href="cbc_management.php"><i class="fas fa-cogs"></i> CBC Management</a>
        <a href="844_management.php"><i class="fas fa-project-diagram"></i> 8-4-4 Management</a>
      </div>
    </div>

    <div class="menu-item">
      <a href="#"><i class="fas fa-question-circle"></i> HELP & SUPPORT</a>
      <div class="submenu">
        <a href="user_guide.php"><i class="fas fa-book"></i> User Guide</a>
        <a href="usersupport.php"><i class="fas fa-headset"></i> Contact IT Support</a>
        <a href="FAQ Student.php"><i class="fas fa-info-circle"></i> FAQs</a>
      </div>
    </div>

    <div class="menu-item">
      <a href="index.php" onclick="return confirmLogout()"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="content hero">
    <h1>School Management System</h1>
    <p>A Clear Path for Potential</p>
  </div>

  <!-- Footer -->
  <footer>
    <h3>Contact Us</h3>
    <p><strong>Phone:</strong> +254 712 345 678</p>
    <p><strong>Email:</strong> info@foothill.ac.ke</p>
    <p><strong>P.O. Box:</strong> 12345 – 00100, Nyeri, Kenya</p>
    <p><strong>Address:</strong> Along Main School Road, Nyeri County</p>
    <p>&copy; 2025 Your School Name. All rights reserved.</p>
  </footer>

</div>

<script>
  function confirmLogout() {
    return confirm("Are you sure you want to logout?");
  }
</script>

</body>
</html>

