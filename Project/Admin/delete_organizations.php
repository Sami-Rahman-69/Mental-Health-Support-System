<?php
include('db.php'); // Include the database connection

if (isset($_GET['organization_id'])) {
    $organization_id = $_GET['organization_id'];

    // Delete the organization from the database
    $stmt = $conn->prepare("DELETE FROM organizations WHERE organization_id = ?");
    $stmt->bind_param("i", $organization_id);

    if ($stmt->execute()) {
        echo "Organization deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
