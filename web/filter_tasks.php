<?php
include 'config/database.php';
include 'includes/header.php'; // to ensure there is session start

// testing to see what is causing return to login page

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $task_id = $_POST['task_id'];
    $user_id = $_SESSION['user_id'];
    
    if ($_POST['action'] == 'complete') {
        try {
            $stmt = $pdo->prepare("UPDATE tasks SET is_completed = 1, completed_date = CURDATE() WHERE task_id = ? AND user_id = ?");
            $stmt->execute([$task_id, $user_id]);
        } catch (PDOException $e) {
            // to handle error
        }
    }
}

header('Location: dashboard.php');
exit;
?>
