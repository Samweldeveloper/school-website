<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $id_number = trim($_POST['id_number']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username or ID number exists
    $check = $conn->prepare("SELECT id FROM admins WHERE username = ? OR id_number = ?");
    $check->bind_param("ss", $username, $id_number);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "Username or ID Number already exists.";
    } else {
        $stmt = $conn->prepare("INSERT INTO admins (username, id_number, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $id_number, $password);

        if ($stmt->execute()) {
            echo "Account created successfully. <a href='login.php'>Login here</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Sign Up</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; padding: 50px; }
        form { max-width: 350px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        input, button { width: 100%; padding: 10px; margin: 10px 0; }
        button { background: #4CAF50; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Admin Sign Up</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="id_number" placeholder="ID Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
        <p>Already registered? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>
