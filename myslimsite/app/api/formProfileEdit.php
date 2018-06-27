<?php 
	
	// criar nova entrada na tabela teste com ligaçao a teste_fkey (ligaçao chave estrangeira)  (SELECT `id` FROM `teste_fkey` WHERE `descricao` = '$desc')
	$app->put('/api/formEditProfile/update', function($request, $response, $args) {

		require_once('dbconnect_teste.php');
		

		$username = $request->getParsedBody()['username'];
		$email = $request->getParsedBody()['email'];
		$password = $request->getParsedBody()['password'];
		$number = $request->getParsedBody()['number'];
		$phone = $request->getParsedBody()['phonenumber'];
		$id = $request->getParsedBody()['iduser'];

		$sql = "UPDATE `user` SET `username` = ?, `password` = ?, `email` = ?, `numero` = ?, `telefone` = ? WHERE `id` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sssiii", $username, $password, $email, $number, $phone, $id);

		
  		




		$stmt->execute();		
	});

?>