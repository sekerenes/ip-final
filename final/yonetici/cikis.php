<?php require_once ("kutuphane/baglanti.php"); ?>

<?php 

	session_destroy();
	unset($_SESSION);
	yonlendir("giris.php");



?>