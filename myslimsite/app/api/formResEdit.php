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

	

	//Enviar notificação ao utilizador da decisão do funcionário
	$query = "SELECT user.username,
			   kit.descricao AS kitDesc,
		       reserva.id,
		       reserva.id_reservante,
		       reserva.data_inicio
		       FROM reserva
		       INNER JOIN user ON reserva.id_reservante = user.id
		       INNER JOIN kit ON reserva.id_kit = kit.id 
		       WHERE reserva.id = '$id'";
	$result = mysqli_query($mysqli,$query);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$idDestinatario = $row['id_reservante'];
	$destinatario = $row['username'];
	$kit=$row['kitDesc'];
	$dataInicio=$row['data_inicio'];


	$query = "INSERT INTO `mensagem` (`assunto`,`mensagem`, `lido`,`data`, `id_utilizador`,`id_emissor`) VALUES (?, ?, ?, ?, ?,?)";

	$stmt2 = $mysqli->prepare($query);

	$stmt2->bind_param("ssisii", $assunto, $mensagem, $lido, $data, $idDestinatario, $funcionario);

	$data=date("Y-m-d H:i:s");
	echo $data;
	$lido=0;

	$assunto = "Notificação da sua reserva!";
	$mensagem = "Caro ".$destinatario.". Esta é uma mensagem de notificação para indicar que o pedido da sua reserva do kit <b>".$kit."</b> já foi avaliado e foi recusado.";
	

	$stmt2->execute();




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

	//Enviar notificação ao utilizador da decisão do funcionário
	$query = "SELECT user.username,
			   kit.descricao AS kitDesc,
		       reserva.id,
		       reserva.id_reservante,
		       reserva.data_inicio
		       FROM reserva
		       INNER JOIN user ON reserva.id_reservante = user.id
		       INNER JOIN kit ON reserva.id_kit = kit.id 
		       WHERE reserva.id = '$id'";
	$result = mysqli_query($mysqli,$query);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$idDestinatario = $row['id_reservante'];
	$destinatario = $row['username'];
	$kit=$row['kitDesc'];
	$dataInicio=$row['data_inicio'];


	$query = "INSERT INTO `mensagem` (`assunto`,`mensagem`, `lido`,`data`, `id_utilizador`,`id_emissor`) VALUES (?, ?, ?, ?, ?,?)";

	$stmt3 = $mysqli->prepare($query);

	$stmt3->bind_param("ssisii", $assunto, $mensagem, $lido, $data, $idDestinatario, $funcionario);

	$data=date("Y-m-d H:i:s");
	echo $data;
	$lido=0;

	$assunto = "Notificação da sua reserva!";
	$mensagem = "Caro ".$destinatario.". Esta é uma mensagem de notificação para indicar que o pedido da sua reserva do kit <b>".$kit."</b> já foi avaliado e foi aceite, a sua data de levantamento é ".$dataInicio.".";
	

	$stmt3->execute();

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
				WHERE (id_kit='$idKit' AND id_estado='$pendente' AND data_inicio<='$dInicio' AND data_fim>='$dInicio') 
				OR (id_kit='$idKit' AND id_estado='$pendente' AND data_inicio>='$dInicio' AND data_inicio<='$dFim')"; // Run your query
    $result=$mysqli->query($query);
    // Loop through the query results, outputing the options one by one
    while ($row = $result->fetch_assoc()) 
    {

    	$sql = "UPDATE `reserva` SET `id_estado` = ?, `id_funcionario` = ? WHERE `id` = ?";

    	$idReserva=$row['id'];

		$stmt2 = $mysqli->prepare($sql);
		$stmt2->bind_param("iii", $recusado, $funcionario, $idReserva);
		
		$stmt2->execute();

		//Enviar notificação ao utilizador da decisão do funcionário
		$query4 = "SELECT user.username,
				   kit.descricao AS kitDesc,
			       reserva.id,
			       reserva.id_reservante,
			       reserva.data_inicio
			       FROM reserva
			       INNER JOIN user ON reserva.id_reservante = user.id
			       INNER JOIN kit ON reserva.id_kit = kit.id 
			       WHERE reserva.id = '$idReserva'";
		$result4 = mysqli_query($mysqli,$query4);
		$row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC);
		$idDestinatario = $row4['id_reservante'];
		$destinatario = $row4['username'];
		$kit=$row4['kitDesc'];
		$dataInicio=$row4['data_inicio'];


		$query4 = "INSERT INTO `mensagem` (`assunto`,`mensagem`, `lido`,`data`, `id_utilizador`,`id_emissor`) VALUES (?, ?, ?, ?, ?,?)";

		$stmt4 = $mysqli->prepare($query4);

		$stmt4->bind_param("ssisii", $assunto, $mensagem, $lido, $data, $idDestinatario, $funcionario);

		$data=date("Y-m-d H:i:s");
		echo $data;
		$lido=0;

		$assunto = "Notificação da sua reserva!";
		$mensagem = "Caro ".$destinatario.". Esta é uma mensagem de notificação para indicar que o pedido da sua reserva do kit <b>".$kit."</b> já foi avaliado e foi recusado.";
		

		$stmt4->execute();



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

$app->put('/api/formResEdit/cancel/num={id}', function($request, $response, $args) {
	require_once('dbconnect_teste.php');

	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM estado WHERE descricao = 'Cancelado' ";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$estado=$row['id'];

	$query = "UPDATE `reserva` SET `id_estado` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("ii", $estado, $id);
	
	$stmt->execute();
});



?>