<?php 

	// criar nova entrada na tabela teste com ligaçao a teste_fkey (ligaçao chave estrangeira)  (SELECT `id` FROM `teste_fkey` WHERE `descricao` = '$desc')
	$app->put('/api/formEditUser/update', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		$username = $request->getParsedBody()['username'];
		$email = $request->getParsedBody()['email'];
		$password = $request->getParsedBody()['password'];
		$number = $request->getParsedBody()['number'];
		$phone = $request->getParsedBody()['phonenumber'];
		$group = $request->getParsedBody()['desc'];
		$id = $request->getParsedBody()['iduser'];

		$sql = "UPDATE `user` SET `username` = ?, `password` = ?, `email` = ?, `numero` = ?, `telefone` = ?, `id_grupo` = ? WHERE `user`.`id` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sssiiii", $username, $password, $email, $number, $phone, $group, $id);


		$stmt->execute();		
		
	});

?>