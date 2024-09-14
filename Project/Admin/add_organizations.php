<?php
// add_organization.php: Handle adding a new organization

include('db.php'); // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    $stmt = $conn->prepare("INSERT INTO organizations (name, description, location) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $description, $location);

    if ($stmt->execute()) {
        echo "Organization added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
