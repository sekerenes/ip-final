<?php session_start(); ?>
<?php require_once ("fonksiyon.php"); ?>
<?php
$sunucu="localhost";
$kadi="root";
$sifre="";
$vt="vt";

$baglanti=mysqli_connect($sunucu,$kadi,$sifre,$vt);

mysqli_set_charset($baglanti, 'utf8');

if (mysqli_connect_errno()) {
 die("MySQL bağlantı hatası: " . mysqli_connect_error());
}



?>