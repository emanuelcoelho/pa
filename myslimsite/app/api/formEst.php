<?php
	// insere novo estado na bd
	$app->post('/api/formEst/insertEstado', function($request) {

		require_once('dbconnect_teste.php');
		
		$query = "INSERT INTO `estado` (`descricao`) VALUES (?)";

		$stmt = $mysqli->prepare($query);

		$stmt->bind_param("s", $descricao);

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];
		
		$stmt->execute();  
	});
?>