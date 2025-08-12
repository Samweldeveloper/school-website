<?php
session_start(); // Start session to store user info

// Database connection
$conn = new mysqli("localhost", "root", "", "registrar");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Fetch user from database
    $sql = "SELECT * FROM registrar WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: registrar homepage.php");
            exit();
        } else {
            echo "<p style='color:red;'>Invalid password!</p>";
        }
    } else {
        echo "<p style='color:red;'>User not found!</p>";
    }

    $stmt->close();
}
$conn->close();
?>

<!-- Login Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Registrar Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, , #ffffff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.4);
            width: 300px;
            text-align: center;
            border: 2px solid #ff4d4d;
        }
        h2 {
            color: #ff4d4d;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ff4d4d;
            border-radius: 5px;
            outline: none;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: darkred;
            box-shadow: 0 0 5px rgba(255, 0, 0, 0.6);
        }
        button {
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        button:hover {
            background: darkred;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
