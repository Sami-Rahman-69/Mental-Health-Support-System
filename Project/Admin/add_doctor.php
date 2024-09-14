<?php
// add_doctor.php: Handle adding a new doctor

include('db.php'); // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $contact_info = $_POST['contact_info'];

    $stmt = $conn->prepare("INSERT INTO doctors (name, specialty, contact_info) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $specialty, $contact_info);

    if ($stmt->execute()) {
        echo "Doctor added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
