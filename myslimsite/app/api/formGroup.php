<?php
	
	// insere novo grupo na bd
	$app->post('/api/formGroup/insertGroup', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];
		$ver = $request->getParsedBody()['ver'];
		$reservar = $request->getParsedBody()['reservar'];
		$ver_admin = $request->getParsedBody()['ver_admin'];
		$reservas = $request->getParsedBody()['reservas'];
		$criar_editar = $request->getParsedBody()['criar_editar'];
		$user_ver = $request->getParsedBody()['user_ver'];
		$user_editar = $request->getParsedBody()['user_editar'];
		$criar_msg = $request->getParsedBody()['criar_msg'];

		// verifica se existe algum grupo com o mesmo nome
		$query = "SELECT * FROM grupo WHERE descricao = '$descricao'";
		$result = mysqli_query($mysqli,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		// se não encontrar grupo igual actualiza bd e manda alerta
		if ($count<=0){
		
			$query = "INSERT INTO `grupo` (`descricao`, `ver`, `reservar`, `ver_admin`, `reservas`, `criar_editar`, `user_ver`, `user_editar`, `criar_msg`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = $mysqli->prepare($query);

			$stmt->bind_param("siiiiiiii", $descricao, $ver, $reservar, $ver_admin, $reservas, $criar_editar, $user_ver, $user_editar, $criar_msg);

			$stmt->execute();

			echo "Grupo criado com sucesso!";
		}
		else
		{
			echo "Já existe grupo com esse nome!";
		} 	  
	});
?>