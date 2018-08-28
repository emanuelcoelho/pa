<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db_name = "websitedb";
	$mysqli = new mysqli($host, $user, $pass, $db_name);
	$mysqli->query("SET NAMES utf8");
?>