<?php


session_start();


require 'config_transaksi.php';


if (isset($_GET['id'])) {
   $transaksi = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
       ['$set' => ['jenis' => $_POST['jenis'], 'tanggal' => $_POST['tanggal'], 'jumlah' => $_POST['jumlah']]]
   );


   $_SESSION['success'] = "Transaksi sukses diperbarui";
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
   <h1>Edit Data Transaksi Barang</h1>
   <a href="transaksi.php" class="btn btn-primary">Kembali</a>


   <form method="POST">
      <div class="form-group">
         <strong>ID transaksi:</strong>
         <textarea class="form-control" name="jenis" readonly><?php echo $transaksi->_id; ?></textarea>
      </div>
      <div class="form-group">
         <strong>Jenis transaksi:</strong>
         <textarea class="form-control" name="jenis" placeholder="Masukkan jenis barang"><?php echo $transaksi->jenis; ?></textarea>
      </div>
       <div class="form-group">
         <strong>Tanggal transaksi barang:</strong>
         <textarea class="form-control" name="tanggal" placeholder="Masukkan tanggal barang"><?php echo $transaksi->tanggal; ?></textarea>
      </div>
       <div class="form-group">
         <strong>Jumlah barang:</strong>
         <textarea class="form-control" name="jumlah" placeholder="Masukkan detail jumlah barang"><?php echo $transaksi->jumlah; ?></textarea>
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Selesai</button>
      </div>
   </form>
</div>


</body>
</html>