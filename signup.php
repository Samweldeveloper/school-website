<?php
// --- DATABASE CONNECTION ---
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "signup";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName   = trim($_POST["first_name"]);
    $lastName    = trim($_POST["last_name"]);
    $kcpeIndex   = trim($_POST["kcpe_index"]);
    $kcseYear    = intval($_POST["kcse_year"]);
    $username    = strtolower(trim($_POST["Username"]));
    $password    = trim($_POST["Password"]);

    if ($firstName && $lastName && $kcpeIndex && $kcseYear && $username && $password) {
        // ✅ Corrected to check in 'users' table instead of 'signup'
        $check = "SELECT * FROM now WHERE LOWER(username) = '$username' OR kcpe_index = '$kcpeIndex'";
        $result = $conn->query($check);

        if ($result->num_rows > 0) {
            echo "<script>alert('Username or KCPE Index already exists. Please try another.'); window.history.back();</script>";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO now (first_name, last_name, kcpe_index, kcse_year, username, password)
                    VALUES ('$firstName', '$lastName', '$kcpeIndex', '$kcseYear', '$username', '$hashedPassword')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Signup successful! Please log in.'); window.location.href='loginp.php';</script>";
            } else {
                echo "<script>alert('Error occurred. Try again later.'); window.history.back();</script>";
            }
        }
    } else {
        echo "<script>alert('Please fill in all fields.'); window.history.back();</script>";
    }
}

$conn->close();
?>








<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <style>
    /* Page Layout */
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: url('signup1.jpeg') no-repeat center center / cover;
      margin: 0;
      overflow: hidden;
    }

    /* Animation Keyframes */
    @keyframes fadeSlide {
      0% {
        opacity: 0;
        transform: translateY(-30px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInMarquee {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    /* Form Container */
    .form-container {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 15px rgba(249, 8, 8, 0.3);
      width: 320px;
      text-align: center;
      animation: fadeSlide 1s ease-out forwards;
    }

    /* Heading */
    .form-container h2 {
      color: red;
      font-size: 28px;
      margin-bottom: 20px;
    }

    /* Form Groups */
    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
      transition: transform 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: red;
      box-shadow: 0 0 6px red;
      transform: scale(1.03);
    }

    /* Button */
    button {
      width: 100%;
      padding: 10px;
      background: rgb(226, 6, 6);
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    button:hover {
      background: #fff;
      color: #ff7200;
      border: 1px solid #ff7200;
      transform: scale(1.05);
    }

    /* Marquee */
    marquee {
      color: #ff7200;
      font-size: 20px;
      font-weight: bold;
      margin-top: 10px;
      display: block;
      animation: fadeInMarquee 2s ease-in;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Sign Up</h2>
    <form action="" method="post">
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="first_name" required>
      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="last_name" required>
      </div>
      <div class="form-group">
        <label for="kcpeIndex">KCPE Index Number</label>
        <input type="text" id="kcpeIndex" name="kcpe_index" required>
      </div>
      <div class="form-group">
        <label for="kcseYear">KCSE Year</label>
        <input type="number" id="kcseYear" name="kcse_year" required>
      </div>
      <div class="form-group">
        <label for="Username">Username</label>
        <input type="text" id="Username" name="Username" required>
      </div>
      <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" id="Password" name="Password" required>
      </div>

      <marquee>Welcome to our school!</marquee>

      <button type="submit">Sign Up</button>
    </form>
  </div>

</body>
</html>
