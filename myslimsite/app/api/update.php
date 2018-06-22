<?php 

	// criar nova entrada na tabela teste com ligaçao a teste_fkey (ligaçao chave estrangeira)  (SELECT `id` FROM `teste_fkey` WHERE `descricao` = '$desc')
	$app->put('/api/teste/updateUser2', function($request, $response, $args) {
		
		require_once('dbconnect_teste.php');

		$username = $request->getParsedBody()['username'];
		$email = $request->getParsedBody()['email'];
		$password = $request->getParsedBody()['password'];
		$number = $request->getParsedBody()['number'];
		$phone = $request->getParsedBody()['phonenumber'];


		$query = "SELECT * FROM teste_user WHERE username = 'emanuel' and password = 'passeemanuel' and email = 'emanuelmail@gmail.com' ";
		$result = mysqli_query($mysqli,$query);

		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$id=$row["id"];


		$sql = "UPDATE `teste_user` SET `username` = ?, `password` = ?, `email` = ?, `numero` = ?, `telefone` = ? WHERE `teste_user`.`id` = 2";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sssii", $username, $password, $email, $number, $phone);


		$stmt->execute();
		
	});

?>