<?php
   session_start();

?>
<!DOCTYPE html>
<html>
<head>
   <title>Produk | Lisna Jati Jepara</title>
   <nav class="navbar" style="background-color: #e3f2fd;">
      <a href="index.php" class="btn btn-success">Kembali Beranda</a>
   </nav>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>


<div class="container">
<h1>Tabel Produk</h1>


<a href="create_produk.php" class="btn btn-success">tambah produk</a>


<?php


   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
   }


?>


<table class="table table-bordered">
   <tr>
      <th>ID barang</th>
      <th>Nama barang</th>
      <th>Deskripsi barang</th>
      <th>Kategori barang</th>
      <th>Pemasok barang</th>
      <th>Kontak</th>
      <th>Opsi Tambahan</th>

   </tr>
   <?php

      require 'config_produk.php';

      $produk = $collection->aggregate([
          [
            '$lookup' => [
            'from' => 'pemasok',
            'localField' => 'nama_pemasok',
            'foreignField' => 'nama_pemasok',
            'as' => 'nama_pemasok'
            ]
         ],
         ['$unwind' => '$nama_pemasok'],
      ]);


      foreach($produk as $pr) {
         echo "<tr>";
         echo "<td>".$pr->_id."</td>";
         echo "<td>".$pr->nama."</td>";
         echo "<td>".$pr->deskripsi."</td>";
         echo "<td>".$pr->kategori."</td>";
         echo "<td>".$pr->nama_pemasok->nama_pemasok."</td>";
         echo "<td>".$pr->nama_pemasok->kontak."</td>";

         echo "<td>";
         echo "<a href='edit_produk.php?id=".$pr->_id."' class='btn btn-primary'>Edit</a>";
         echo "<a href='delete_produk.php?id=".$pr->_id."' class='btn btn-danger'>Delete</a>";
         echo "</td>";
         echo "</tr>";
      };


   ?>
</table>
</div>


</body>
</html>