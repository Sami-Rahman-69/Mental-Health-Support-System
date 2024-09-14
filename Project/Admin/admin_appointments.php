<?php
session_start();
include('db.php');

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin') {
    header('Location: login.php');
    exit;
}

// Fetch all appointments
$result = $conn->query("SELECT a.appointment_id, u.username, d.name AS doctor_name, a.appointment_date, a.appointment_time, a.status 
    FROM appointments a
    JOIN users u ON a.patient_id = u.user_id
    JOIN doctors d ON a.doctor_id = d.doctor_id
    ORDER BY a.appointment_date ASC, a.appointment_time ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments - Serenity Sphere</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Manage Appointments</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['doctor_name']; ?></td>
                        <td><?php echo $row['appointment_date']; ?></td>
                        <td><?php echo $row['appointment_time']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <a href="update_appointment.php?appointment_id=<?php echo $row['appointment_id']; ?>" class="btn btn-info">Update</a>
                            <a href="cancel_appointment.php?appointment_id=<?php echo $row['appointment_id']; ?>" class="btn btn-danger">Cancel</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
