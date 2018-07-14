<?php
	// edita informações de categoria item na bd
	$app->put('/api/formCatEdit/updateItem', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];
		$id = $request->getParsedBody()['idcat'];

		// verifica se existe se existe alguma categoria item com o mesmo nome e com id diferente
		$query = "SELECT * FROM categoria_item WHERE descricao = '$descricao' AND id!='$id'";
		$result = mysqli_query($mysqli,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		// se não encontrar nome igual igual actualiza bd e manda alerta
		if ($count<=0){

			// altera informações na bd
			$sql = "UPDATE `categoria_item` SET `descricao` = ? WHERE `id` = ?";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("si", $descricao, $id);

			$stmt->execute();	

			echo "Categoria editada com sucesso!";
		}
		else
		{
			echo "Já existe categoria com esse nome!";
		} 
	});

	// edita informações de categoria kit na bd
	$app->put('/api/formCatEdit/updateKit', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];
		$id = $request->getParsedBody()['idcat'];

		// verifica se existe se existe alguma categoria kit com o mesmo nome e com id diferente
		$query = "SELECT * FROM categoria_kit WHERE descricao = '$descricao' AND id!='$id'";
		$result = mysqli_query($mysqli,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		// se não encontrar nome igual igual actualiza bd e manda alerta
		if ($count<=0){

			// altera informações na bd
			$sql = "UPDATE `categoria_kit` SET `descricao` = ? WHERE `id` = ?";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("si", $descricao, $id);

			$stmt->execute();	

			echo "Categoria editada com sucesso!";
		}
		else
		{
			echo "Já existe categoria com esse nome!";
		} 
	});
?>