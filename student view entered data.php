<?php
$host = "localhost";
$dbname = "test";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student View</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1b1b1b;
            color: white;
            padding: 20px;
        }
        .student-box {
            background: #2a2a2a;
            margin-bottom: 15px;
            padding: 15px;
            border-left: 5px solid #ff3333;
        }
        h2 {
            color: #ff6666;
        }
    </style>
</head>
<body>
<h1>Student Records</h1>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='student-box'>";
        echo "<strong>Name:</strong> " . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "<br>";
        echo "<strong>Admission No:</strong> " . htmlspecialchars($row['admission']) . "<br>";
        echo "<strong>Grade:</strong> " . htmlspecialchars($row['grade']) . " | <strong>Term:</strong> " . htmlspecialchars($row['term']) . " | <strong>Year:</strong> " . htmlspecialchars($row['year']) . "<br>";
        echo "<strong>Contact:</strong> " . htmlspecialchars($row['pcontact']) . "<br>";
        echo "<strong>Email:</strong> " . htmlspecialchars($row['email']) . "<br>";
        echo "<strong>Status:</strong> " . htmlspecialchars($row['status']) . "<br>";
        echo "<strong>Notes:</strong> " . htmlspecialchars($row['notes']) . "<br>";
        echo "</div>";
    }
} else {
    echo "<p>No records found.</p>";
}
?>
</body>
</html>
