<?php
	
	// edita estado na bd
	$app->put('/api/formEstEdit/update', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];
		$id = $request->getParsedBody()['idest'];

		// verifica se existe algum estado com o mesmo nome e id diferente
		$query = "SELECT * FROM estado WHERE descricao = '$descricao' AND id!='$id'";
		$result = mysqli_query($mysqli,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		// se não encontrar estado igual actualiza bd e manda alerta
		if ($count<=0){

			$sql = "UPDATE `estado` SET `descricao` = ? WHERE `id` = ?";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("si", $descricao, $id);

			$stmt->execute();	

			echo "Estado editado com sucesso!";
		}
		else
		{
			echo "Já existe estado com esse nome!";
		} 	  
	});
?>