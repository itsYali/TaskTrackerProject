<?php
include 'config/database.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$filter = $_GET['filter'] ?? 'all';
$user_id = $_SESSION['user_id'];

// query based on filter
$where_clause = "WHERE user_id = ?";
$params = [$user_id];

switch ($filter) {
    case 'completed':
        $where_clause .= " AND is_completed = 1";
        break;
    case 'incomplete':
        $where_clause .= " AND is_completed = 0";
        break;
}

$stmt = $pdo->prepare("SELECT * FROM tasks $where_clause ORDER BY target_date ASC");
$stmt->execute($params);
$tasks = $stmt->fetchAll();
?>

<div class="container">
    <div class="dashboard-header">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <a href="add_task.php" class="btn btn-primary">Add New Task</a>
    </div>
    
    <div class="filter-section">
        <h3>Filter Tasks:</h3>
        <div class="filter-buttons">
            <a href="?filter=all" class="btn <?php echo $filter == 'all' ? 'active' : ''; ?>">All</a>
            <a href="?filter=incomplete" class="btn <?php echo $filter == 'incomplete' ? 'active' : ''; ?>">Incomplete</a>
            <a href="?filter=completed" class="btn <?php echo $filter == 'completed' ? 'active' : ''; ?>">Completed</a>
        </div>
    </div>
    
    <div class="tasks-section">
        <h3>Your Tasks</h3>
        
        <?php if (empty($tasks)): ?>
            <p>No tasks found for the selected filter.</p>
        <?php else: ?>
            <div class="tasks-list">
                <?php foreach ($tasks as $task): ?>
                    <div class="task-item <?php echo $task['is_completed'] ? 'completed' : ''; ?>">
                        <div class="task-info">
                            <h4><?php echo htmlspecialchars($task['task_name']); ?></h4>
                            <p>Target Date: <?php echo date('M d, Y', strtotime($task['target_date'])); ?></p>
                            <?php if ($task['is_completed']): ?>
                                <p class="completed-date">Completed: <?php echo date('M d, Y', strtotime($task['completed_date'])); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="task-actions">
                            <?php if (!$task['is_completed']): ?>
                                <form method="POST" action="filter_tasks.php" style="display: inline;">
                                    <input type="hidden" name="task_id" value="<?php echo $task['task_id']; ?>">
                                    <input type="hidden" name="action" value="complete">
                                    <button type="submit" class="btn btn-success">Mark Complete</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
