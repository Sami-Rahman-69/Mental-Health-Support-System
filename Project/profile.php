<?php
session_start();
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'patient') {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch the patient's profile information
$stmt = $conn->prepare("SELECT username, email, profile FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $email, $profile);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Serenity Sphere</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>My Profile</h2>
        <p><strong>Username:</strong> <?php echo $username; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Profile Info:</strong> <?php echo nl2br($profile); ?></p>
        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
    </div>
</body>
</html>
