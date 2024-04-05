<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
  <?php
    $conn = mysqli_connect('localhost', 'root', '', 'warehouse');
  ?>
</head>
<body>

<!-- form barang -->
<h3>Masukkan Data Barang :</h3>
<table border='0' width='30%'>
<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
<tr>
<td width='25%'>Kode Barang</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name='kode_barang' size='10'></td></tr>
<tr><td width='25%'>Nama Barang</td>
<td width='5%'>:</td>
<td width='65%'><input type="text" name='nama_barang' size='30'></td></tr>
<tr><td width='25%'>Gudang</td>
<td width='5%'>:</td>
<td width='65%'>
<select name='kode_gudang'>
<?php
$sql = "SELECT * FROM gudang";
$retval = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($retval)) {
  echo "<option value='" . $row['kode_gudang'] . "'>" . $row['nama_gudang'] . "</option>";
}
?>
</select>
</td></tr>
</table>
<input type="submit" value="Masukkan" name="submit">
</form>

<!-- sistem input data gudang -->
<?php
error_reporting(E_ALL ^ E_NOTICE);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  $kode_barang = $_POST['kode_barang'];
  $nama_barang = $_POST['nama_barang'];
  $kode_gudang = $_POST['kode_gudang'];

  $input = "INSERT INTO barang(kode_barang, nama_barang, kode_gudang) VALUES ('$kode_barang', '$nama_barang', '$kode_gudang')";

  // error handling
  if ($kode_barang == '') {
    echo "</br>Kode Barang tidak boleh kosong, diisi dulu";
  } elseif ($nama_barang == '') {
    echo "</br>Nama Barang tidak boleh kosong, diisi dulu";
  } else {
    mysqli_query($conn, $input);
    echo '</br>Data berhasil dimasukkan';
  }
}
?>

<!-- tampilkan data barang -->
<hr>
<H3>Data Barang</H3>
<table border='1' width='50%'>
<tr>
<td align='center' width='20%'><b>Kode Barang</b></td>
<td align='center' width='30%'><b>Nama Barang</b></td>
<td align='center' width='10%'><b>Lokasi Gudang</b></td>
<td align='center' width='20%'><b>Action</b></td>
</tr>
<?php
$cari = "SELECT barang.kode_barang, barang.nama_barang, gudang.nama_gudang 
         FROM barang 
         INNER JOIN gudang ON barang.kode_gudang = gudang.kode_gudang";
$hasil_cari = mysqli_query($conn, $cari);
while ($data = mysqli_fetch_row($hasil_cari)) {
  echo "<tr>
        <td width='20%'>$data[0]</td>
        <td width='30%'>$data[1]</td>
        <td width='30%'>$data[2]</td>
        <td width='20%' align='center'>
          <a href='?edit=$data[0]'>Edit</a>
          <a href='?delete=$data[0]'>Delete</a>
        </td>
        </tr>";
}
// Delete data from database
if (isset($_GET['delete'])) {
  $kode_delete = $_GET['delete'];

  // Delete related records from Barang table
  $delete_barang_query = "DELETE FROM barang WHERE kode_barang = '$kode_delete'";
  mysqli_query($conn, $delete_barang_query);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}

// Edit data in the database
if (isset($_GET['edit'])) {
  $kode_edit = $_GET['edit'];
  $edit_query = "SELECT * FROM barang WHERE kode_barang = '$kode_edit'";
  $hasil_edit = mysqli_query($conn, $edit_query);
  $row_edit = mysqli_fetch_assoc($hasil_edit);
}

if (isset($_POST['submit_edit'])) {
  $kode_edit = $_POST['kode_edit'];
  $nama_edit = $_POST['nama_edit'];
  $nama_gudang_edit = $_POST['gudang_edit'];
  $kode_gudang_edit_query = "SELECT kode_gudang FROM gudang WHERE nama_gudang = '$nama_gudang_edit'";
  $kode_gudang_edit_result = mysqli_query($conn, $kode_gudang_edit_query);
  $row_kode_gudang_edit = mysqli_fetch_assoc($kode_gudang_edit_result);
  $kode_gudang_edit = $row_kode_gudang_edit['kode_gudang'];
  
  $update_query = "UPDATE barang SET nama_barang = '$nama_edit', kode_gudang = '$kode_gudang_edit' WHERE kode_barang = '$kode_edit'";
  mysqli_query($conn, $update_query);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}
?>
<?php
if (isset($_GET['edit'])) {
  echo '
  <h3>Edit Data Barang</h3>
  <form method="POST" action="' . $_SERVER['PHP_SELF'] . '">
    <input type="hidden" name="kode_edit" value="' . $row_edit['kode_barang'] . '">
    <table border="0" width="30%">
      <tr>
        <td width="25%">Kode barang</td>
        <td width="5%">:</td>
        <td width="65%">' . $row_edit['kode_barang'] . '</td>
      </tr>
      <tr>
        <td width="25%">Nama Barang</td>
        <td width="5%">:</td>
        <td width="65%"><input type="text" name="nama_edit" value="' . $row_edit['nama_barang'] . '" size="30" maxlength="50"></td>
      </tr>
      <tr>
        <td width="25%">Gudang</td>
        <td width="5%">:</td>
        <td width="65%">
          <select name="gudang_edit">
          ';

  $gudang_query = "SELECT * FROM gudang";
  $gudang_result = mysqli_query($conn, $gudang_query);
  while ($gudang_row = mysqli_fetch_array($gudang_result)) {
    $selected = ($gudang_row['kode_gudang'] == $row_edit['kode_gudang']) ? 'selected' : '';
    echo "<option value='" . $gudang_row['kode_gudang'] . "' $selected>" . $gudang_row['nama_gudang'] . "</option>";
  }

  echo '
          </select>
        </td>
      </tr>
    </table>
    <input type="submit" name="submit_edit" value="Update">
  </form>
  ';
}
?>


</table>
</body>
</html>
