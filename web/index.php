<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="hero">
        <h2>Welcome to Task Tracker</h2>
        <p>Organize your tasks and stay productive!</p>
        
        <?php if (!isset($_SESSION['user_id'])): ?>
            <div class="cta-buttons">
                <a href="register.php" class="btn btn-primary">Get Started</a>
                <a href="login.php" class="btn btn-secondary">Login</a>
            </div>
        <?php else: ?>
            <div class="cta-buttons">
                <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
