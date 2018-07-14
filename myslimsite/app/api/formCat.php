<?php
	
	// insere nova categoria de kit na bd
	$app->post('/api/formCat/insertCatKit', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];

		// verifica se existe alguma categoria kit com o mesmo nome
		$query = "SELECT * FROM categoria_kit WHERE descricao = '$descricao'";
		$result = mysqli_query($mysqli,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		// se não encontrar categoria igual actualiza bd e manda alerta
		if ($count<=0){
		
			$query = "INSERT INTO `categoria_kit` (`descricao`) VALUES (?)";

			$stmt = $mysqli->prepare($query);

			$stmt->bind_param("s", $descricao);

			$stmt->execute(); 

			echo "Categoria criada com sucesso!";
		}
		else
		{
			echo "Já existe categoria com esse nome!";
		}

	});

	// insere nova categoria de item na bd
	$app->post('/api/formCat/insertCatItem', function($request) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$descricao = $request->getParsedBody()['descricao'];

		// verifica se existe alguma categoria item com o mesmo nome
		$query = "SELECT * FROM categoria_item WHERE descricao = '$descricao'";
		$result = mysqli_query($mysqli,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		// se não encontrar categoria igual actualiza bd e manda alerta
		if ($count<=0){
		
			$query = "INSERT INTO `categoria_item` (`descricao`) VALUES (?)";

			$stmt = $mysqli->prepare($query);

			$stmt->bind_param("s", $descricao);

			$stmt->execute();

			echo "Categoria criada com sucesso!";
		}
		else
		{
			echo "Já existe categoria com esse nome!";
		} 
	});
?>