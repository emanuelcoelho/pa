<?php 

	// criar nova entrada na tabela teste com ligaçao a teste_fkey (ligaçao chave estrangeira)  (SELECT `id` FROM `teste_fkey` WHERE `descricao` = '$desc')
	$app->put('/api/formEditUser/updateProfile', function($request, $response, $args) {
		
		require_once('dbconnect_teste.php');

		$username = $request->getParsedBody()['username'];
		$email = $request->getParsedBody()['email'];
		$password = $request->getParsedBody()['password'];
		$number = $request->getParsedBody()['number'];
		$phone = $request->getParsedBody()['phonenumber'];


		$query = "SELECT * FROM user WHERE username = '$username' and password = '$password' and email = '$email' ";
		$result = mysqli_query($mysqli,$query);

		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$id=$row["id"];


		$sql = "UPDATE `user` SET `username` = ?, `password` = ?, `email` = ?, `numero` = ?, `telefone` = ? WHERE `user`.`id` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sssiii", $username, $password, $email, $number, $phone, $id);


		$stmt->execute();		
	});

	// criar nova entrada na tabela teste com ligaçao a teste_fkey (ligaçao chave estrangeira)  (SELECT `id` FROM `teste_fkey` WHERE `descricao` = '$desc')
	$app->put('/api/formEditUser/update', function($request, $response, $args) {
		
		require_once('dbconnect_teste.php');

		$username = $request->getParsedBody()['username'];
		$email = $request->getParsedBody()['email'];
		$password = $request->getParsedBody()['password'];
		$number = $request->getParsedBody()['number'];
		$phone = $request->getParsedBody()['phonenumber'];


		$query = "SELECT * FROM user WHERE username = '$username' and password = '$password' and email = '$email' ";
		$result = mysqli_query($mysqli,$query);

		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$id=$row["id"];


		$sql = "UPDATE `user` SET `username` = ?, `password` = ?, `email` = ?, `numero` = ?, `telefone` = ? WHERE `user`.`id` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sssiii", $username, $password, $email, $number, $phone, $id);


		$stmt->execute();
		
		
	});

?>