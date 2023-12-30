<?php


session_start();
require 'config_transaksi.php';


$collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);


$_SESSION['success'] = "Transaksi sukses di hapus";
header("Location: transaksi.php");


?>