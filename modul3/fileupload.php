<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload file</title>
</head>
<body>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$direktori = 'images/';
$submit = isset($_POST['submit']);

if ($submit) {
  if (!is_dir($direktori)) {
    mkdir($direktori, 0777, true);
    }
    $nama_foto = $_FILES['foto']['name'];
    $size_foto = $_FILES['foto']['size'];
    $tipe_foto = $_FILES['foto']['type'];
    $upload = $direktori . $nama_foto;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $upload)) {
        echo "<H3>File Berhasil di Upload</H3>";
        echo "</br></br>";
        echo "<img border='0' src='$upload'></br></br>";
        echo "<b>Informasi File :</b></br>";
        echo "Nama File : $nama_foto</br>";
        echo "Ukuran File : $size_foto byte </br>";
        echo "Tipe File : $tipe_foto </br>";
    } else {
        echo "Terjadi kesalahan dalam mengupload file.";
    }
} else {
    ?>
    <form method="POST" enctype='multipart/form-data' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
        Upload file : <input type="file" name='foto' size='20'><br>
        <input type="submit" name="submit" value='upload'>
    </form>
    <?php
}
?>
</body>
</html>