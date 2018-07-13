<?php
	// verifica se o utilizador tem permissões para editar reservas

	// se não tiver permissão
	if($_SESSION['reservas']==0)
	{
		// expulsa utilizador da página actual
		header('Location: index.php');
	}
?>