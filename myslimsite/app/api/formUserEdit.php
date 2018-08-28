<?php 
	// editar informações de utilizador
	$app->put('/api/formEditUser/update', function($request, $response, $args) {
		
		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$username = $request->getParsedBody()['username'];
		$email = $request->getParsedBody()['email'];
		$password = $request->getParsedBody()['password'];
		$number = $request->getParsedBody()['number'];
		$phone = $request->getParsedBody()['phonenumber'];
		$grupo = $request->getParsedBody()['desc'];
		$id = $request->getParsedBody()['iduser'];
		$nome = $request->getParsedBody()['nome'];

		// passa o username para letras minusculas
		$comp = strtolower($username);

		// verifica se existe algum utilizador com o mesmo email e id diferente 
		$query = "SELECT * FROM user WHERE email = '$email' AND id!='$id'";
		$result = mysqli_query($mysqli,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		// se não encontrar email igual actualiza bd e manda alerta
		if ($count<=0){

			// compara username para verificar se escreveu sistema
			if($comp=='sistema' )
			{				
				// se encontrar outro username com nome sistema não actualiza bd e manda alerta
				echo "Já existe utilizador com o username sistema, por favor utilize outro nome!";	
			}
			else
			{
				// se username for diferente de sistema actualiza a bd automaticamente
				//$mysqli->query("SET NAMES utf8");
				$sql = "UPDATE `user` SET `nome` = ?, `username` = ?, `password` = ?, `email` = ?, `numero` = ?, `telefone` = ?, `id_grupo` = ? WHERE `user`.`id` = ?";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("ssssiiii", $nome, $username, $password, $email, $number, $phone, $grupo, $id);

				$stmt->execute();
				echo "Utilizador editado com sucesso!";
			}
		}
		else if ($count>=1)
		{
			// se encontrar mail igual não actualiza bd e manda alerta
			echo"Já existe utilizador com esse email, por favor utilize um email diferente!";
		}	
	});

	// editar perfil de utilizador activo
	$app->put('/api/formEditUser/updateProfile', function($request, $response, $args) {
		
		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$username = $request->getParsedBody()['username'];
		$email = $request->getParsedBody()['email'];
		$password = $request->getParsedBody()['password'];
		$number = $request->getParsedBody()['number'];
		$phone = $request->getParsedBody()['phonenumber'];
		$id = $request->getParsedBody()['iduser'];
		$nome = $request->getParsedBody()['nome'];

		// passa o username para letras minusculas
		$comp = strtolower($username);

		// verifica se existe algum utilizador com o mesmo email e com id diferente
		$query = "SELECT * FROM user WHERE email = '$email' AND id!='$id'";
		$result = mysqli_query($mysqli,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		// se não encontrar email igual actualiza bd e manda alerta
		if ($count<=0){

			// compara username para verificar se escreveu sistema
			if($comp=='sistema' )
			{
				// se encontrar outro username com nome sistema não actualiza bd e manda alerta
				echo "Já existe utilizador com o username sistema, por favor utilize outro nome!";
			}
			else
			{
				// se username for diferente de sistema actualiza a bd automaticamente
				//$mysqli->query("SET NAMES utf8");
				$sql = "UPDATE `user` SET `nome` = ?, `username` = ?, `password` = ?, `email` = ?, `numero` = ?, `telefone` = ? WHERE `user`.`id` = ?";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("ssssiii", $nome, $username, $password, $email, $number, $phone, $id);

				$stmt->execute();
				echo "Utilizador editado com sucesso!";
			}

		}
		else if ($count>=1)
		{
			// se encontrar mail igual não actualiza bd e manda alerta
			echo"Já existe utilizador com esse email, por favor utilize um email diferente!";
		}	
	});
?>