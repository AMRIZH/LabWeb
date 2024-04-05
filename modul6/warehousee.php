<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Goods</title>
  <?php
    $conn = mysqli_connect('localhost', 'root', '', 'warehouse');
  ?>
</head>
<body><center>
  <!-- form input data goods -->
  <h3>Enter item Data</h3>
  <table border='0' width='30%'>
  <form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
  <tr>
    <td width='25%'>Item Code</td>
    <td width='5%'>:</td>
    <td width='65%'><input type="text" name='item_code' size='10'></td>
  </tr>
  <tr>
    <td width='25%'>Item Name</td>
    <td width='5%'>:</td>
    <td width='65%'><input type="text" name='item_name' size='30'></td>
  </tr>
  <tr><td width='25%'>Warehouse</td>
  <td width='5%'>:</td>
  <td width='65%'>
  <select name='warehouse_code'>
    <?php
      $sql = "SELECT * FROM warehouse";
      $retval = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($retval)) {
        echo "<option value=[warehouse_code]>' $row[warehouse_name]'</option>";
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
  $item_code = $_POST['item_code'];
  $item_name = $_POST['item_name'];
  $warehouse_code = $_POST['warehouse_code'];
  $submit = $_POST['submit'];
  $input = "INSERT INTO goods(item_code, item_name, warehouse_code) VALUES ('$item_code', '$item_name', '$warehouse_code')";
  // error handling
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($submit)) {
    if ($item_code == '') {
      echo "</br>Item Code cannot be empty, please fill it first";
    } elseif ($item_name == '') {
      echo "</br>Item Name cannot be empty, please fill it first";
    } else {
      mysqli_query($conn, $input);
      echo '</br>Data entered successfully';
    }
  }
  ?>
  <hr>
  <H3>Goods List</H3>
  <table border='1' width='50%'>
  <tr>
    <td align='center' width='20%'><b>Item Code</b></td>
    <td align='center' width='30%'><b>Item Name</b></td>
    <td align='center' width='30%'><b>Warehouse</b></td>
    <!-- <td align='center' width='20%'><b>Action</b></td> -->
  </tr>
  <?php
  $cari = "SELECT * FROM goods, warehouse WHERE goods.warehouse_code = warehouse.warehouse_code ORDER BY item_code";
  $hasil_cari = mysqli_query($conn, $cari);
  while ($data = mysqli_fetch_row($hasil_cari)) {
    echo "<tr>
    <td width='20%'>$data[0]</td>
    <td width='30%'>$data[1]</td>
    <td width='30%'>$data[4]</td>
    </tr>";
  }
  ?>
  </table>
</center></body>
</html>