<?php


session_start();
require 'config_stok.php';


$collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);


$_SESSION['success'] = "Produk sukses di hapus";
header("Location: stok.php");


?>