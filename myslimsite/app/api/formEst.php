<?php

$app->post('/api/formEst/insertEstado', function($request) {

	require_once('dbconnect_teste.php');
	

	$query = "INSERT INTO `estado` (`descricao`) VALUES (?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("s", $descricao);

	$descricao = $request->getParsedBody()['descricao'];
	

	$stmt->execute();
	
	echo $descricao;
	  
});

?>