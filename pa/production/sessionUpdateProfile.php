<?php
	// atualiza as variaveis session para refletir as mudanças feitas na bd
	// recolhe o id do user activo	
	$sql = "SELECT * FROM user WHERE id = '".$_SESSION['id']."' ";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	// actualiza as informacoes de sessao com as novas informacoes da bd
	$_SESSION['username'] = $row['username'];
	$_SESSION['password'] = $row['password'];
	$_SESSION['email'] = $row['email'];
?>