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

// Fetch exam timetable records
$sql = "SELECT departments.department_name, exam_timetable.exam_date, exam_timetable.subject, exam_timetable.time
        FROM exam_timetable
        JOIN departments ON exam_timetable.department_id = departments.department_id
        ORDER BY exam_timetable.exam_date ASC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Exam Timetable</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Exam Timetable</h2>

        <table>
            <tr>
                <th>Department</th>
                <th>Exam Date</th>
                <th>Subject</th>
                <th>Time</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['department_name'] . "</td>
                            <td>" . $row['exam_date'] . "</td>
                            <td>" . $row['subject'] . "</td>
                            <td>" . $row['time'] . "</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No exam timetable available.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
