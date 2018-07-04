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

	//Depois de aceitar a reserva, vai pesquisar por outras reservas que tenham a data de inicio no intervalo de tempo da reserva aceita, e automaticamente recusa os pedidos pendentes

	$sql = "SELECT * FROM estado WHERE descricao = 'Pendente'";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$pendente=$row['id'];

	$sql = "SELECT * FROM estado WHERE descricao = 'Recusado'";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$recusado=$row['id'];

	$sql = "SELECT * FROM reserva WHERE id = '$id'";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$dInicio=$row['data_inicio'];
	$dFim=$row['data_fim'];
	$idKit=$row['id_kit'];

	$query = "SELECT * FROM reserva 
			  WHERE id_kit='$idKit' AND id_estado='$pendente' AND data_inicio>='$dInicio'
			  AND data_inicio<='$dFim'"; // Run your query
    $result=$mysqli->query($query);
    // Loop through the query results, outputing the options one by one
    while ($row = $result->fetch_assoc()) 
    {

    	$sql = "UPDATE `reserva` SET `id_estado` = ?, `id_funcionario` = ? WHERE `id` = ?";

    	$idReserva=$row['id'];

		$stmt2 = $mysqli->prepare($sql);
		$stmt2->bind_param("iii", $recusado, $funcionario, $idReserva);
		
		$stmt2->execute();     
    }
});

$app->put('/api/formResEdit/allEdit', function($request, $response, $args) {
	require_once('dbconnect_teste.php');

	$id = $request->getParsedBody()['idres'];
	$estado = $request->getParsedBody()['estado'];
	$obs = $request->getParsedBody()['obs'];

	$query = "UPDATE `reserva` SET `id_estado` = ?, `observacao` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("isi", $estado, $obs, $id);
	
	$stmt->execute();
});



?>