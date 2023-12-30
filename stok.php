<?php
   session_start();
require_once __DIR__ ."/vendor/autoload.php";
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient ->lisna_jati;
$collection = $database->stok;

?>
<!DOCTYPE html>
<html>
<head>
   <title>Stok | Lisna Jati Jepara</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   <a href="index.php" text-align: right class="btn btn-success">Kembali Beranda</a>
</head>
<body>


<div class="container">
<h1>Tabel Stok</h1>


<a href="create_stok.php" class="btn btn-success">tambah stok</a>


<?php


   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
   }


?>


<table class="table table-bordered">
   <tr>
      <th>ID stok</th>
      <th>Jumlah Stok</th>
      <th>Lokasi Stok</th>
      <th>Status Barang</th>
      <th>Opsi Tambahan</th>

   </tr>
   <?php
      $stok = $collection->find([]);


      foreach($stok as $stok) {
         echo "<tr>";
         echo "<td>".$stok->_id."</td>";
         echo "<td>".$stok->jumlah."</td>";
         echo "<td>".$stok->lokasi."</td>";
         echo "<td>".$stok->status."</td>";
         echo "<td>";
         echo "<a href='edit_stok.php?id=".$stok->_id."' class='btn btn-primary'>Edit</a>";
         echo "<a href='delete_stok.php?id=".$stok->_id."' class='btn btn-danger'>Delete</a>";
         echo "</td>";
         echo "</tr>";
      };


   ?>
</table>
</div>


</body>
</html>