<?php @session_start();
$con = new PDO('mysql:host=localhost;dbname=ecommercefase1', 'root', '');
$con->exec('set names utf8');
 ?>