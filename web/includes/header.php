<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Tracker Demo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <h1><a href="index.php">Task Tracker Demo</a></h1>
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="nav-links">
                    <a href="dashboard.php">Dashboard</a>
                    <a href="logout.php">Logout</a>
                </div>
            <?php else: ?>
                <div class="nav-links">
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <main>
