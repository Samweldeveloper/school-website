<?php
$host = "localhost";
$dbname = "test";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student = null;
$admission = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $admission = $conn->real_escape_string($_POST['admission']);
    $result = $conn->query("SELECT * FROM students WHERE admission = '$admission'");
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        echo "<p style='color: red;'>No student found with that admission number.</p>";
    }
}

// Update form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $admission = $conn->real_escape_string($_POST['admission']);
    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $grade = $conn->real_escape_string($_POST['grade']);
    $term = $conn->real_escape_string($_POST['term']);
    $year = (int)$_POST['year'];
    $pcontact = $conn->real_escape_string($_POST['pcontact']);
    $address = $conn->real_escape_string($_POST['address']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $nationality = $conn->real_escape_string($_POST['nationality']);
    $religion = $conn->real_escape_string($_POST['religion']);
    $email = $conn->real_escape_string($_POST['email']);
    $guardian = $conn->real_escape_string($_POST['guardian']);
    $gcontact = $conn->real_escape_string($_POST['gcontact']);
    $medical = $conn->real_escape_string($_POST['medical']);
    $emergency = $conn->real_escape_string($_POST['emergency']);
    $status = $conn->real_escape_string($_POST['status']);
    $notes = $conn->real_escape_string($_POST['notes']);

    $updateSql = "UPDATE students SET
        fname='$fname', lname='$lname', grade='$grade', term='$term', year=$year,
        pcontact='$pcontact', address='$address', dob='$dob', gender='$gender',
        nationality='$nationality', religion='$religion', email='$email',
        guardian='$guardian', gcontact='$gcontact', medical='$medical',
        emergency='$emergency', status='$status', notes='$notes'
        WHERE admission = '$admission'";

    if ($conn->query($updateSql) === TRUE) {
        echo "<p style='color: lime;'>Student record updated successfully.</p>";
        $student = null;
    } else {
        echo "<p style='color: red;'>Error updating record: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student Record</title>
    <style>
        body {
            font-family: Arial;
            background-color: #222;
            color: white;
            padding: 20px;
        }
        form {
            background: #333;
            padding: 20px;
            border-radius: 10px;
        }
        input, select {
            width: 100%;
            padding: 6px;
            margin-bottom: 10px;
        }
        button {
            background: red;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        h2 {
            color: #ff6666;
        }
    </style>
</head>
<body>

<h2>Search Student by Admission No</h2>
<form method="POST">
    <input type="text" name="admission" placeholder="Enter admission number" value="<?= htmlspecialchars($admission) ?>" required>
    <button type="submit" name="search">Load Student</button>
</form>

<?php if ($student): ?>
    <h2>Update Student Data</h2>
    <form method="POST">
        <input type="hidden" name="admission" value="<?= htmlspecialchars($student['admission']) ?>">
        <input name="fname" value="<?= htmlspecialchars($student['fname']) ?>" placeholder="First Name">
        <input name="lname" value="<?= htmlspecialchars($student['lname']) ?>" placeholder="Last Name">
        <input name="grade" value="<?= htmlspecialchars($student['grade']) ?>" placeholder="Grade">
        <select name="term">
            <option <?= $student['term'] == 'Term 1' ? 'selected' : '' ?>>Term 1</option>
            <option <?= $student['term'] == 'Term 2' ? 'selected' : '' ?>>Term 2</option>
            <option <?= $student['term'] == 'Term 3' ? 'selected' : '' ?>>Term 3</option>
        </select>
        <input type="number" name="year" value="<?= $student['year'] ?>">
        <input name="pcontact" value="<?= htmlspecialchars($student['pcontact']) ?>" placeholder="Parent Contact">
        <input name="address" value="<?= htmlspecialchars($student['address']) ?>" placeholder="Address">
        <input type="date" name="dob" value="<?= $student['dob'] ?>">
        <select name="gender">
            <option <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
            <option <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
            <option <?= $student['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
        </select>
        <input name="nationality" value="<?= htmlspecialchars($student['nationality']) ?>" placeholder="Nationality">
        <input name="religion" value="<?= htmlspecialchars($student['religion']) ?>" placeholder="Religion">
        <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" placeholder="Email">
        <input name="guardian" value="<?= htmlspecialchars($student['guardian']) ?>" placeholder="Guardian">
        <input name="gcontact" value="<?= htmlspecialchars($student['gcontact']) ?>" placeholder="Guardian Contact">
        <input name="medical" value="<?= htmlspecialchars($student['medical']) ?>" placeholder="Medical Info">
        <input name="emergency" value="<?= htmlspecialchars($student['emergency']) ?>" placeholder="Emergency Contact">
        <select name="status">
            <option <?= $student['status'] == 'Active' ? 'selected' : '' ?>>Active</option>
            <option <?= $student['status'] == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
        </select>
        <input name="notes" value="<?= htmlspecialchars($student['notes']) ?>" placeholder="Notes">
        <button type="submit" name="update">Update Record</button>
    </form>
<?php endif; ?>

</body>
</html>
