<?php

$app->put('/api/formKit/insertKit', function($request, $response, $args) {

	require_once('dbconnect_teste.php');
	

	$query = "INSERT INTO `kit` (`descricao`,`id_categoria`, `limite_data`, `observacao`) VALUES (?, ?, ?, ?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("siis", $descricao, $cat, $limite, $obs);

	$limite = $request->getParsedBody()['limite'];
	$descricao = $request->getParsedBody()['descricao'];
	$cat = $request->getParsedBody()['desc'];
	$obs = $request->getParsedBody()['obs'];

	$stmt->execute();


	$query1 = "SELECT `id` FROM `kit` ORDER BY `id` DESC LIMIT 1"; // Run your query
	$result1=$mysqli->query($query1);
	$row1 = $result1->fetch_object();
	$num=$row1->id;
	echo $num;
	$kit = $num;

	$number = count($_POST["itens"]);
	if($number >= 1)
	{
		echo "test1";
		for($i=0; $i<$number; $i++)
		{
			echo "test2";
			if(trim($_POST["itens"][$i] != ''))
			{
				echo "test3";

				$sql = "UPDATE `itens` SET `id_kit` = ? WHERE `itens`.`id` = ?";
				$stmt = $mysqli->prepare($sql);

				$id = $request->getParsedBody()['itens'][$i];
				$stmt->bind_param("ii", $kit, $id);

				
				
				
				echo $id;
				$stmt->execute();
			}
		}
		echo "Data Inserted";
	}
	

	
	
	  
});


?>