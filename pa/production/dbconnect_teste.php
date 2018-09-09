<?php
	// informacoes da ligacao com a bd
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db_name = "websitedb";
	$mysqli = new mysqli($host, $user, $pass, $db_name);
	// todos os queries ficam em utf8 para poder enviar e receber letras com acentos, etc...
	$mysqli->query("SET NAMES utf8");
?>