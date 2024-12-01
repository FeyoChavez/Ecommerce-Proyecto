<?php @session_start();
$con = new PDO('mysql:host=localhost;dbname=ecommerce2', 'root', '');
$con->exec('set names utf8');
 ?>