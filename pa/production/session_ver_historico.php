<?php

	// verifica se o utilizador activa tem permissão para ver o histórico de outros utilizadores

	// se nao tiver permissão
	if($_SESSION['ver_historico']==0)
	{
		// é expulso da página actual
	header('Location: index.php');
	}
?>