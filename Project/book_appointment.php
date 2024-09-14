<?php
session_start();
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'patient') {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    // Insert new appointment into the database
    $stmt = $conn->prepare("INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $user_id, $doctor_id, $appointment_date, $appointment_time);

    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - Serenity Sphere</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Book an Appointment</h2>
        <form action="book_appointment.php" method="post">
            <label for="doctor">Choose a Doctor:</label>
            <select name="doctor_id" class="form-control" required>
                <!-- Fetch and list doctors from the database -->
                <?php
                include('db.php');
                $result = $conn->query("SELECT doctor_id, name FROM doctors");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['doctor_id']."'>".$row['name']."</option>";
                }
                $conn->close();
                ?>
            </select>
            <br>
            <label for="appointment_date">Date:</label>
            <input type="date" name="appointment_date" class="form-control" required>
            <br>
            <label for="appointment_time">Time:</label>
            <input type="time" name="appointment_time" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-success">Book Appointment</button>
        </form>
    </div>
</body>
</html>
