<?php
	
	// insere kit na bd
	$app->put('/api/formKit/insertKit', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// recolhe informação do form
		$limite = $request->getParsedBody()['limite'];
		$descricao = $request->getParsedBody()['descricao'];
		$designacao = $request->getParsedBody()['designacao'];
		$cat = $request->getParsedBody()['desc'];
		$obs = $request->getParsedBody()['obs'];

		// passa a descricao para letras minusculas
		$comp = strtolower($descricao);

		// compara descricao para verificar se escreveu sem kit
		if($comp=='sem kit' )
		{
			// se escreveu "sem kit" na descriçao, não insere na bd
			echo "Não pode criar um kit com esse nome!";
		}
		else
		{

			$query = "INSERT INTO `kit` (`descricao`, `designacao`, `id_categoria`, `limite_data`, `observacao`) VALUES (?, ?, ?, ?, ?)";

			$stmt = $mysqli->prepare($query);

			$stmt->bind_param("ssiis", $descricao, $designacao, $cat, $limite, $obs);

			

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

			echo "Kit inserido com sucesso";
		}
			  
	});
?>