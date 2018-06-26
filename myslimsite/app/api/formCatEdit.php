<?php

$app->put('/api/formCatEdit/update', function($request, $response, $args) {

	require_once('dbconnect_teste.php');

	$descricao = $request->getParsedBody()['descricao'];
	$id = $request->getParsedBody()['idcat'];

	$sql = "UPDATE `teste_fkey` SET `descricao` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("si", $descricao, $id);

	$stmt->execute();	
});


?>