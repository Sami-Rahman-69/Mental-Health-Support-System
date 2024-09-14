<?php
include('db.php'); // Include the database connection

if (isset($_GET['organization_id'])) {
    $organization_id = $_GET['organization_id'];

    // Fetch current organization details
    $stmt = $conn->prepare("SELECT name, description, location FROM organizations WHERE organization_id = ?");
    $stmt->bind_param("i", $organization_id);
    $stmt->execute();
    $stmt->bind_result($name, $description, $location);
    $stmt->fetch();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $organization_id = $_POST['organization_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    // Update the organization's information
    $stmt = $conn->prepare("UPDATE organizations SET name = ?, description = ?, location = ? WHERE organization_id = ?");
    $stmt->bind_param("sssi", $name, $description, $location, $organization_id);

    if ($stmt->execute()) {
        echo "Organization updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!-- HTML Form for editing the organization -->
<form action="edit_organization.php" method="post">
    <input type="hidden" name="organization_id" value="<?php echo $organization_id; ?>">
    <input type="text" name="name" value="<?php echo $name; ?>" required><br>
    <textarea name="description"><?php echo $description; ?></textarea><br>
    <input type="text" name="location" value="<?php echo $location; ?>"><br>
    <button type="submit">Update Organization</button>
</form>
