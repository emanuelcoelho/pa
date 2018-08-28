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

	    // verifica se está a fazer upload de imagem
		$image = $request->getUploadedFiles()['image']; 
		if($image->getError() != UPLOAD_ERR_OK)
		{
			//ciclo sem imagem

			echo "sem imagem!";

			// recolhe id do ultimo item que foi introduzido
			$query1 = "SELECT `id` FROM `itens` ORDER BY `id` DESC LIMIT 1"; 
			$result1=$mysqli->query($query1);
			$row1 = $result1->fetch_object();
			$num=$row1->id;

			// define nome da imagem por defeito
			$image_name = "default.png";

			// define localização da imagem
			$folder="/xampp/htdocs/images/";

			$C=$num+1;

			// insere a quantidade de items que foi definida
			for($N=1; $N<=$quantidade; $N++)
			{
				// define nome da nova imagem
				$loopName = $C."_item.png";
				$C++;
				echo $loopName."<br>";

				// copia a imagem por defeito e aplica o novo nome na imagem copiada
				copy("$folder".$image_name, "$folder".$loopName);

				$stmt->execute();

				// recolhe o ultimo item que foi seleccionadao (é o mesmo que foi inserido em cima)
				$query1 = "SELECT `id` FROM `itens` ORDER BY `id` DESC LIMIT 1"; 
				$result1=$mysqli->query($query1);
				$row1 = $result1->fetch_object();
				$num=$row1->id;

				// adiciona atributos
				// conta o número de atributos e insere os mesmos
				$number = count($_POST["attributes"]);
				// verifica se existe mais de um atributo 
				if($number >= 1)
				{
					// ciclo para percorrer todos os atributos que existem
					for($i=0; $i<$number; $i++)
					{	
						// caso o campo do atributo não esteja vazio
						if(trim($_POST["attributes"][$i] != ''))
						{
							// statement para inserir atributos
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
		}
		else
		{
		  	//ciclo com imagem

		  	echo "com imagem!";


		  	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!

		  	// recolhe nome da imagem inserida
			$image_name = addslashes($_FILES['image']['name']);

			// define localização da imagem
			$folder="/xampp/htdocs/images/";

			$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

			// recolhe id do ultimo item que foi introduzido
			$query1 = "SELECT `id` FROM `itens` ORDER BY `id` DESC LIMIT 1"; 
			$result1=$mysqli->query($query1);
			$row1 = $result1->fetch_object();
			$num=$row1->id;

			$C=$num+1;

			$N=1;

			// define nome da imagem
			//$newName = $N."_".$image_name.$file_ext;
			$newName = $C."_item.".$file_ext;
			echo $newName."<br>";

			// faz upload da imagem com nome definido anteriormente para a localização definida
			move_uploaded_file($_FILES['image']['tmp_name'], "$folder".$newName);

			// insere a quantidade de items que foi definida
			for($N=1; $N<=$quantidade; $N++)
			{
				// define nome da imagem
				//$loopName = $N."_".$image_name;
				$loopName = $C."_item.".$file_ext;
				$C++;
				echo $loopName."<br>";

				// copia imagem inserida anteriormente com novo nome
				copy("$folder".$newName, "$folder".$loopName);

				$stmt->execute();

				// recolhe id do ultimo item que foi inserido (é o mesmo que foi inserido em cima)
				$query1 = "SELECT `id` FROM `itens` ORDER BY `id` DESC LIMIT 1"; 
				$result1=$mysqli->query($query1);
				$row1 = $result1->fetch_object();
				$num=$row1->id;

				// adiciona atributos
				// conta o número de atributos
				$number = count($_POST["attributes"]);
				// verifica se existe mais de um atributo 
				if($number >= 1)
				{
					// ciclo para percorrer todos os atributos que existem
					for($i=0; $i<$number; $i++)
					{
						// caso o campo do atributo não esteja vazio
						if(trim($_POST["attributes"][$i] != ''))
						{
							
							// statement para inserir atributos
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
		}	  
	});
?>