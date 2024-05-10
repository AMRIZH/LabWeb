<html>
<head>
  <title>Amri Zadi Hudaya</title>
  <?php $conn= mysqli_connect('localhost','root','','perpustakaan'); ?>
</head>
<body>
<center>
<h3><b>Jenis buku</b></h3>
<form action="" method="POST">
  <table border="0" width="40%">
    <tr>
      <td width="30%">Kode Jenis</td>
      <td width="5%">:</td>
      <td width="65%"><input type="text" name="kode_jenis"></td>
    </tr>
    <tr>
    <td width="30%">Nama Jenis</td>
      <td width="5%">:</td>
      <td width="65%"><input type="text" name="nama_jenis"></td>
    </tr>
    <tr>
    <td width="30%">keterangan</td>
      <td width="5%">:</td>
      <td width="65%"><input type="text" name="keterangan"></td>
    </tr>
  </table>
  <input type="submit" name="insert_jenis" value="insert">
  <input type="submit" name="update_jenis" value="update">
  <input type="submit" name="delete_jenis" value="delete">
</form>
<?php
if(isset($_POST['insert_jenis'])){
  $kode_jenis=$_POST['kode_jenis'];
  $nama_jenis=$_POST['nama_jenis'];
  $author=$_POST['keterangan'];

  $sql= "INSERT INTO jenis (kode_jenis,nama_jenis,author) VALUES ('$kode_jenis','$nama_jenis','$keterangan')";
  mysqli_query($conn,$sql);
}
if(isset($_POST['update_jenis'])){
  $kode_jenis=$_POST['kode_jenis'];
  $nama_jenis=$_POST['nama_jenis'];
  $keterangan=$_POST['keterangan'];

  $sql="UPDATE jenis SET nama_jenis='$nama_jenis',author='$keterangan' WHERE kode_jenis='$kode_jenis'";
  mysqli_query($conn,$sql);
}
if(isset($_POST['delete_jenis'])){
  $kode_jenis=$_POST['kode_jenis'];

  $sql="DELETE FROM jenis WHERE kode_jenis='$kode_jenis'";
  mysqli_query($conn,$sql);
}
?>
<hr>
<h3>Tabel Jenis</h3>
<table width="60%" border="1">
  <tr>
    <td width="35%">Kode jenis</td>
    <td width="35%">Nama jenis</td>
    <td width="30%">keterangan</td>
  </tr>
  <?php
  $sql="SELECT * FROM jenis";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result)){
    echo "<tr>
    <td width='35%'>".$row['$kode_jenis']."</td>
    <td width='35%'>".$row['$kode_jenis']."</td>
    <td width='30%'>".$row['$kode_jenis']."</td>
    </tr>";
  }
  ?>
</table>
<hr>
<h3>Buku</h3>
<form action="" method="POST">
  <table border="0" width="60%">
    <tr>
      <td width="30%">Kode Buku</td>
      <td width="5%">:</td>
      <td width="65%"><input type="text" name="kode_buku"></td>
    </tr>
    <tr>
      <td width="30%">Kode Jenis</td>
      <td width="5%">:</td>
      <td width="65%">
        <select name="kode_jenisFK">
          <?php
          $sql="SELECT kode_jenis FROM jenis";
          $result=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($result)){
            echo "<option value=".$row['kode_jenis'].">".$row['$kode_jenis']."</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td width="30%">Nama Buku</td>
      <td width="5%">:</td>
      <td width="65%"><input type="text" name="nama_buku"></td>
    </tr>
  </table>
  <input type="submit" name="insert_buku" value="insert">
  <input type="submit" name="update_buku" value="update">
  <input type="submit" name="delete_buku" value="delete">
</form>
<?php
if(isset($_POST['insert_buku'])){
  $kode_buku=$_POST['kode_buku'];
  $kode_jenis=$_POST['kode_jenisFK'];
  $nama_buku=$_POST['nama_buku'];

  $sql= "INSERT INTO buku (kode_buku,kode_jenis,nama_buku) VALUES ('$kode_jenis','$nama_jenis','$nama_buku')";
  mysqli_query($conn,$sql);
}
if(isset($_POST['update_buku'])){
  $kode_buku=$_POST['kode_buku'];
  $kode_jenis=$_POST['kode_jenis'];
  $nama_buku=$_POST['nama_buku'];

  $sql="UPDATE buku SET kode_jenis='$kode_jenis',nama_buku='$nama_buku' WHERE kode_buku='$kode_buku'";
  mysqli_query($conn,$sql);
}
if(isset($_POST['delete_jenis'])){
  $kode_buku=$_POST['kode_buku'];

  $sql="DELETE FROM buku WHERE kode_buku='$kode_buku'";
  mysqli_query($conn,$sql);
}
?>

<hr>
<h3></h3>
</center>
</body>
</html>