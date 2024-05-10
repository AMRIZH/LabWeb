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
    <h3>Daftar Jenis Buku</h3>
    <table border="1" width="50%">
      <tr>
        <th width="30%" align="center"><b>Kode Buku</b></th>
        <td width="30%" align="center"><b>Nama jenis</b></td>
        <td width="30%" align="center"><b>keterangan jenis</b></td>
      </tr>
      <?php
      $sql= "SELECT * FROM buku";
      $result= mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
        <td width='30%'>" . $row['kode_buku'] . "</td>
        <td width='30%'>" . $row['nama_jenis'] . "</td>
        <td width='30%'>" . $row['ket_jenis'] . "</td>
        </tr>";
      }
      ?>
    </table>
    <br>
    <h3>Buku</h3>
    <form action="" method="POST">
      <table border="0">
        <tr>
          <td width="25%">Kode Buku</td>
          <td width="5%">:</td>
          <td width="65%"><input type="text name=kode_buku" size="10"></td>
        </tr>
        <tr>
        <td width="25%">Kode Jenis</td>
          <td width="5%">:</td>
          <td width="65%">
            <select name="kode_jenis">
              <?php
              $sql= "SELECT kode_jenis FROM jenis_buku";
              $result= mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result)){
                echo "<option value ='" . $row['kode_jenis'] . "'>" . $row['kode_jenis'] . "</option>";
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td width="25%">Nama Buku</td>
          <td width="5%">:</td>
          <td width="65%"><input type="text" name="nama_buku"></td>
        </tr>
      </table>
      <input type="submit" value="insert" name="insert_buku">
      <input type="submit" value="update" name="update_buku">
      <input type="submit" value="delete" name="delete_buku">
    </form>

    <?php
    if(isset($_POST['insert_buku'])){
      $kode_buku= $_POST['kode_buku'];
      $kode_jenis=$_POST['kode_jenis'];
      $nama_buku=$_POST['nama_buku'];

      $sql= "INSERT INTO buku (kode_buku,kode_jenis,nama_buku) VALUES ('$kode_buku','$kode_jenis','$nama_buku')";
      mysqli_query($conn,$sql);
    }

    if(isset($_POST['update_buku'])){
      $kode_buku= $_POST['kode_buku'];
      $kode_jenis=$_POST['kode_jenis'];
      $nama_buku=$_POST['nama_buku'];


      $sql = "UPDATE buku SET kode_jenis='$kode_jenis', nama_buku='$nama_buku' WHERE kode_buku='$kode_buku'";
      mysqli_query($conn,$sql);
    }

    if(isset($_POST['delete_buku'])){
      $kode_buku=$_POST['$kode_buku'];

      $sql="DELETE FROM buku WHERE kode_buku='$kode_buku'";
      mysqli_query($conn,$sql);
    }
    ?>

    <br>
    <h3>Daftar Buku</h3>
    <table border="1" widht="50%">
      <th>
        <td align="center" widht="20%"><b>Kode buku</b></td>
        <td align='center' width='20%'><b>Kode Jenis</b></td>
        <td align='center' width='20%'><b>Nama Buku</b></td>
      </th>
      <?php
      $sql="SELECT * FROM buku";
      $result=mysqli_query($conn,$sql);
      while ($row=mysqli_fetch_assoc($result)){
        echo "<tr>
        <td width='20%'>". $row['kode_buku'] ."</td>
        <td width='20%'>". $row['kode_jenis'] ."</td>
        <td width='20%'>". $row['nama_buku'] ."</td>
        </tr)";
      }
      ?>
    </table>
  </center>
</body>
</html>