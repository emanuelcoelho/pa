<?php
	// insere novo estado na bd
	$app->post('/api/formEst/insertEstado', function($request) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];

		// verifica se existe algum estado com o mesmo nome
		$query = "SELECT * FROM estado WHERE descricao = '$descricao'";
		$result = mysqli_query($mysqli,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		// se não encontrar estado igual actualiza bd e manda alerta
		if ($count<=0){
		
			$query = "INSERT INTO `estado` (`descricao`) VALUES (?)";

			$stmt = $mysqli->prepare($query);

			$stmt->bind_param("s", $descricao);

			$stmt->execute(); 

			echo "Estado criado com sucesso!";
		}
		else
		{
			echo "Já existe estado com esse nome!";
		} 	  


	});
?>