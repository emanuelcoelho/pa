<?php
$app->put('/api/formKitEditDelete/editRemoverItemKit/num={id}', function($request, $response, $args) {

	require_once('dbconnect_teste.php');
	$id = $request->getAttribute('id');
	//$id = $request->getparsedBody()['num'];
	//$id = $_POST['num'];
	//$id = $_GET['num'];
	$nId = 1;

	$sql = "UPDATE `teste` SET `id_kit` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param("ii", $nId, $id);
	
	echo $id;
	//echo $nId;
	$stmt->execute();

});
?>