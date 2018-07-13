<?php
	// edita informações de categoria item na bd
	$app->put('/api/formCatEdit/updateItem', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];
		$id = $request->getParsedBody()['idcat'];

		// altera informações na bd
		$sql = "UPDATE `categoria_item` SET `descricao` = ? WHERE `id` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("si", $descricao, $id);

		$stmt->execute();	
	});

	// edita informações de categoria kit na bd
	$app->put('/api/formCatEdit/updateKit', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];
		$id = $request->getParsedBody()['idcat'];

		// altera informações na bd
		$sql = "UPDATE `categoria_kit` SET `descricao` = ? WHERE `id` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("si", $descricao, $id);

		$stmt->execute();	
	});
?>