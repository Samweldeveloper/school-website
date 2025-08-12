<?php
// Handle form submission at the top before any HTML is output
$signup_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Connect to database
  $conn = new mysqli("localhost", "root", "", "staff");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get form data safely
  $fullname = $_POST['fullname'] ?? '';
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $confirm = $_POST['confirm'] ?? '';

  // Validation
  if (empty($fullname) || empty($email) || empty($password) || empty($confirm)) {
    $signup_error = "All fields are required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $signup_error = "Invalid email format.";
  } elseif ($password !== $confirm) {
    $signup_error = "Passwords do not match.";
  } else {
    // Check if email exists
    $check = $conn->prepare("SELECT id FROM accounts WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
      $signup_error = "Email is already registered.";
    } else {
      // Hash password and insert
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $conn->prepare("INSERT INTO admin (fullname, email, password) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $fullname, $email, $hashedPassword);

      if ($stmt->execute()) {
        // Redirect to login
        header("Location: adminlogin.php");
        exit();
      } else {
        $signup_error = "Error: " . $stmt->error;
      }
    }
    $conn->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
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
      margin-top: 10px;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Create Account</h2>
    
    <?php if (!empty($signup_error)): ?>
      <div class="error-message"><?php echo $signup_error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <input type="text" name="fullname" placeholder="Full Name" required><br>
      <input type="email" name="email" placeholder="Email Address" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <input type="password" name="confirm" placeholder="Confirm Password" required><br>
      <button type="submit">Sign Up</button>
    </form>
    <a class="link" href="adminreflect.php">Already have an account? Login</a>
  </div>

</body>
</html>
