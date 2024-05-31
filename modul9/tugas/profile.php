<?php
session_start();

if (!isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit;
}

$Status = $_SESSION['Status'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['Username']; ?>!</h2>
    <p>Your Status: <?php echo $Status; ?></p>

    <?php if ($Status === 'Administrator'): ?>
        <p>This is the Administrator view.</p>
        <!-- Add Administrator-specific content here -->
    <?php elseif ($Status === 'Member'): ?>
        <p>This is the Member view.</p>
        <!-- Add Member-specific content here -->
    <?php endif; ?>

    <a href="logout.php">Logout</a>
</body>
</html>
