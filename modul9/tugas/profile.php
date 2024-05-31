<?php
session_start();

if (!isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit;
}

$Status = $_SESSION['Status'];
$Username = $_SESSION['Username'];

// Check if the user is an administrator
$isAdministrator = ($Status === 'Administrator');

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'informatics';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve users table if the user is an administrator
if ($isAdministrator) {
    $sql = "SELECT Name, Status FROM users";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $usersTable = "<table border='1'><tr><th>Name</th><th>Status</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $usersTable .= "<tr><td>".$row['Name']."</td><td>".$row['Status']."</td></tr>";
        }
        $usersTable .= "</table>";
    } else {
        $usersTable = "No users found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
    <h2>Welcome, <?php echo $Username; ?>!</h2>
    <p>Your Status: <?php echo $Status; ?></p>

    <?php if ($isAdministrator): ?>
        <h3>Users List</h3>
        <?php echo $usersTable; ?>
    <?php else: ?>
        <p>This is the Member view.</p>
        <!-- Add Member-specific content here -->
    <?php endif; ?>

    <a href="logout.php">Logout</a>
</body>
</html>
