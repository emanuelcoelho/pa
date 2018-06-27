<?php

$app->put('/api/formEditGroup/update', function($request, $response, $args) {

	require_once('dbconnect_teste.php');

	$descricao = $request->getParsedBody()['descricao'];
	$ver = $request->getParsedBody()['ver'];
	$reservar = $request->getParsedBody()['reservar'];
	$ver_admin = $request->getParsedBody()['ver_admin'];
	$reservas = $request->getParsedBody()['reservas'];
	$criar_editar = $request->getParsedBody()['criar_editar'];
	$user_ver = $request->getParsedBody()['user_ver'];
	$user_editar = $request->getParsedBody()['user_editar'];
	$id = $request->getParsedBody()['idgroup'];

	$sql = "UPDATE `grupo` SET `descricao` = ?, `ver` = ?, `reservar` = ?, `ver_admin` = ?, `reservas` = ?, `criar_editar` = ?, `user_ver` = ?, `user_editar` = ? WHERE `id` = ?";

	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("siiiiiiii", $descricao, $ver, $reservar, $ver_admin, $reservas, $criar_editar, $user_ver, $user_editar, $id);

	$stmt->execute();	
});


?>