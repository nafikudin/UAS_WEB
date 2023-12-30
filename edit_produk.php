<?php


session_start();


require 'config_produk.php';


if (isset($_GET['id'])) {
   $produk = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
       ['$set' => ['nama' => $_POST['nama'], 'deskripsi' => $_POST['deskripsi'], 'kategori' => $_POST['kategori'], 'nama_pemasok' => $_POST['nama_pemasok']]]
   );


   $_SESSION['success'] = "Produk sukses diperbarui";
   header("Location: produk.php");
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
   <h1>Edit Barang</h1>
   <a href="produk.php" class="btn btn-primary">Kembali</a>


   <form method="POST">
      <!-- tidak perlu ditambahkan -->
      <!-- <div class="form-group">
         <strong>ID barang:</strong>
         <textarea class="form-control" placeholder="Masukkan id barang" readonly><?php echo $produk->_id; ?></textarea>
      </div> -->
      <div class="form-group">
         <strong>Nama barang:</strong>
         <textarea class="form-control" name="nama" placeholder="Masukkan nama barang"><?php echo $produk->nama; ?></textarea>
      </div>
       <div class="form-group">
         <strong>Deskripsi Barang:</strong>
         <textarea class="form-control" name="deskripsi" placeholder="Masukkan deskripsi barang"><?php echo $produk->deskripsi; ?></textarea>
      </div>
       <div class="form-group">
         <strong>Kategori barang:</strong>
         <textarea class="form-control" name="kategori" placeholder="Masukkan kategori barang"><?php echo $produk->kategori; ?></textarea>
      </div>
       <div class="form-group">
         <strong>Pemasok barang:</strong>
         <textarea class="form-control" name="nama_pemasok" placeholder="Masukkan detail pemasok barang"><?php echo $produk->nama_pemasok; ?></textarea>
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Selesai</button>
      </div>
   </form>
</div>


</body>
</html>