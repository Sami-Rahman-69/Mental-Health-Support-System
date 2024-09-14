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
    $profile = $_POST['profile'];

    // Update profile information
    $stmt = $conn->prepare("UPDATE users SET profile = ? WHERE user_id = ?");
    $stmt->bind_param("si", $profile, $user_id);

    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

// Fetch existing profile data
$stmt = $conn->prepare("SELECT profile FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($profile);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Serenity Sphere</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit My Profile</h2>
        <form action="edit_profile.php" method="post">
            <textarea name="profile" class="form-control" rows="5" placeholder="Update your profile"><?php echo $profile; ?></textarea><br>
            <button type="submit" class="btn btn-success">Update Profile</button>
        </form>
    </div>
</body>
</html>
