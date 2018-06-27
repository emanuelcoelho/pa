<?php

$app->post('/api/formGroup/insertGroup', function($request, $response, $args) {

	require_once('dbconnect_teste.php');
	

	$query = "INSERT INTO `grupo` (`descricao`, `ver`, `reservar`, `ver_admin`, `reservas`, `criar_editar`, `user_ver`, `user_editar`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("siiiiiii", $descricao, $ver, $reservar, $ver_admin, $reservas, $criar_editar, $user_ver, $user_editar);

	
	$descricao = $request->getParsedBody()['descricao'];
	$ver = $request->getParsedBody()['ver'];
	$reservar = $request->getParsedBody()['reservar'];
	$ver_admin = $request->getParsedBody()['ver_admin'];
	$reservas = $request->getParsedBody()['reservas'];
	$criar_editar = $request->getParsedBody()['criar_editar'];
	$user_ver = $request->getParsedBody()['user_ver'];
	$user_editar = $request->getParsedBody()['user_editar'];

	$stmt->execute();	
	
	  
});


?>