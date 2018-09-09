<?php 

	// pesquisa por reservas livres numa certa data para preencher a tabela
	$app->post('/api/teste/reserva1', function($request, $response, $args) {
		
		require_once('dbconnect_teste.php');

		
		$date1 = $request->getParsedBody()['from_date'];
		$date2 = $request->getParsedBody()['to_date'];

		$date1=date("Y-m-d", strtotime($date1));
		$date2=date("Y-m-d", strtotime($date2));

		$d1= strtotime($date1);
		$d2= strtotime($date2);
		
		$secs = $d2 - $d1;// == <seconds between the two times>
		$days = $secs / 86400;
		

		// recolhe id de categoria kit "sem kit"
		$sql = "SELECT * FROM categoria_kit WHERE descricao = 'Sem categoria'";
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$semcat=$row['id'];

		// recolhe id de estado "pendente"
		$sql = "SELECT * FROM estado WHERE descricao = 'Pendente'";
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$pendente=$row['id'];

		// recolhe id de estado "aceite"
		$sql = "SELECT * FROM estado WHERE descricao = 'Aceite'";
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$aceite=$row['id'];

		// recolhe id de estado "em progresso"
		$sql = "SELECT * FROM estado WHERE descricao = 'Em progresso'";
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$progresso=$row['id'];

		// recolhe id de estado "em atraso"
		$sql = "SELECT * FROM estado WHERE descricao = 'Em atraso'";
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$atraso=$row['id'];

        // verifica os kits que estao ocupados    data_inicio <= date1 <= data_fim OU date1 <= data_inicio <= date2 OU id_estado = em atraso
        $query="SELECT * FROM reserva 
			WHERE (id_estado='$progresso' AND data_inicio<='$date1' AND data_fim>='$date1') 
			OR (id_estado='$progresso' AND data_inicio>='$date1' AND data_inicio<='$date2')
            OR (id_estado='$aceite' AND data_inicio<='$date1' AND data_fim>='$date1') 
			OR (id_estado='$aceite' AND data_inicio>='$date1' AND data_inicio<='$date2')
			OR (id_estado='$atraso')
            GROUP BY id_kit";
	
		$result=$mysqli->query($query);
		$teste[0]="1";
		$i=0;
		// Loop through the query results, outputing the options one by one
		while ($row = $result->fetch_assoc()) {

			$teste[$i] = $row['id_kit'];
			$i++;
		}	

		$query = "SELECT count(b.descricao) as contagem, 
				  b.id as id, 
				  b.descricao as descricao, 
				  c.descricao as descCat,
				  b.observacao
				  FROM  kit b, categoria_kit c  
				  WHERE b.id_categoria != $semcat  
				  and b.limite_data >= $days
				  and b.id NOT IN (".implode(',',$teste).")
				  and b.id_categoria=c.id
				  GROUP BY b.descricao 
				  ORDER BY b.id";

		$result=$mysqli->query($query);


		// Loop through the query results, outputing the options one by one
		while ($row = $result->fetch_assoc()) {  
			echo '<tr> 
					

					<td> '.$row['descricao'].'</td>
					<td> '.$row['descCat'].'</td>
					<td><textarea rows="4" cols="5" style="with:100%;min-width:400px;max-width:500px;min-height:100px;max-height:100px;" readonly>'.$row['observacao'].'</textarea></td>
					<td><button id="button[]" type="button" onclick="myFunction(this)" class="btn btn-primary botao" data-id="'.$row['id'].'">Reservar</button></td>
					</tr>';
			echo  $row['id'];

		}	
		
		
	});



	// cria nova reserva com estado pendente
	$app->post('/api/teste/reserva2', function($request, $response, $args) {

		//$idkit = $request->getAttribute('id');
		
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
			   kit.designacao AS kitDesig,
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
		$kitDes=$row5['kitDesig'];

		$query = "INSERT INTO `mensagem` (`assunto`,`mensagem`, `lido`,`data`, `id_utilizador`,`id_emissor`) VALUES (?, ?, ?, ?, ?,?)";

		$stmt2 = $mysqli->prepare($query);

		$stmt2->bind_param("ssisii", $assunto, $mensagem, $lido, $data, $reservante, $func);

		// data da mensagem é sempre a data actual
		$data=date("Y-m-d H:i:s");
		
		// lido = 0 indica que a mensagem vai com o estado "por ler"
		$lido=0;

		$assunto = "Notificação da reserva!";
		$mensagem = "Caro ".$destinatario.". Esta é uma mensagem de notificação para indicar que o pedido da sua reserva do kit <b>".$kitDes." - ".$kit."</b> foi enviado com sucesso, por favor aguarde pela avaliação de um funcionário.";
		

		$stmt2->execute();
	});
?>