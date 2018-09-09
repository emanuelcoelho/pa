<?php

	// Verifica se o id do utilizador activo é igual ao id do destinatário da mensagem

	// recolhe o id do utilizador activo
	$user=$_SESSION['id'];

	// recolhe o id da mensagem aberta atraves do url
	$id=$_GET['var'];
	
	// recolhe informações da mensagem
  	$query = "SELECT * FROM `mensagem` WHERE `id`='$id' "; 
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    // se id de utilizador da mensagem for diferente do id do utilizador activo
	if ($row['id_utilizador']!=$user)
	{
		// manda o utilizador activo para fora da pagina actual
		header('Location: index.php');
	}
?>