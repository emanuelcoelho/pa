<?php
	// verifica se o utilizador tem permissão para reservar

	// se não tem permissão
	if($_SESSION['reservar']==0)
	{
		// expulsa o utilizador da página actual
		header('Location: index.php');
	}
?>