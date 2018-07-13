<?php

	// verifica se o utilizador tem permissão para editar utilizadores e grupos

	// se não tem permissão
	if($_SESSION['user_editar']==0)
	{
		// expulsa utilizador da página actual
		header('Location: index.php');
	}	
?>