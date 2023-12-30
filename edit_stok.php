<?php


session_start();


require 'config_stok.php';


if (isset($_GET['id'])) {
   $stok = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
       ['$set' => ['jumlah' => $_POST['jumlah'], 'lokasi' => $_POST['lokasi'], 'status' => $_POST['status']]]
   );


   $_SESSION['success'] = "stok sukses diperbarui";
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
   <h1>Edit Stok Barang</h1>
   <a href="stok.php" class="btn btn-primary">Kembali</a>


   <form method="POST">
      <div class="form-group">
         <strong>ID stok:</strong>
         <textarea class="form-control" name="_id" placeholder="Masukkan id stok" readonly><?php echo $stok->_id; ?></textarea>
      </div>
      <div class="form-group">
         <strong>Jumlah barang:</strong>
         <textarea class="form-control" name="jumlah" placeholder="Masukkan jumlah barang"><?php echo $stok->jumlah; ?></textarea>
      </div>
       <div class="form-group">
         <strong>Lokasi stok barang:</strong>
         <textarea class="form-control" name="lokasi" placeholder="Masukkan lokasi barang"><?php echo $stok->lokasi; ?></textarea>
      </div>
       <div class="form-group">
         <strong>Status barang:</strong>
         <textarea class="form-control" name="status" placeholder="Masukkan detail status barang"><?php echo $stok->status; ?></textarea>
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Selesai</button>
      </div>
   </form>
</div>


</body>
</html>