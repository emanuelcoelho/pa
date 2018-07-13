<?php
	// edita o campo "lido" para ficar com o estado de "lido"
	$app->put('/api/formMessageEdit/update/num={id}', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do botão
		$id = $request->getAttribute('id');
		// o valor 1 indica que a mensagem foi lida
		$nId=1;

		$sql = "UPDATE `mensagem` SET `lido` = ? WHERE `id` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("ii", $nId, $id);
		
		$stmt->execute();	
	});
?>