<?php
	// insere item na bd
	$app->post('/api/formItem/insertItem', function($request) {

	require_once('dbconnect_teste.php');
		

		$query = "INSERT INTO `itens` (`marca`, `modelo`, `descricao`, `visivel`, `id_categoria`, `foto`, `serial_number`, `serial_ipvc`, `id_kit`, `id_estado`, `observacao`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$stmt = $mysqli->prepare($query);

		$stmt->bind_param("sssiisiiiis", $marca, $modelo, $descricaon, $visivel, $cat, $loopName, $serialnumber, $ipvcnumber, $kit, $estado, $obs);

		// recolhe informação do form
		$marca = $request->getParsedBody()['marca'];
		$modelo = $request->getParsedBody()['modelo'];
		$descricaon = $request->getParsedBody()['descricao'];
		
		$visivel = $request->getParsedBody()['visivel'];
		$cat = $request->getParsedBody()['desc'];
		$estado = $request->getParsedBody()['estado'];
		$serialnumber = $request->getParsedBody()['serialnumber'];
		$ipvcnumber = $request->getParsedBody()['ipvcnumber'];
		$obs = $request->getParsedBody()['obs'];

		// recolhe a quantidade de items que deseja inserir
		$quantidade = $request->getParsedBody()['qtd'];

		// recolhe o id do kit "sem kit"
		$sql = "SELECT * FROM kit WHERE descricao = 'Sem Kit' ";
	    $result = mysqli_query($mysqli,$sql);
	    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	    $kit=$row['id'];

		$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!

		$image_name = addslashes($_FILES['image']['name']);

		$folder="/xampp/htdocs/images/";

		$N=1;

		$newName = $N."_".$image_name;

		move_uploaded_file($_FILES['image']['tmp_name'], "$folder".$newName);

		// insere a quantidade de items que foi definida
		for($N=1; $N<=$quantidade; $N++)
		{
			
			$loopName = $N."_".$image_name;

			copy("$folder".$newName, "$folder".$loopName);

			$stmt->execute();

			// recolhe o ultimo item que foi seleccionadao (é o mesmo que foi inserido em cima)
			$query1 = "SELECT `id` FROM `itens` ORDER BY `id` DESC LIMIT 1"; 
			$result1=$mysqli->query($query1);
			$row1 = $result1->fetch_object();
			$num=$row1->id;

			// adiciona atributos
			// conta o número de atributos e insere os mesmos
			$number = count($_POST["attributes"]);
			if($number >= 1)
			{
				for($i=0; $i<$number; $i++)
				{
					if(trim($_POST["attributes"][$i] != ''))
					{

						$sql = "INSERT INTO `atributos`(`id_item`,`descricao`) VALUES(?,?)";
						$stmt2 = $mysqli->prepare($sql);

						$stmt2->bind_param("ss", $id_item, $descricao);

						// recolhe informação do form
						$id_item = $num;
						$descricao = $request->getParsedBody()['attributes'][$i];
						
						$stmt2->execute();
					}
				}
			}
		}	  
	});
?>