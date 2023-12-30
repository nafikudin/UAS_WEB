<?php


session_start();


if(isset($_POST['submit'])){


   require 'config_produk.php';


   $insertOneResult = $collection->insertOne([
       'nama' => $_POST['nama'],
       'deskripsi' => $_POST['deskripsi'],
       'kategori' => $_POST['kategori'],
       'nama_pemasok' => $_POST['nama_pemasok'],
      //  'kontak' => $_POST['kontak'],
   ]);


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
   <h1>Tambah Barang Baru</h1>
   <a href="produk.php" class="btn btn-primary">Kembali</a>


   <form method="POST">
      <div class="form-group">
         <strong>Nama Barang:</strong>
         <input type="text" name="nama" required="nama" class="form-control" placeholder="Masukkan nama barang">
      </div>
      <div class="form-group">
         <strong>Deskripsi barang:</strong>
         <input type="text" name="deskripsi" required="deskripsi" class="form-control" placeholder="Berikan deskripsi barang">
      </div>
      <div class="form-group">
         <strong>Kategori barang:</strong>
         <input type="text" name="kategori" required="kategori" class="form-control" placeholder="Masukkan kategori barang">
      </div>
      <div class="form-group">
         <strong>Pemasok barang:</strong>
         <select name="nama_pemasok" class="form-control">
               <?php require 'config_pemasok.php';
                  $pemasok = $collection->find([]);
               ?>
            <?php foreach($pemasok as $p ) : ?>
               <option value="<?= $p->nama_pemasok; ?>"><?= $p->nama_pemasok; ?></option>
            <?php endforeach; ?>
         </select>
      </div>
       <!-- <div class="form-group">
         <strong>Kontak Pemasok:</strong>
         <input type="text" name="kontak" required="kontak" class="form-control" placeholder="Masukkan kontak pemasok barang">
      </div> -->
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
      </div>
   </form>
</div>


</body>
</html>