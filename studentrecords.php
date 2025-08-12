<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $count = count($_POST['fname']);
    echo "<h2>Submitted Student Records:</h2>";
    for ($i = 0; $i < $count; $i++) {
        if (!empty($_POST['fname'][$i])) {
            echo "<div style='margin-bottom:15px; padding:10px; border:1px solid #900; background:#ffe6e6; color: black;'>";
            echo "<strong>Student " . ($i + 1) . ":</strong><br>";
            echo "Name: " . htmlspecialchars($_POST['fname'][$i]) . " " . htmlspecialchars($_POST['lname'][$i]) . "<br>";
            echo "Admission No: " . htmlspecialchars($_POST['admission'][$i]) . "<br>";
            echo "Grade: " . htmlspecialchars($_POST['grade'][$i]) . " | Term: " . htmlspecialchars($_POST['term'][$i]) . " | Year: " . htmlspecialchars($_POST['year'][$i]) . "<br>";
            echo "Parent Contact: " . htmlspecialchars($_POST['pcontact'][$i]) . "<br>";
            echo "Status: " . htmlspecialchars($_POST['status'][$i]) . "<br>";
            echo "----------------------------";
            echo "</div>";
        }
    }
    echo "<hr>";
} else {
    // Show form only if not submitted (GET)
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Bulk Student Entry</title>
      <style>
        /* Your CSS here */
        body {
          font-family: Arial, sans-serif;
          background-color: #330000;
          color: white;
          padding: 20px;
        }
        table {
          width: 100%;
          border-collapse: collapse;
          background-color: #440000;
        }
        th, td {
          padding: 8px;
          border: 1px solid #aa0000;
        }
        th {
          background-color: #990000;
        }
        input, select, textarea {
          width: 100%;
          padding: 5px;
          background-color: #fff0f0;
          border: 1px solid #990000;
          border-radius: 4px;
        }
        button {
          background-color: red;
          color: white;
          padding: 10px 20px;
          border: none;
          font-size: 16px;
          margin-top: 20px;
          cursor: pointer;
          border-radius: 5px;
        }
        button:hover {
          background-color: darkred;
        }
      </style>
    </head>
    <body>

    <h1>Bulk Student Entry Form</h1>

    <form method="post" action="">
      <table>
        <thead>
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
            <th>Guardian Name</th>
            <th>Guardian Contact</th>
            <th>Medical Info</th>
            <th>Emergency Contact</th>
            <th>Status</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><input type="text" name="fname[]"></td>
            <td><input type="text" name="lname[]"></td>
            <td><input type="text" name="admission[]"></td>
            <td><input type="text" name="grade[]"></td>
            <td>
              <select name="term[]">
                <option value="Term 1">Term 1</option>
                <option value="Term 2">Term 2</option>
                <option value="Term 3">Term 3</option>
              </select>
            </td>
            <td><input type="number" name="year[]" min="2000" max="2100"></td>
            <td><input type="text" name="pcontact[]"></td>
            <td><input type="text" name="address[]"></td>
            <td><input type="date" name="dob[]"></td>
            <td>
              <select name="gender[]">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </td>
            <td><input type="text" name="nationality[]"></td>
            <td><input type="text" name="religion[]"></td>
            <td><input type="email" name="email[]"></td>
            <td><input type="text" name="guardian[]"></td>
            <td><input type="text" name="gcontact[]"></td>
            <td><input type="text" name="medical[]"></td>
            <td><input type="text" name="emergency[]"></td>
            <td>
              <select name="status[]">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </td>
            <td><input type="text" name="notes[]"></td>
          </tr>
        </tbody>
      </table>

      <button type="submit">Submit Record</button>
    </form>

    </body>
    </html>

    <?php
}
?>
<?php
$host = "localhost";
$dbname = "test";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
                echo "Student " . ($i + 1) . " saved successfully.<br>";
            } else {
                echo "Error: " . $conn->error . "<br>";
            }
        }
    }
}
?>
