<?php
global $result;

echo '<h2>Simple Report</h2>';

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'rosariosis';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "
    SELECT s.STUDENT_ID, s.FIRST_NAME, s.LAST_NAME, e.GRADE_ID, e.START_DATE 
    FROM students s 
    JOIN student_enrollment e ON s.STUDENT_ID = e.STUDENT_ID
    ORDER BY s.FIRST_NAME, s.LAST_NAME
";

$result = $conn->query($query);


echo '<table border="1" cellpadding="5" cellspacing="0">';
echo '<tr>
         <th>Student ID</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Grade ID</th>
         <th>Enrollment Start Date</th>
     </tr>';

$data = $result->fetch_all(MYSQLI_ASSOC);

if (count($data) > 0) {
    foreach ($data as $row) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['STUDENT_ID']) . '</td>';
        echo '<td>' . htmlspecialchars($row['FIRST_NAME']) . '</td>';
        echo '<td>' . htmlspecialchars($row['LAST_NAME']) . '</td>';
        echo '<td>' . htmlspecialchars($row['GRADE_ID']) . '</td>';
        echo '<td>' . htmlspecialchars($row['START_DATE']) . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">No data found</td></tr>';
}

echo '</table>';

$conn->close();
?>

