<?php


session_start();


if(isset($_POST['submit'])){


   require 'config_pemasok.php';


   $insertOneResult = $collection->insertOne([
       'nama_pemasok' => $_POST['nama_pemasok'],
       'kontak' => $_POST['kontak'],
   ]);

   $_SESSION['success'] = "Produk sukses diperbarui";
   header("Location: pemasok.php");
}


?>


<!DOCTYPE html>
<html>
<head>
   <title>Daftar Inventaris Guadang PT. Lisna Jati Jepara</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>


<div class="container">
   <h1>Tambah Daftar pemasok</h1>
   <a href="pemasok.php" class="btn btn-primary">Kembali</a>


   <form method="POST">
      <div class="form-group">
         <strong>Nama Pemasok:</strong>
         <input type="text" name="nama_pemasok" required="nama" class="form-control" placeholder="Masukkan nama pemasok">
      </div>
      <div class="form-group">
         <strong>Kontak Pemasok:</strong>
         <input type="text" name="kontak" required="kontak" class="form-control" placeholder="Masukkan nomor pemasok">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
      </div>
   </form>
</div>


</body>
</html>