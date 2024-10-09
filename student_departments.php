<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch department records
$sql = "SELECT department_name FROM departments";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Departments</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Departments in College</h2>

        <table>
            <tr>
                <th>Department Name</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['department_name'] . "</td></tr>";
                }
            } else {
                echo "<tr><td>No departments available.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
