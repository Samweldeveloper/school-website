<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            padding: 50px;
        }
        .box {
            max-width: 850px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
        }
        .welcome {
            margin-bottom: 20px;
        }
        .nav-links {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .nav-item {
            position: relative;
        }
        .nav-links a, .dropbtn {
            background-color: #2196F3;
            color: white;
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s;
        }
        .nav-links a:hover, .dropbtn:hover {
            background-color: #1976D2;
        }

        /* Dropdown content */
        .dropdown-content {
            display: none;
            position: absolute;
            top: 45px;
            left: 0;
            background-color: #f9f9f9;
            min-width: 180px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 8px;
        }
        .dropdown-content a {
            color: black;
            padding: 10px 14px;
            text-decoration: none;
            display: block;
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .nav-item:hover .dropdown-content {
            display: block;
        }

        .logout {
            display: block;
            margin-top: 30px;
            text-align: center;
            color: #ff3b3b;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="welcome">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['admin_user']); ?>!</h2>
            <p>This is your admin dashboard. Use the menu to manage different sections.</p>
        </div>

        <div class="nav-links">
            <div class="nav-item">
                <button class="dropbtn">Admin Report ▾</button>
                <div class="dropdown-content">
                    <a href="adminreport.php">View Reports</a>
                    <a href="adminreport.php">Upload Reports</a>
                    <a href="adminreport.php">Generate Report</a>
                </div>
            </div>

              <a href="update student details admin.php">update student details</a>
            <a href="admin_events.php">Admin Events</a>
            <a href="admin payment.php">Fee Management</a>
            <a href="studentrecords.php">Student Records</a>
            <a href="discpline_form.php">Admin Disciplinary</a>
             <a href="admin_attendance.php">Admin Events</a>
            <a href="admin_faq.php">Manage FAQs</a>
            <a href="adminsupport messages.php">IT Support Queries</a>
        </div>

        <a class="logout" href="homepage.php">Logout</a>
    </div>
</body>
</html>
