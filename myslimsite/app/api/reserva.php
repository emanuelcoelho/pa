<?php 

	// criar nova entrada na tabela teste com ligaçao a teste_fkey (ligaçao chave estrangeira)  (SELECT `id` FROM `teste_fkey` WHERE `descricao` = '$desc')
	//preenche tabela
	$app->post('/api/teste/reserva1', function($request, $response, $args) {
		
		require_once('dbconnect_teste.php');

		$cat = $request->getParsedBody()['desc'];
		$date1 = $request->getParsedBody()['from_date'];
		$date2 = $request->getParsedBody()['to_date'];

		$date1=date("Y-m-d", strtotime($date1));
		$date2=date("Y-m-d", strtotime($date2));

		if($cat!=1){
			$sqlcat=" and a.id_categoria = $cat";
		}
		else{
			$sqlcat="";
		}


		$query = "SELECT count(b.descricao) as contagem, 
				  b.id as id, 
				  b.descricao as descricao, 
				  c.descricao as descCat 
				  FROM  reserva a, kit b, categoria_kit c  
				  WHERE b.id_categoria > 1  
				  and b.id_categoria=c.id 
				  and not (b.id=(SELECT id_kit FROM reserva WHERE data_inicio >= '$date1' and data_fim <= '$date2')) 
				  GROUP BY b.descricao "; // Run your query

		//$query = "select id from reserva where data_inicio >= '$data1' and data_fim <= '$date2'";		
		$result=$mysqli->query($query);
		$teste="";
		// Loop through the query results, outputing the options one by one
		while ($row = $result->fetch_assoc()) {
			echo '<tr> 
                       <td><button id="button[]" type="button" onclick="myFunction(this)" class="btn btn-primary botao" data-id="'.$row['id'].'">Selecionar kit</button></td>

					   <td> '.$row['descricao'].'</td>
                       <td> '.$row['contagem'].'</td>
                       <td>'.$row['descCat'].'</td>

					  </tr>';
			$teste= $row['id'];

		}	
		
		if($teste == ""){
			$query = "SELECT count(kit.descricao) as contagem,
                                          kit.id, 
                                          kit.descricao,
                                          categoria_kit.descricao AS descCat
                                          FROM kit
                                          
                                          INNER JOIN categoria_kit ON kit.id_categoria = categoria_kit.id
                                          WHERE kit.id_categoria > 1
                                          GROUP BY kit.descricao
										  ORDER BY kit.id ASC";
			 $result=$mysqli->query($query);
			 while ($row = $result->fetch_assoc()) {
				echo '<tr> 
                       <td><button id="button[]" type="button" onclick="myFunction(this)" class="btn btn-primary botao" data-id="'.$row['id'].'">Selecionar kit</button></td>

					   <td> '.$row['descricao'].'</td>
                       <td> '.$row['contagem'].'</td>
                       <td>'.$row['descCat'].'</td>

                      </tr>';
			}
		}
		
		
	});



	// cria nova reserva com estado pendente
	$app->post('/api/teste/reserva2', function($request, $response, $args) {
		
		require_once('dbconnect_teste.php');
		// recolhe id de funcionario "sistema"
		$sql = "SELECT * FROM user WHERE username = 'Sistema' ";
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$func=$row['id'];

		// recolhe id de estado "pendente"
		$sql = "SELECT * FROM estado WHERE descricao = 'Pendente' ";
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$estado=$row['id'];
		
		// recolhe informações do form
		$id = $request->getParsedBody()['idkit'];

		$reservante = $request->getParsedBody()['idres'];

		$date1 = $request->getParsedBody()['from_date'];
		$date2 = $request->getParsedBody()['to_date'];
		$date1=date("Y-m-d", strtotime($date1));
		$date2=date("Y-m-d", strtotime($date2));

		$query = "INSERT INTO `reserva` (`id_kit`,`id_reservante`, `id_estado`, `data_inicio`, `data_fim`, `id_funcionario`) VALUES (?, ?, ?, ?, ?, ?)";

		$stmt = $mysqli->prepare($query);
	
		$stmt->bind_param("iiissi", $id, $reservante, $estado, $date1, $date2, $func);
		
		$stmt->execute();

		//depois de criar reserva manda notificação ao utilizador

		$query1 = "SELECT `id` FROM `reserva` ORDER BY `id` DESC LIMIT 1"; // Run your query
		$result1=$mysqli->query($query1);
		$row1 = $result1->fetch_object();
		$num=$row1->id;

		$query5 = "SELECT user.username,
			   kit.descricao AS kitDesc,
		       reserva.id,
		       reserva.id_reservante,
		       reserva.data_inicio
		       FROM reserva
		       INNER JOIN user ON reserva.id_reservante = user.id
		       INNER JOIN kit ON reserva.id_kit = kit.id 
		       WHERE reserva.id = '$num'";
		$result5 = mysqli_query($mysqli,$query5);
		$row5 = mysqli_fetch_array($result5,MYSQLI_ASSOC);
		$destinatario = $row5['username'];
		$kit=$row5['kitDesc'];

		$query = "INSERT INTO `mensagem` (`assunto`,`mensagem`, `lido`,`data`, `id_utilizador`,`id_emissor`) VALUES (?, ?, ?, ?, ?,?)";

		$stmt2 = $mysqli->prepare($query);

		$stmt2->bind_param("ssisii", $assunto, $mensagem, $lido, $data, $reservante, $func);

		// data da mensagem é sempre a data actual
		$data=date("Y-m-d H:i:s");
		
		// lido = 0 indica que a mensagem vai com o estado "por ler"
		$lido=0;

		$assunto = "Notificação da reserva!";
		$mensagem = "Caro ".$destinatario.". Esta é uma mensagem de notificação para indicar que o pedido da sua reserva do kit <b>".$kit."</b> foi enviado com sucesso, por favor aguarde pela avaliação de um funcionário.";
		

		$stmt2->execute();
	});
?>