<?php
session_start();

// Initialize variables
$message = "";

// Connect to database
$conn = new mysqli("localhost", "root", "", "staff");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get input safely
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';

  // Validate input
  if (empty($email) || empty($password)) {
    $message = "Email and password are required.";
  } else {
    // Get user from DB
    $stmt = $conn->prepare("SELECT id, fullname, password FROM teacher WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();

      // Verify password
      if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        header("Location: adminreflect.php"); // Redirect after login
        exit();
      } else {
        $message = "Incorrect password.";
      }
    } else {
      $message = "No user found with that email.";
    }
  }

  $stmt->close();
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
      height: 100vh;
      background-color: #fefefe;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .form-container {
      background-color: #ffffff;
      padding: 50px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      text-align: center;
      border: 2px solid #ffdddd;
    }

    .form-container h2 {
      color: #cc0000;
      margin-bottom: 25px;
      font-size: 24px;
    }

    input {
      width: 260px;
      padding: 12px;
      margin: 10px 0;
      border: 2px solid #ff4d4d;
      border-radius: 8px;
      background-color: #fff5f5;
      font-size: 16px;
      color: #333;
    }

    input:focus {
      outline: none;
      border-color: #ff0000;
      background-color: #ffeaea;
    }

    button {
      width: 280px;
      padding: 12px;
      margin-top: 20px;
      background-color: #ff4d4d;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s;
    }

    button:hover {
      background-color: #cc0000;
      transform: scale(1.03);
    }

    .link {
      margin-top: 15px;
      display: block;
      font-size: 14px;
      color: #cc0000;
      text-decoration: none;
    }

    .link:hover {
      text-decoration: underline;
    }

    .error-message {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Login to Your Account</h2>

    <?php if (!empty($message)): ?>
      <div class="error-message"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <form action="" method="POST">
      <input type="email" name="email" placeholder="Email Address" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit">Login</button>
    </form>
    <a class="link" href="adminsignup.php">Don't have an account? Sign Up</a>
  </div>

</body>
</html>
