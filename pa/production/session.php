<?php
   // iniciar uma sessão
	session_start();
	$username=$_SESSION['username'];
	if (empty($_SESSION['username'])) {
	 
		// não existe sessão iniciada
		// neste caso, levamos o utilizador para a página de login
		header('Location: login.php');
		exit();
	}
?>