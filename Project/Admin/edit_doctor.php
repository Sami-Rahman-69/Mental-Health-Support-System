<?php
include('db.php'); // Include the database connection

if (isset($_GET['doctor_id'])) {
    $doctor_id = $_GET['doctor_id'];

    // Fetch current doctor details
    $stmt = $conn->prepare("SELECT name, specialty, contact_info FROM doctors WHERE doctor_id = ?");
    $stmt->bind_param("i", $doctor_id);
    $stmt->execute();
    $stmt->bind_result($name, $specialty, $contact_info);
    $stmt->fetch();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor_id = $_POST['doctor_id'];
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $contact_info = $_POST['contact_info'];

    // Update the doctor's information
    $stmt = $conn->prepare("UPDATE doctors SET name = ?, specialty = ?, contact_info = ? WHERE doctor_id = ?");
    $stmt->bind_param("sssi", $name, $specialty, $contact_info, $doctor_id);

    if ($stmt->execute()) {
        echo "Doctor updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!-- HTML Form for editing the doctor -->
<form action="edit_doctor.php" method="post">
    <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
    <input type="text" name="name" value="<?php echo $name; ?>" required><br>
    <input type="text" name="specialty" value="<?php echo $specialty; ?>" required><br>
    <textarea name="contact_info"><?php echo $contact_info; ?></textarea><br>
    <button type="submit">Update Doctor</button>
</form>
