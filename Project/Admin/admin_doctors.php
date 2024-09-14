<?php
include('db.php'); // Include the database connection

$result = $conn->query("SELECT doctor_id, name, specialty, contact_info FROM doctors");

echo "<h3>Doctors List</h3>";
while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<p>Name: " . $row['name'] . "</p>";
    echo "<p>Specialty: " . $row['specialty'] . "</p>";
    echo "<p>Contact: " . $row['contact_info'] . "</p>";
    echo "<a href='edit_doctor.php?doctor_id=" . $row['doctor_id'] . "'>Edit</a> | ";
    echo "<a href='delete_doctor.php?doctor_id=" . $row['doctor_id'] . "'>Delete</a>";
    echo "</div><hr>";
}

$conn->close();
?>
