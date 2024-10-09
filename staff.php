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
    $position = $_POST['position'];
    $email = $_POST['email'];

    $sql = "INSERT INTO staff (name, position, email) VALUES ('$name', '$position', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New staff record created successfully";
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
    <title>Staff Module</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Staff Module</h2>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="position">Position:</label>
            <input type="text" id="position" name="position" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
