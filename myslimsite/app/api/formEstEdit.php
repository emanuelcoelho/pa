<?php

$app->put('/api/formEstEdit/update', function($request, $response, $args) {

	require_once('dbconnect_teste.php');

	$descricao = $request->getParsedBody()['descricao'];
	$id = $request->getParsedBody()['idest'];

	$sql = "UPDATE `teste_estado` SET `descricao` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("si", $descricao, $id);

	$stmt->execute();	
});


?>