<?php

$app->post('/api/formCat/insertCatKit', function($request, $response, $args) {

	require_once('dbconnect_teste.php');
	

	$query = "INSERT INTO `categoria_kit` (`descricao`) VALUES (?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("s", $descricao);

	$descricao = $request->getParsedBody()['descricao'];
	

	$stmt->execute();
	
	echo $descricao;  
});

$app->post('/api/formCat/insertCatItem', function($request) {

	require_once('dbconnect_teste.php');
	

	$query = "INSERT INTO `categoria_item` (`descricao`) VALUES (?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("s", $descricao);

	$descricao = $request->getParsedBody()['descricao'];
	

	$stmt->execute();
	
	echo $descricao;
	  
});


?>