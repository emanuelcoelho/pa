<?php

$app->post('/api/formMsg/sendMsg', function($request, $response, $args) {

	require_once('dbconnect_teste.php');
	

	$query = "INSERT INTO `mensagem` (`assunto`,`mensagem`, `lido`,`data`, `id_utilizador`,`id_emissor`) VALUES (?, ?, ?, ?, ?,?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("ssisii", $assunto, $mensagem, $lido, $data, $destinatario, $emissor);

	$data=date("Y-m-d H:i:s");
	echo $data;
	$lido=0;

	$assunto = $request->getParsedBody()['assunto'];
	$mensagem = $request->getParsedBody()['mensagem'];
	$destinatario = $request->getParsedBody()['iddest'];
	$emissor = $request->getParsedBody()['idemi'];

	$stmt->execute();


	
	
	  
});


?>