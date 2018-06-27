<?php

$app->put('/api/formKitEdit/RemoveItem/num={id}', function($request, $response, $args) {
	require_once('dbconnect_teste.php');
	$id = $request->getAttribute('id');
	//$id = $request->getparsedBody()['num'];
	//$id = $_POST['num'];
	//$id = $_GET['num'];
	$nId = 1;
	$sql = "UPDATE `itens` SET `id_kit` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("ii", $nId, $id);
	
	echo $id;
	//echo $nId;
	$stmt->execute();
});

$app->put('/api/formKitEdit/AddItem/num={id}&num2={id2}', function($request, $response, $args) {
	require_once('dbconnect_teste.php');
	$id = $request->getAttribute('id');
	//$id = $request->getparsedBody()['num'];
	//$id = $_POST['num'];
	//$id = $_GET['num'];
	$nId = $request->getAttribute('id2');
	$sql = "UPDATE `itens` SET `id_kit` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("ii", $nId, $id);
	
	echo $id;
	//echo $nId;
	$stmt->execute();
});

$app->put('/api/formEditKit/update', function($request, $response, $args) {

	require_once('dbconnect_teste.php');

	$limite = $request->getParsedBody()['limite'];
	$descricao = $request->getParsedBody()['descricao'];
	$cat = $request->getParsedBody()['desc'];
	$id = $request->getParsedBody()['idkit'];

	$sql = "UPDATE `kit` SET `descricao` = ?, `limite_data` = ?, `id_categoria` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("siii", $descricao, $limite, $cat, $id);

	$stmt->execute();	
});


?>