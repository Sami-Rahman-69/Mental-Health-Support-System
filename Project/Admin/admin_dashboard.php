<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Serenity Sphere</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Serenity Sphere Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center">Admin Dashboard</h2>

    <div class="row mt-4">
        <!-- Doctors Management -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">
                    Manage Doctors
                </div>
                <div class="card-body">
                    <a href="admin_doctors.php" class="btn btn-primary btn-block">View All Doctors</a>
                    <a href="add_doctor.php" class="btn btn-success btn-block">Add New Doctor</a>
                </div>
            </div>
        </div>

        <!-- Organizations Management -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Manage Organizations
                </div>
                <div class="card-body">
                    <a href="admin_organizations.php" class="btn btn-primary btn-block">View All Organizations</a>
                    <a href="add_organization.php" class="btn btn-success btn-block">Add New Organization</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Profile and Account Management -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    Admin Account Settings
                </div>
                <div class="card-body">
                    <a href="admin_profile.php" class="btn btn-primary btn-block">Manage Your Profile</a>
                    <a href="change_password.php" class="btn btn-danger btn-block">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
