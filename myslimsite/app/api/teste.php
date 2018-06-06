<?php

// teste POST
$app->post('/api/teste', function($request) {

	$first_name = $request->getParsedBody()['first_name'];
	$last_name = $request->getParsedBody()['last_name'];
	echo "hello again ".$first_name." ".$last_name;
	
});


/*
// criar nova entrada na tabela teste
$app->post('/api/teste/insert', function($request) {

	require_once('dbconnect_teste.php');
	$query = "INSERT INTO `teste` (`first_name`, `last_name`, `number`, `hidden`) VALUES (?, ?, ?, ?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("ssss", $first_name, $last_name, $number, $hidden);

	$first_name = $request->getParsedBody()['first_name'];
	$last_name = $request->getParsedBody()['last_name'];
	$number = $request->getParsedBody()['number'];
	$hidden = $request->getParsedBody()['hidden'];

	$stmt->execute();

	//echo "done";
	
});
*/

// criar nova entrada na tabela teste com ligaçao a teste_fkey (ligaçao chave estrangeira)  (SELECT `id` FROM `teste_fkey` WHERE `descricao` = '$desc')
$app->post('/api/teste/insertF', function($request) {

	require_once('dbconnect_teste.php');
	

	$query = "INSERT INTO `teste` (`first_name`, `last_name`, `number`, `visible`, `id_fkey`, `photo`) VALUES (?, ?, ?, ?, ?, ?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("ssiiis", $first_name, $last_name, $number, $visible, $desc, $image_name);

	$first_name = $request->getParsedBody()['first_name'];
	$last_name = $request->getParsedBody()['last_name'];
	$number = $request->getParsedBody()['number'];
	$visible = $request->getParsedBody()['visible'];
	$desc = $request->getParsedBody()['desc'];

	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
	$image_name = addslashes($_FILES['image']['name']);

	$folder="/xampp/htdocs/images/";

	move_uploaded_file($_FILES['image']['tmp_name'], "$folder".$_FILES['image']['name']);

	$stmt->execute();
	
	echo $first_name." ".$last_name." ".$number." ".$visible;


	$query1 = "SELECT `id` FROM `teste` ORDER BY `id` DESC LIMIT 1"; // Run your query
	$result1=$mysqli->query($query1);
	$row1 = $result1->fetch_object();
	$num=$row1->id;


	$number = count($_POST["name"]);
	if($number >= 1)
	{
		for($i=0; $i<$number; $i++)
		{
			if(trim($_POST["name"][$i] != ''))
			{

				$sql = "INSERT INTO `teste_atributos`(`id_item`,`descricao`) VALUES(?,?)";
				$stmt = $mysqli->prepare($sql);

				$stmt->bind_param("ss", $id_item, $descricao);

				$id_item = $num;
				$descricao = $request->getParsedBody()['name'][$i];
				
				$stmt->execute();
			}
		}
		echo "Data Inserted";
	}

	
	  
});

// criar nova entrada na tabela teste_fkey
$app->post('/api/teste/insertCat', function($request) {

	require_once('dbconnect_teste.php');
	

	$query = "INSERT INTO `teste_fkey` (`descricao`) VALUES (?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("s", $descricao);

	$descricao = $request->getParsedBody()['descricao'];
	

	$stmt->execute();
	
	echo $descricao;


	
	  
});


// pesquisa de elementos visiveis na base de dados
$app->get('/api/teste/visible', function($request) {

	require_once('dbconnect_teste.php');

	$query = "select * from teste where visible=1";
	$result = $mysqli->query($query);

	while($row = $result->fetch_assoc()){
		$data[] = $row;
	}

	if(isset($data)){
		header('Content-Type: application/json');

		echo json_encode($data);

	}
});

$app->post('/api/teste/insertdate', function($request) {

	require_once('dbconnect_teste.php');
	

	$query = "INSERT INTO `teste_data` (`data`) VALUES (?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("s", $data);

	$data = $request->getParsedBody()['data'];

	$stmt->execute();
	
	echo $data;
/*
	$query1 = "INSERT INTO `teste_fkey` (`descricao`) VALUES (?)";

	$stmt1 = $mysqli->prepare($query1);

	$stmt1->bind_param("s", $descricao);

	$descricao = $request->getParsedBody()['desc'];
	
	$stmt->execute();
	$stmt1->execute();
*/
	//echo "done";
	
});

$app->post('/api/teste/image', function($request) {

	require_once('dbconnect_teste.php');

	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
	$image_name = addslashes($_FILES['image']['name']);


	$sql = "INSERT INTO `photo` ( `foto`) VALUES (?)";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("s",$image_name);
	$stmt->execute();

	$folder="/xampp/htdocs/images/";

	move_uploaded_file($_FILES['image']['tmp_name'], "$folder".$_FILES['image']['name']);
	
});

$app->get('/api/teste/image', function($request) {

	require_once('dbconnect_teste.php');

	$query="SELECT * FROM `photo`";

	$result=$mysqli->query($query);
	$folder="images/";

	while($row = $result->fetch_assoc())
	{
		 $image_name=$row["foto"];

		 //echo "<img src='images/grafico.png' width=100 height=100> ";
		 		 
	}

});

