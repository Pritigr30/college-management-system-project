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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "INSERT INTO students (name, email, department) VALUES ('$name', '$email', '$department')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New student record created successfully";
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
    <title>Student Module</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Student Module</h2>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
