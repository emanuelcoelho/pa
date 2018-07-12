<?php
	
	// edita estado na bd
	$app->put('/api/formEstEdit/update', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];
		$id = $request->getParsedBody()['idest'];

		$sql = "UPDATE `estado` SET `descricao` = ? WHERE `id` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("si", $descricao, $id);

		$stmt->execute();	
	});
?>