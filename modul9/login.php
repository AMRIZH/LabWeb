<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

mysql_connect('localhost', 'root', '');
mysql_select_db('informatics');

$username = $_POST['username'];
$password = $_POST['password'];
$submit = $_POST['submit'];

if ($submit) {
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);

    if ($row['username'] != "") {
        // Logged in successfully
        $_SESSION['username'] = $row['username'];
        $_SESSION['status'] = $row['status'];
        ?>
        <script language="JavaScript">
            alert('You are logged in as <?php echo $row['username']; ?>');
            document.location='loginresult.php';
        </script>
        <?php
    } else {
        // Login failed
        ?>
        <script language="JavaScript">
            alert('Login Failed');
            document.location='login.php';
        </script>
        <?php
    }
}
?>

<form method="post" action="login.php">
    <p align="center">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Login">
    </p>
</form>
