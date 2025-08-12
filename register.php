<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_registration";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$kcpeIndex = $_POST['kcpe_index'];
$kcseYear = $_POST['kcse_year'];
$Username = $_POST['Username'];
$Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (first_name, last_name, kcpe_index, kcse_year, Username, Password)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssiss", $firstName, $lastName, $kcpeIndex, $kcseYear, $Username, $Password);

if ($stmt->execute()) {
    header("Location:loginp.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
