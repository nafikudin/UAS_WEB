<?php
   session_start();
require_once __DIR__ ."/vendor/autoload.php";
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient ->lisna_jati;
$collection = $database->transaksi;

?>
<!DOCTYPE html>
<html>
<head>
   <title>Transaksi | Lisna Jati Jepara</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   <a href="index.php" text-align: right class="btn btn-success">Kembali Beranda</a>
</head>
<body>


<div class="container">
<h1>Tabel Transaksi</h1>


<a href="create_transaksi.php" class="btn btn-success">tambah laporan transaksi</a>


<?php


   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
   }


?>


<table class="table table-bordered">
   <tr>
      <th>ID transaksi</th>
      <th>Jenis</th>
      <th>Tanggal transaksi</th>
      <th>Jumlah barang</th>
      <th>Opsi Tambahan</th>

   </tr>
   <?php
      $transaksi = $collection->find([]);


      foreach($transaksi as $transaksi) {
         echo "<tr>";
         echo "<td>".$transaksi->_id."</td>";
         echo "<td>".$transaksi->jenis."</td>";
         echo "<td>".$transaksi->tanggal."</td>";
         echo "<td>".$transaksi->jumlah."</td>";
         echo "<td>";
         echo "<a href='edit_transaksi.php?id=".$transaksi->_id."' class='btn btn-primary'>Edit</a>";
         echo "<a href='delete_transaksi.php?id=".$transaksi->_id."' class='btn btn-danger'>Delete</a>";
         echo "</td>";
         echo "</tr>";
      };


   ?>
</table>
</div>


</body>
</html>