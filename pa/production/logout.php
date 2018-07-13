<?php

	// faz logout
	session_start();

	// depois de desligar a sessao
	if(session_destroy()) {
		// expulsa utilizador da página actual
		header("Location: login.php");
	}
?>