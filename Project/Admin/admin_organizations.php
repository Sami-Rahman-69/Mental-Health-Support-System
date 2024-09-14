<?php
include('db.php'); // Include the database connection

$result = $conn->query("SELECT organization_id, name, description, location FROM organizations");

echo "<h3>Organizations List</h3>";
while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<p>Name: " . $row['name'] . "</p>";
    echo "<p>Description: " . $row['description'] . "</p>";
    echo "<p>Location: " . $row['location'] . "</p>";
    echo "<a href='edit_organization.php?organization_id=" . $row['organization_id'] . "'>Edit</a> | ";
    echo "<a href='delete_organization.php?organization_id=" . $row['organization_id'] . "'>Delete</a>";
    echo "</div><hr>";
}

$conn->close();
?>
