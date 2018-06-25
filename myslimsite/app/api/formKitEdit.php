<?php


$app->put('/api/formKitEdit/editRemoverItemKit', function($request, $response, $args) {

	require_once('dbconnect_teste.php');

	$id = $request->getParsedBody()['v'];
	$nId = 1;

	$sql = "UPDATE `teste` SET `id_kit` = ? WHERE `id` = ?";
	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param("ii", $nId, $id);
	
	echo $id;
	echo $nId;
	$stmt->execute();

});


$app->put('/api/formKitEdit/editKit', function($request, $response, $args) {

	require_once('dbconnect_teste.php');
	

	$query = "INSERT INTO `teste_kit` (`descricao`,`id_categoria`, `limite_data`) VALUES (?, ?, ?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("sii", $descricao, $cat, $limite);

	$limite = $request->getParsedBody()['limite'];
	$descricao = $request->getParsedBody()['descricao'];
	$cat = $request->getParsedBody()['desc'];

	$stmt->execute();


	$query1 = "SELECT `id` FROM `teste_kit` ORDER BY `id` DESC LIMIT 1"; // Run your query
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

				$sql = "UPDATE `teste` SET `id_kit` = ? WHERE `teste`.`id` = ?";
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