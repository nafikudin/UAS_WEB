<?php
   session_start();
require_once __DIR__ ."/vendor/autoload.php";
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient ->lisna_jati;
$collection = $database->pemasok;
?>
<!DOCTYPE html>
<html>
<head>
   <title>Pemasok | Lisna Jati Jepara</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   <a href="index.php" text-align: right class="btn btn-success">Kembali Beranda</a>
</head>
<body>


<div class="container">
<h1>Tabel Nama Pemasok</h1>


<a href="create_pemasok.php" class="btn btn-success">tambah pemasok</a>


<?php


   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
   }


?>


<table class="table table-bordered">
   <tr>
      <th>ID pemasok</th>
      <th>Nama pemasok</th>
      <th>Kontak pemasok</th>
      <th>Opsi Tambahan</th>

   </tr>
   <?php

      $pemasok = $collection->find([]);


      foreach($pemasok as $pemasok) {
         echo "<tr>";
         echo "<td>".$pemasok->_id."</td>";
         echo "<td>".$pemasok->nama_pemasok."</td>";
         echo "<td>".$pemasok->kontak."</td>";
         echo "<td>";
         echo "<a href='edit_pemasok.php?id=".$pemasok->_id."' class='btn btn-primary'>Edit</a>";
         echo "<a href='delete_pemasok.php?id=".$pemasok->_id."' class='btn btn-danger'>Delete</a>";
         echo "</td>";
         echo "</tr>";
      };


   ?>
</table>
</div>


</body>
</html>