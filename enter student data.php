<?php
$host = "localhost";
$dbname = "test";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $count = count($_POST['fname']);
    for ($i = 0; $i < $count; $i++) {
        if (!empty($_POST['fname'][$i])) {
            $fname = $conn->real_escape_string($_POST['fname'][$i]);
            $lname = $conn->real_escape_string($_POST['lname'][$i]);
            $admission = $conn->real_escape_string($_POST['admission'][$i]);
            $grade = $conn->real_escape_string($_POST['grade'][$i]);
            $term = $conn->real_escape_string($_POST['term'][$i]);
            $year = (int)$_POST['year'][$i];
            $pcontact = $conn->real_escape_string($_POST['pcontact'][$i]);
            $address = $conn->real_escape_string($_POST['address'][$i]);
            $dob = $conn->real_escape_string($_POST['dob'][$i]);
            $gender = $conn->real_escape_string($_POST['gender'][$i]);
            $nationality = $conn->real_escape_string($_POST['nationality'][$i]);
            $religion = $conn->real_escape_string($_POST['religion'][$i]);
            $email = $conn->real_escape_string($_POST['email'][$i]);
            $guardian = $conn->real_escape_string($_POST['guardian'][$i]);
            $gcontact = $conn->real_escape_string($_POST['gcontact'][$i]);
            $medical = $conn->real_escape_string($_POST['medical'][$i]);
            $emergency = $conn->real_escape_string($_POST['emergency'][$i]);
            $status = $conn->real_escape_string($_POST['status'][$i]);
            $notes = $conn->real_escape_string($_POST['notes'][$i]);

            $sql = "INSERT INTO students 
                (fname, lname, admission, grade, term, year, pcontact, address, dob, gender, nationality, religion, email, guardian, gcontact, medical, emergency, status, notes)
                VALUES
                ('$fname', '$lname', '$admission', '$grade', '$term', $year, '$pcontact', '$address', '$dob', '$gender', '$nationality', '$religion', '$email', '$guardian', '$gcontact', '$medical', '$emergency', '$status', '$notes')";

            if ($conn->query($sql) === TRUE) {
                echo "<p style='color:lime;'>Student " . ($i + 1) . " saved successfully.</p>";
            } else {
                echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Enter Student Records</title>
    <style>
        body {
            font-family: Arial;
            background-color: #330000;
            color: white;
            padding: 20px;
        }
        table {
            width: 100%;
            background: #440000;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #aa0000;
        }
        input, select {
            width: 100%;
            padding: 5px;
        }
        button {
            background: red;
            color: white;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            border: none;
        }
    </style>
</head>
<body>
<h1>Enter Student Records</h1>

<form method="POST" action="">
    <table>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Admission No</th>
            <th>Grade</th>
            <th>Term</th>
            <th>Year</th>
            <th>Parent Contact</th>
            <th>Address</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Religion</th>
            <th>Email</th>
            <th>Guardian</th>
            <th>Guardian Contact</th>
            <th>Medical Info</th>
            <th>Emergency</th>
            <th>Status</th>
            <th>Notes</th>
        </tr>
        <tr>
            <td>1</td>
            <td><input name="fname[]"></td>
            <td><input name="lname[]"></td>
            <td><input name="admission[]"></td>
            <td><input name="grade[]"></td>
            <td>
                <select name="term[]">
                    <option>Term 1</option>
                    <option>Term 2</option>
                    <option>Term 3</option>
                </select>
            </td>
            <td><input type="number" name="year[]"></td>
            <td><input name="pcontact[]"></td>
            <td><input name="address[]"></td>
            <td><input type="date" name="dob[]"></td>
            <td>
                <select name="gender[]">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </td>
            <td><input name="nationality[]"></td>
            <td><input name="religion[]"></td>
            <td><input type="email" name="email[]"></td>
            <td><input name="guardian[]"></td>
            <td><input name="gcontact[]"></td>
            <td><input name="medical[]"></td>
            <td><input name="emergency[]"></td>
            <td>
                <select name="status[]">
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </td>
            <td><input name="notes[]"></td>
        </tr>
    </table>
    <button type="submit">Submit Record</button>
</form>

</body>
</html>
