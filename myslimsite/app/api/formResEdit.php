<?php

$app->put('/api/formResEdit/refuse/num={id}&num2={id2}', function($request, $response, $args) {
	require_once('dbconnect_teste.php');

	$id = $request->getAttribute('id');
	$funcionario = $request->getAttribute('id2');

	$sql = "SELECT * FROM estado WHERE descricao = 'Recusado' ";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$estado=$row['id'];

	$query = "UPDATE `reserva` SET `id_estado` = ?, `id_funcionario` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("iii", $estado, $funcionario, $id);
	
	$stmt->execute();
});

$app->put('/api/formResEdit/accept/num={id}&num2={id2}', function($request, $response, $args) {
	require_once('dbconnect_teste.php');

	$id = $request->getAttribute('id');
	$funcionario = $request->getAttribute('id2');

	$sql = "SELECT * FROM estado WHERE descricao = 'Aceite'";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$estado=$row['id'];

	$query = "UPDATE `reserva` SET `id_estado` = ?, `id_funcionario` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("iii", $estado, $funcionario, $id);
	
	$stmt->execute();
});



?>