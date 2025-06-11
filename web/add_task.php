<?php
include 'config/database.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_name = trim($_POST['task_name']);
    $target_date = $_POST['target_date'];
    $user_id = $_SESSION['user_id'];
    
    if (empty($task_name) || empty($target_date)) {
        $error = 'Please fill in all fields.';
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO tasks (user_id, task_name, target_date) VALUES (?, ?, ?)");
            $stmt->execute([$user_id, $task_name, $target_date]);
            $success = 'Task added successfully!';
        } catch (PDOException $e) {
            $error = 'Failed to add task. Please try again.';
        }
    }
}
?>

<div class="container">
    <div class="form-container">
        <h2>Add New Task</h2>
        
        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="task_name">Task Name:</label>
                <input type="text" id="task_name" name="task_name" required>
            </div>
            
            <div class="form-group">
                <label for="target_date">Target Date:</label>
                <input type="date" id="target_date" name="target_date" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Add Task</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
