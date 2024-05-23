<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$status = $_SESSION['status'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Your status: <?php echo $status; ?></p>

    <?php if ($status === 'Administrator'): ?>
        <p>This is the Administrator view.</p>
        <!-- Add Administrator-specific content here -->
    <?php elseif ($status === 'Member'): ?>
        <p>This is the Member view.</p>
        <!-- Add Member-specific content here -->
    <?php endif; ?>

    <a href="logout.php">Logout</a>
</body>
</html>
