<?php


session_start();


if(isset($_POST['submit'])){


   require 'config_transaksi.php';


   $insertOneResult = $collection->insertOne([
       'jenis' => $_POST['jenis'],
       'tanggal' => $_POST['tanggal'],
       'jumlah' => $_POST['jumlah'],
   ]);


      $_SESSION['success'] = "stok sukses ditambahkan";
   header("Location: transaksi.php");
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
   <h1>Tambah Laporan Transaksi Barang</h1>
   <a href="transaksi.php" class="btn btn-primary">Kembali</a>


   <form method="POST">
      <div class="form-group">
         <strong>Jenis transaksi:</strong>
         <input type="text" name="jenis" required="jenis" class="form-control" placeholder="Masukkan jenis transaksi">
      </div>
      <div class="form-group">
         <strong>Tanggal transaksi:</strong>
         <input type="text" name="tanggal" required="tanggal" class="form-control" placeholder="Berikan tanggal transaksi">
      </div>
      <div class="form-group">
         <strong>Jumlah barang:</strong>
         <input type="text" name="jumlah" required="jumlah" class="form-control" placeholder="Masukkan pemsok barang">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
      </div>
   </form>
</div>


</body>
</html>