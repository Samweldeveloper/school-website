<?php
session_start();

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
    $username = mysqli_real_escape_string($conn, strtolower(trim($_POST['Username'])));
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM now WHERE LOWER(username) = '$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: page2.html");
            exit();
        } else {
            echo "<script>alert('Incorrect password.'); window.location.href='loginp.php';</script>";
        }
    } else {
        echo "<script>alert('Username try again.'); window.location.href='loginp.php';</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
body {
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  height: 100vh;
  display: flex;
  color: black;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  position: relative;
  z-index: 1;
}

/* Background Layer with reduced opacity */
body::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(
      rgba(3, 3, 3, 0.7),
      rgba(4, 4, 4, 0.7)
    ),
    url('school_back1.jpg') no-repeat center center fixed;
  background-size: cover;
  opacity: 0.8; /* 👈 Change this value to control background image opacity */
  z-index: -1;
}


    .form-container {
      background-color: rgba(255, 255, 255, 0.07);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 35px rgba(7, 7, 7, 0.3);
      width: 350px;
      text-align: center;
      opacity: 0;
      transform: translateY(-30px);
      animation: fadeInSlide 1s forwards;
    }

    @keyframes fadeInSlide {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .form-container h3 {
      color: #ff4d4d;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 14px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      background-color: rgba(247, 245, 245, 0.85);
      transition: transform 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: red;
      box-shadow: 0 0 5px red;
      transform: scale(1.03);
    }

    .btn {
      background-color: red;
      color: white;
      padding: 12px;
      width: 100%;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn:hover {
      background-color: #b30000;
      transform: scale(1.05);
    }

    .link {
      margin-top: 15px;
      color: #f1f1f1;
    }

    .link a {
      color: red;
      text-decoration: none;
      transition: color 0.3s;
    }

    .link a:hover {
      text-decoration: underline;
      color: #ff4d4d;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h3>Login Here</h3>
    <form action="" method="post">
      <input type="text" name="Username" placeholder="Enter Username Here" required>
      <input type="password" name="password" placeholder="Enter Password Here" required>
      <button class="btn" type="submit">Log in</button>
    </form>

    <p class="link">Don't have an account?<br>
      <a href="signup.php">Sign up here</a></p>
  </div>
</body>
</html>
