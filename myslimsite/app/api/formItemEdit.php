<?php

$app->post('/api/formItemEdit/RemoveAttribute/num={id}', function($request, $response, $args) {
	require_once('dbconnect_teste.php');
	$id = $request->getAttribute('id');
	//$id = $request->getparsedBody()['num'];
	//$id = $_POST['num'];
	//$id = $_GET['num'];
	$sql = "DELETE FROM atributos WHERE id=?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("i", $id);
	
	echo $id;
	//echo $nId;
	$stmt->execute();
});

$app->put('/api/formEditItem/updateSem', function($request, $response, $args) {

	require_once('dbconnect_teste.php');



	$image = $request->getUploadedFiles()['image']; //your upload image form name is file, right?
	if($image->getError() != UPLOAD_ERR_OK)
	{
		//Ciclo sem imagem

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


		$sql = "UPDATE `itens` SET `marca` = ?, `modelo` = ?, `descricao` = ?, `visivel` = ?, `id_categoria` = ?, `serial_number` = ?, `serial_ipvc` = ?, `id_estado` = ?, `observacao` = ? WHERE `id` = ?";

		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sssiiiiisi", $marca, $modelo, $descricao, $visivel, $cat, $serialnumber, $ipvcnumber, $estado, $obs,$id);

		$stmt->execute();
		


		//atributos novos
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

					
					$descricao = $request->getParsedBody()['attributesnew'][$i];
					echo fuck;
					$stmt->execute();
				}
			}
		}

		
		//atributos antigos
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


		$path = $request->getParsedBody()['path'];

		// Check file exist or not
		if( file_exists($path) ){
			echo "file exist";

			// Remove file 
			unlink($path);
		}

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


		$sql = "UPDATE `itens` SET `marca` = ?, `modelo` = ?, `descricao` = ?, `visivel` = ?, `id_categoria` = ?, `serial_number` = ?, `serial_ipvc` = ?, `id_estado` = ?, `observacao` = ?, `foto` = ? WHERE `id` = ?";

		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sssiiiiissi", $marca, $modelo, $descricao, $visivel, $cat, $serialnumber, $ipvcnumber, $estado, $obs, $image_name, $id);

		$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
		$image_name = addslashes($_FILES['image']['name']);

		$folder="/xampp/htdocs/images/";

		move_uploaded_file($_FILES['image']['tmp_name'], "$folder".$_FILES['image']['name']);

		$stmt->execute();
		


		//atributos novos
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

					
					$descricao = $request->getParsedBody()['attributesnew'][$i];
					echo fuck;
					$stmt->execute();
				}
			}
		}

		
		//atributos antigos
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

					
					$descricao = $request->getParsedBody()['attributesold'][$i];
					$Nid = $request->getParsedBody()['idattributesold'][$i];
					
					$stmt->execute();
				}
			}
		}

	}	
	
});



?>