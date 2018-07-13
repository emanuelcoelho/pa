<?php

	// verifica se o utilizador tem permissão para ver utilizadores

	// se não tem permissão
	if($_SESSION['user_ver']==0)
	{
		// expulsa o utilizador da página actual
		header('Location: index.php');
	}	
?>