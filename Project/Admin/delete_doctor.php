<?php
include('db.php'); // Include the database connection

if (isset($_GET['doctor_id'])) {
    $doctor_id = $_GET['doctor_id'];

    // Delete the doctor from the database
    $stmt = $conn->prepare("DELETE FROM doctors WHERE doctor_id = ?");
    $stmt->bind_param("i", $doctor_id);

    if ($stmt->execute()) {
        echo "Doctor deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

