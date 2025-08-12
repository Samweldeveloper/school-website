<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Management</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background-color: #fefefe;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    .container {
      background-color: #ffffff;
      padding: 50px 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      border: 2px solid #ffdddd;
      text-align: center;
      position: relative;
    }

    h2 {
      color: #cc0000;
      margin-bottom: 40px;
      font-size: 24px;
    }

    .option-button {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 280px;
      padding: 14px;
      margin: 15px auto;
      background-color: #ff4d4d;
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 17px;
      font-weight: bold;
      cursor: pointer;
      text-decoration: none;
      transition: background-color 0.3s, transform 0.2s;
    }

    .option-button:hover {
      background-color: #cc0000;
      transform: scale(1.03);
    }

    .icon {
      margin-right: 10px;
      font-size: 20px;
    }

    .logout-button {
      position: absolute;
      top: 25px;
      right: 30px;
      background-color: #ff4d4d;
      color: white;
      padding: 10px 18px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s;
    }

    .logout-button:hover {
      background-color: #cc0000;
      transform: scale(1.05);
    }
  </style>
</head>
<body>

  <!-- Logout Top Right -->
  <a href="homepage.php" class="logout-button" onclick="return confirm('Are you sure you want to logout?');">
    🚪 Logout
  </a>

  <div class="container">
    <h2>Student Management Options</h2>

    <!-- Enter Student Details -->
    <a href="enter student data.php" class="option-button">
      <span class="icon">📝</span> Enter Student Details
    </a>

    <!-- Update Student Details -->
    <a href="update student details.php" class="option-button">
      <span class="icon">🔧</span> Update Student Details
    </a>
  </div>

</body>
</html>
