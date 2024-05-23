<?php
session_start();

echo "You have successfully logged in as " . $_SESSION['username'] . " and you are registered as " . $_SESSION['status'];
?>

<br>

Please log out by clicking the link <a href='logout.php'>here</a>.
