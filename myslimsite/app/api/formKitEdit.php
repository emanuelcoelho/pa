<?php
	// remove o item do kit seleccionado 
	$app->put('/api/formKitEdit/RemoveItem/num={id}', function($request, $response, $args) {
		
		require_once('dbconnect_teste.php');

		// recolhe informação do botão
		$id = $request->getAttribute('id');

		// recolhe o id do kit "sem kit"
		$query = "SELECT * FROM kit WHERE descricao = 'Sem Kit' ";
	    $result = mysqli_query($mysqli,$query);
	    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	    $kit=$row['id'];

		// altera o kit do item para ficar com o kit "sem kit"
		$sql = "UPDATE `itens` SET `id_kit` = ? WHERE `id` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("ii", $kit, $id);
		
		$stmt->execute();
	});

	// adiciona o item ao kit seleccionado 
	$app->put('/api/formKitEdit/AddItem/num={id}&num2={id2}', function($request, $response, $args) {
		
		require_once('dbconnect_teste.php');

		// recolhe informação do botão id = id do item, nId= id do kit
		$id = $request->getAttribute('id');
		$nId = $request->getAttribute('id2');

		// altera o kit do item para ficar com o kit seleccionado
		$sql = "UPDATE `itens` SET `id_kit` = ? WHERE `id` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("ii", $nId, $id);
		
		$stmt->execute();
	});

	// edita informações do kit seleccionado
	$app->put('/api/formEditKit/update', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$limite = $request->getParsedBody()['limite'];
		$descricao = $request->getParsedBody()['descricao'];
		$cat = $request->getParsedBody()['desc'];
		$id = $request->getParsedBody()['idkit'];
		$obs = $request->getParsedBody()['obs'];

		// altera informações do kit na bd
		$sql = "UPDATE `kit` SET `descricao` = ?, `limite_data` = ?, `id_categoria` = ?, `observacao` = ? WHERE `id` = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("siisi", $descricao, $limite, $cat, $obs, $id);

		$stmt->execute();	
	});
?>