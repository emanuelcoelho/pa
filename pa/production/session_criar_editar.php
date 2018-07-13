<?php

	// verifica se o utilizador tem permissão para criar e editar itens

	// se não tiver permissão
	if($_SESSION['criar_editar']==0)
	{
		// expulsa o utilizador da página actuaç
		header('Location: index.php');
	}
?>