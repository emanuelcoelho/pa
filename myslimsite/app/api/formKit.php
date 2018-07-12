<?php
	
	// insere kit na bd
	$app->put('/api/formKit/insertKit', function($request, $response, $args) {

		require_once('dbconnect_teste.php');
		
		$query = "INSERT INTO `kit` (`descricao`,`id_categoria`, `limite_data`, `observacao`) VALUES (?, ?, ?, ?)";

		$stmt = $mysqli->prepare($query);

		$stmt->bind_param("siis", $descricao, $cat, $limite, $obs);

		// recolhe informação do form
		$limite = $request->getParsedBody()['limite'];
		$descricao = $request->getParsedBody()['descricao'];
		$cat = $request->getParsedBody()['desc'];
		$obs = $request->getParsedBody()['obs'];

		$stmt->execute();

		// recolhe id do último kit a ser inserido na bd (o mesmo kit que foi inserido mais cedo)
		$query1 = "SELECT `id` FROM `kit` ORDER BY `id` DESC LIMIT 1"; 
		$result1=$mysqli->query($query1);
		$row1 = $result1->fetch_object();
		$num=$row1->id;
		$kit = $num;

		// conta o número de itens seleccionados e corre um ciclo para inserir os mesmos
		$number = count($_POST["itens"]);
		if($number >= 1)
		{
			
			for($i=0; $i<$number; $i++)
			{
				
				if(trim($_POST["itens"][$i] != ''))
				{
					
					// altera o kit do item para ficar com o kit seleccionado
					$sql = "UPDATE `itens` SET `id_kit` = ? WHERE `itens`.`id` = ?";
					$stmt = $mysqli->prepare($sql);

					$id = $request->getParsedBody()['itens'][$i];
					$stmt->bind_param("ii", $kit, $id);

					$stmt->execute();
				}
			}
		}	  
	});
?>