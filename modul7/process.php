<!DOCTYPE html>
<html>
<head>
    <title>Form Submission Result</title>
</head>
<body>
    <h2>Form Submission Result</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p><strong>Nama:</strong> " . $_POST["txtName"] . "</p>";
        echo "<p><strong>Birth Date:</strong> " . $_POST["txtDate"] . "/" . $_POST["txtMonth"] . "/" . $_POST["txtYear"] . "</p>";
        echo "<p><strong>Alamat:</strong> " . $_POST["txtAddress"] . "</p>";
        echo "<p><strong>City:</strong> " . $_POST["txtCity"] . "</p>";
    } else {
        echo "<p>No form data submitted.</p>";
    }
    ?>
</body>
</html>
