<?php
	// atualiza as variaveis session para refletir as mudanças feitas no grupo
	
	// recolhe id do grupo do utilizador activo	
	$sql = "SELECT * FROM user WHERE id = '".$_SESSION['id']."' ";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	$group = $row['id_grupo'];

	// recolhe informações do grupo do utilizador activo
	$sql2 = "SELECT * FROM grupo WHERE id = '$group' ";
	$result2 = mysqli_query($mysqli,$sql2);
	$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

	// actualiza as permissoes
	$_SESSION['ver'] = $row2['ver'];
	$_SESSION['reservar'] = $row2['reservar'];
	$_SESSION['ver_admin'] = $row2['ver_admin'];
	$_SESSION['reservas'] = $row2['reservas'];
	$_SESSION['criar_editar'] = $row2['criar_editar'];
	$_SESSION['user_ver'] = $row2['user_ver'];
	$_SESSION['user_editar'] = $row2['user_editar'];
?>