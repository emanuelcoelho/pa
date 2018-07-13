<?php

	// verifica se o utilizador tem permissão para criar mensagens

	// se não tiver permissão
	if($_SESSION['criar_msg']==0)
	{
		// expulsa o utilizador da página actual
		header('Location: index.php');
	}	
?>