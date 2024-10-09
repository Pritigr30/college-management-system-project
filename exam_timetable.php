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
    $department_id = $_POST['department_id'];
    $exam_date = $_POST['exam_date'];
    $subject = $_POST['subject'];
    $time = $_POST['time'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO exam_timetable (department_id, exam_date, subject, time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $department_id, $exam_date, $subject, $time); // s for string

    // Execute the statement
    if ($stmt->execute()) {
        echo "New exam timetable record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Timetable Module</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Exam Timetable Module</h2>
        <form method="POST" action="">
            <label for="department_id">Department ID:</label>
            <input type="text" id="department_id" name="department_id" required><br>

            <label for="exam_date">Exam Date:</label>
            <input type="date" id="exam_date" name="exam_date" required><br>

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required><br>

            <label for="time">Time:</label>
            <input type="text" id="time" name="time" required><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
