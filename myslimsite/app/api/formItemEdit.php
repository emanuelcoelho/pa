<?php
	// remove atributos da bd
	$app->post('/api/formItemEdit/RemoveAttribute/num={id}', function($request, $response, $args) {
		
		require_once('dbconnect_teste.php');

		// recolhe informação do botão 
		$id = $request->getAttribute('id');
		
		// elimina atributo da bd 
		$sql = "DELETE FROM atributos WHERE id=?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("i", $id);
		
		$stmt->execute();
	});

	// edita informações do item na bd
	$app->put('/api/formEditItem/updateSem', function($request, $response, $args) {

		require_once('dbconnect_teste.php');

		// verifica se está a fazer upload de imagem
		$image = $request->getUploadedFiles()['image']; //your upload image form name is file, right?
		if($image->getError() != UPLOAD_ERR_OK)
		{
			// ciclo sem imagem

			// recolhe informação do form
			$id = $request->getParsedBody()['iditem'];
			
			$marca = $request->getParsedBody()['marca'];
			$modelo = $request->getParsedBody()['modelo'];
			$descricao = $request->getParsedBody()['descricao'];
			
			$visivel = $request->getParsedBody()['visivel'];
			$cat = $request->getParsedBody()['desc'];
			$estado = $request->getParsedBody()['estado'];
			$serialnumber = $request->getParsedBody()['serialnumber'];
			$ipvcnumber = $request->getParsedBody()['ipvcnumber'];
			$obs = $request->getParsedBody()['obs'];

			// altera informações do item na bd
			$sql = "UPDATE `itens` SET `marca` = ?, `modelo` = ?, `descricao` = ?, `visivel` = ?, `id_categoria` = ?, `serial_number` = ?, `serial_ipvc` = ?, `id_estado` = ?, `observacao` = ? WHERE `id` = ?";

			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("sssiiiiisi", $marca, $modelo, $descricao, $visivel, $cat, $serialnumber, $ipvcnumber, $estado, $obs,$id);

			$stmt->execute();
			
			// adiciona atributos novos
			// conta o número de atributos novos e insere os mesmos
			$number = count($_POST["attributesnew"]);
			if($number >= 1)
			{
				for($i=0; $i<$number; $i++)
				{
					if(trim($_POST["attributesnew"][$i] != ''))
					{

						$sql = "INSERT INTO `atributos`(`id_item`,`descricao`) VALUES(?,?)";
						$stmt = $mysqli->prepare($sql);

						$stmt->bind_param("ss", $id, $descricao);
						
						// recolhe informação do form
						$descricao = $request->getParsedBody()['attributesnew'][$i];
						$stmt->execute();
					}
				}
			}

			// edita os atributos antigos
			// conta o número de atributos antigos e edita os mesmos
			$number = count($_POST["attributesold"]);
			if($number >= 1)
			{
				for($i=0; $i<$number; $i++)
				{
					if(trim($_POST["attributesold"][$i] != ''))
					{

						$sql = "UPDATE `atributos` SET `descricao` = ? WHERE `id` = ?";
						$stmt = $mysqli->prepare($sql);

						$stmt->bind_param("ss", $descricao, $Nid);

						// recolhe informação do form
						$descricao = $request->getParsedBody()['attributesold'][$i];
						$Nid = $request->getParsedBody()['idattributesold'][$i];
						
						$stmt->execute();
					}
				}
			}
			
		}
		else
		{
			//Ciclo com imagem

			// recolhe informação acerca da pasta e nome da imagem associada ao item
			$path = $request->getParsedBody()['path'];

			// verifica se já existe uma imagem com o mesmo nome na pasta
			if( file_exists($path) ){
				echo "file exist";

				// remove a imagem que estava nessa pasta
				unlink($path);
			}

			// recolhe informação do form
			$id = $request->getParsedBody()['iditem'];
			
			$marca = $request->getParsedBody()['marca'];
			$modelo = $request->getParsedBody()['modelo'];
			$descricao = $request->getParsedBody()['descricao'];
			
			$visivel = $request->getParsedBody()['visivel'];
			$cat = $request->getParsedBody()['desc'];
			$estado = $request->getParsedBody()['estado'];
			$serialnumber = $request->getParsedBody()['serialnumber'];
			$ipvcnumber = $request->getParsedBody()['ipvcnumber'];
			$obs = $request->getParsedBody()['obs'];

			// altera informações do item na bd
			$sql = "UPDATE `itens` SET `marca` = ?, `modelo` = ?, `descricao` = ?, `visivel` = ?, `id_categoria` = ?, `serial_number` = ?, `serial_ipvc` = ?, `id_estado` = ?, `observacao` = ?, `foto` = ? WHERE `id` = ?";

			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("sssiiiiissi", $marca, $modelo, $descricao, $visivel, $cat, $serialnumber, $ipvcnumber, $estado, $obs, $image_name, $id);

			$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
			$image_name = addslashes($_FILES['image']['name']);

			$folder="/xampp/htdocs/images/";

			move_uploaded_file($_FILES['image']['tmp_name'], "$folder".$_FILES['image']['name']);

			$stmt->execute();
			


			// adiciona atributos novos
			// conta o número de atributos novos e insere os mesmos
			$number = count($_POST["attributesnew"]);
			if($number >= 1)
			{
				for($i=0; $i<$number; $i++)
				{
					if(trim($_POST["attributesnew"][$i] != ''))
					{

						$sql = "INSERT INTO `atributos`(`id_item`,`descricao`) VALUES(?,?)";
						$stmt = $mysqli->prepare($sql);

						$stmt->bind_param("ss", $id, $descricao);

						// recolhe informação do form
						$descricao = $request->getParsedBody()['attributesnew'][$i];
						$stmt->execute();
					}
				}
			}

			
			// adiciona atributos antigos
			// conta o número de atributos antigos e edita os mesmos
			$number = count($_POST["attributesold"]);
			if($number >= 1)
			{
				for($i=0; $i<$number; $i++)
				{
					if(trim($_POST["attributesold"][$i] != ''))
					{

						$sql = "UPDATE `atributos` SET `descricao` = ? WHERE `id` = ?";
						$stmt = $mysqli->prepare($sql);

						$stmt->bind_param("ss", $descricao, $Nid);

						// recolhe informação do form
						$descricao = $request->getParsedBody()['attributesold'][$i];
						$Nid = $request->getParsedBody()['idattributesold'][$i];
						
						$stmt->execute();
					}
				}
			}
		}			
	});
?>