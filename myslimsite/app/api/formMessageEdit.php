<?php

$app->put('/api/formMessageEdit/update/num={id}', function($request, $response, $args) {
	require_once('dbconnect_teste.php');
	$id = $request->getAttribute('id');
	//$id = $request->getparsedBody()['num'];
	//$id = $_POST['num'];
	//$id = $_GET['num'];
	$nId=1;
	$sql = "UPDATE `mensagem` SET `lido` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("ii", $nId, $id);
	
	echo $id;
	//echo $nId;
	$stmt->execute();

	
});


?>