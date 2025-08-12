<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Setup</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background-color: #fefefe;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .logout-container {
      position: absolute;
      top: 20px;
      right: 30px;
    }

    .logout-button {
      background-color: #ff4d4d;
      color: white;
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      font-weight: bold;
      cursor: pointer;
      text-decoration: none;
      transition: background-color 0.3s, transform 0.2s;
    }

    .logout-button:hover {
      background-color: #cc0000;
      transform: scale(1.05);
    }

    .admin-container {
      background-color: #ffffff;
      padding: 60px 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      text-align: center;
      border: 2px solid #ffdddd;
    }

    .admin-container h2 {
      color: #cc0000;
      font-size: 26px;
      margin-bottom: 30px;
    }

    .admin-button {
      display: block;
      width: 260px;
      padding: 14px;
      margin: 15px auto;
      background-color: #ff4d4d;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 17px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s;
      text-decoration: none;
    }

    .admin-button:hover {
      background-color: #cc0000;
      transform: scale(1.03);
    }
  </style>
</head>
<body>

  <div class="logout-container">
    <a href="homepage.php" class="logout-button" onclick="return confirmLogout()">🚪 Logout</a>
  </div>

  <div class="admin-container">
    <h2>Admin Dashboard</h2>
    <a href="update student details admin.php" class="admin-button">📋 Update Student</a>
    <a href="admin FAQ.php" class="admin-button">❓ FAQs & Feedback</a>
    <a href="admin add event.php" class="admin-button">📅 Events</a>
  </div>

  <script>
    function confirmLogout() {
      return confirm("Are you sure you want to logout?");
    }
  </script>

</body>
</html>
