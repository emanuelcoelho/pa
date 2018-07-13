<?php

	// verifica se o utilizador actual tem permissão para ver

	// se não tem permissão
	if($_SESSION['ver']==0)
	{
		// é expulso da página actual
	header('Location: index.php');
	}
?>