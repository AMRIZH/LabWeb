<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php $conn = mysqli_connect('localhost','root','','perpustakaan'); ?>
  <title>Document</title>
</head>
<body>
  <center>
    <h3>jenis Buku</h3>
    <form method="POST" action="">
      <table border="0" width="30%">
        <tr>
          <td width="30%">Kode jenis</td>
          <td width="5%">:</td>
          <td width="65%"><input type="text" name="kode_jenis" size="10"></td>
        </tr>
        <tr>
          <td width="30%">Nama jenis</td>
          <td width="5%">:</td>
          <td width="65%"><input type="text" name="nama_jenis" size="10"></td>
        </tr>
        <tr>
          <td width="30%">Keterangan jenis</td>
          <td width="5%">:</td>
          <td width="65%"><input type="text" name="ket_jenis" size="10"></td>
        </tr>
      </table>
      <input type="submit" value="Insert" name="insert_jenis">
      <input type="submit" value="Update" name="update_jenis">
      <input type="submit" value="Delete" name="delete_jenis">
    </form>

    <?php
    if(isset($_POST['insert_jenis'])){
      $kode_jenis = $_POST['kode_jenis'];
      $nama_jenis = $_POST['nama_jenis'];
      $ket_jenis = $_POST['ket_jenis'];

      $sql = "INSERT INTO jenis_buku (kode_jenis,nama_jenis,ket_jenis) VALUES ('$kode_jenis','$nama_jenis','$ket_jenis')";
      mysqli_query($conn,$sql);
    }
    if(isset($_POST['update_jenis'])){
      $kode_jenis = $_POST['kode_jenis'];
      $nama_jenis = $_POST['nama_jenis'];
      $ket_jenis = $_POST['ket_jenis'];

      $sql = "UPDATE jenis_buku SET 
      nama_jenis='$nama_jenis', 
      ket_jenis='$ket_jenis',
      WHERE kode_jenis='$kode_jenis'";
      mysqli_query($conn,$sql);
    }
    if(isset($_POST['delete_jenis'])){
      $kode_jenis=$_POST['kode_jenis'];

      $sql = "DELETE FROM jenis_buku WHERE kode_jenis='$kode_jenis'";
      mysqli_query($conn,$sql);
    }
    ?>
    <!-- table buku -->
    <br>
    <h3>Daftar Buku</h3>
    <form action="" method="POST">
      <table border="1" width="50%">
        <tr>
          <th width="30%" align="center"><b>Kode Buku</b></th>
          <td width="30%" align="center"><b>Kode jenis</b></td>
          <td width="30%" align="center"><b>Nama buku</b></td>
        </tr>
        <?php
        $sql= "SELECT * FROM buku";
        $result= mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
          echo "<tr>
          <td width='30%'>" . $row['kode_buku'] . "</td>
          <td width='30%'>" . $row['jenis_buku'] . "</td>
          <td width='30%'>" . $row['nama_buku'] . "</td>
          </tr>";
        }
        ?>
      </table>
    </form>
  </center>
</body>
</html>