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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_name = $_POST['department_name'];

    $sql = "INSERT INTO departments (department_name) VALUES ('$department_name')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New department record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Module</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Department Module</h2>
        <form method="POST" action="">
            <label for="department_name">Department Name:</label>
            <input type="text" id="department_name" name="department_name" required><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
