<?php
	// cria e envia mensagem
	$app->post('/api/formMsg/sendMsg', function($request, $response, $args) {

		require_once('dbconnect_teste.php');
		

		$query = "INSERT INTO `mensagem` (`assunto`,`mensagem`, `lido`,`data`, `id_utilizador`,`id_emissor`) VALUES (?, ?, ?, ?, ?,?)";

		$stmt = $mysqli->prepare($query);

		$stmt->bind_param("ssisii", $assunto, $mensagem, $lido, $data, $destinatario, $emissor);

		// data da mensagem é sempre a data actual
		$data=date("Y-m-d H:i:s");
		// lido = 0 indica que a mensagem vai com o estado "por ler"
		$lido=0;

		// recolhe informação do form
		$assunto = $request->getParsedBody()['assunto'];
		$mensagem = $request->getParsedBody()['mensagem'];
		$destinatario = $request->getParsedBody()['iddest'];
		$emissor = $request->getParsedBody()['idemi'];

		$stmt->execute();	  
	});


?>