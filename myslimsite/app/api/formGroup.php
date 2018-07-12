<?php
	
	// insere novo grupo na bd
	$app->post('/api/formGroup/insertGroup', function($request, $response, $args) {

		require_once('dbconnect_teste.php');
		
		$query = "INSERT INTO `grupo` (`descricao`, `ver`, `reservar`, `ver_admin`, `reservas`, `criar_editar`, `user_ver`, `user_editar`, `criar_msg`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$stmt = $mysqli->prepare($query);

		$stmt->bind_param("siiiiiiii", $descricao, $ver, $reservar, $ver_admin, $reservas, $criar_editar, $user_ver, $user_editar, $criar_msg);

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];
		$ver = $request->getParsedBody()['ver'];
		$reservar = $request->getParsedBody()['reservar'];
		$ver_admin = $request->getParsedBody()['ver_admin'];
		$reservas = $request->getParsedBody()['reservas'];
		$criar_editar = $request->getParsedBody()['criar_editar'];
		$user_ver = $request->getParsedBody()['user_ver'];
		$user_editar = $request->getParsedBody()['user_editar'];
		$criar_msg = $request->getParsedBody()['criar_msg'];

		$stmt->execute();	  
	});
?>