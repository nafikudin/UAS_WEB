<?php


session_start();


if(isset($_POST['submit'])){


   require 'config_stok.php';


   $insertOneResult = $collection->insertOne([
       'jumlah' => $_POST['jumlah'],
       'lokasi' => $_POST['lokasi'],
       'jumlah' => $_POST['jumlah'],
       'status' => $_POST['status'],
   ]);


      $_SESSION['success'] = "stok sukses ditambahkan";
   header("Location: stok.php");
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
   <h1>Tambah Stok Barang Baru</h1>
   <a href="stok.php" class="btn btn-primary">Kembali</a>


   <form method="POST">
      <div class="form-group">
         <strong>Jumlah Barang:</strong>
         <input type="text" name="jumlah" required="jumlah" class="form-control" placeholder="Masukkan jumlah barang">
      </div>
      <div class="form-group">
         <strong>Lokasi barang:</strong>
         <input type="text" name="lokasi" required="lokasi" class="form-control" placeholder="Berikan lokasi barang">
      </div>
      <div class="form-group">
         <strong>status barang:</strong>
         <input type="text" name="status" required="status" class="form-control" placeholder="Masukkan pemsok barang">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
      </div>
   </form>
</div>


</body>
</html>