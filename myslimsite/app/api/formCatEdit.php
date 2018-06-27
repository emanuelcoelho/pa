<?php

$app->put('/api/formCatEdit/updateItem', function($request, $response, $args) {

	require_once('dbconnect_teste.php');

	$descricao = $request->getParsedBody()['descricao'];
	$id = $request->getParsedBody()['idcat'];

	$sql = "UPDATE `categoria_item` SET `descricao` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("si", $descricao, $id);

	$stmt->execute();	
});

$app->put('/api/formCatEdit/updateKit', function($request, $response, $args) {

	require_once('dbconnect_teste.php');

	$descricao = $request->getParsedBody()['descricao'];
	$id = $request->getParsedBody()['idcat'];

	$sql = "UPDATE `categoria_kit` SET `descricao` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("si", $descricao, $id);

	$stmt->execute();	
});


?>