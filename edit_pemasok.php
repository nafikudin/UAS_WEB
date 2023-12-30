<?php


session_start();


require 'config_pemasok.php';


if (isset($_GET['id'])) {
   $pemasok = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
       ['$set' => ['nama_pemasok' => $_POST['nama_pemasok'], 'kontak' => $_POST['kontak']]]
   );


   $_SESSION['success'] = "pemasok sukses diperbarui";
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
   <h1>Edit Data Pemasok</h1>
   <a href="pemasok.php" class="btn btn-primary">Kembali</a>


   <form method="POST">
      <div class="form-group">
         <strong>ID Pemasok:</strong>
         <textarea class="form-control" name="_id" placeholder="Masukkan id pemasok" readonly><?php echo $pemasok->_id; ?></textarea>
      </div>
      <div class="form-group">
         <strong>Nama Pemasok:</strong>
         <textarea class="form-control" name="nama_pemasok" placeholder="Masukkan nama pemasok" ><?php echo $pemasok->nama_pemasok; ?></textarea>
      </div>
       <div class="form-group">
         <strong>Nomor Pemasok:</strong>
         <textarea class="form-control" name="kontak" placeholder="Masukkan nomor pemasok"><?php echo $pemasok->kontak; ?></textarea>
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Selesai</button>
      </div>
   </form>
</div>


</body>
</html>