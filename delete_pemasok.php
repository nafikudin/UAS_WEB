<?php


session_start();
require 'config_pemasok.php';


$collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);


$_SESSION['success'] = "Produk sukses di hapus";
header("Location: pemasok.php");


?>