<?php



$app->get('/api/teste2/last', function($request) {

	require_once('dbconnect_teste.php');
	

	$query = "SELECT `id` FROM `teste` ORDER BY `id` DESC LIMIT 1";
	$result = $mysqli->query($query);

	$data[] = $result->fetch_assoc();

	header('Content-Type: application/json');

	echo json_encode($data);
	
});


$app->post('/api/teste2/insertdate', function($request) {

	require_once('dbconnect_teste.php');
	

	$query = "INSERT INTO `teste` (`first_name`, `last_name`, `number`, `hidden`, `id_fkey`) VALUES (?, ?, ?, ?, ?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("ssiii", $first_name, $last_name, $number, $hidden, $desc);

	$first_name = $request->getParsedBody()['first_name'];
	$last_name = $request->getParsedBody()['last_name'];
	$number = $request->getParsedBody()['number'];
	$hidden = $request->getParsedBody()['hidden'];
	$desc = $request->getParsedBody()['desc'];

	$stmt->execute();
	
	echo $first_name." ".$last_name." ".$number." ".$hidden;
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


$app->post('/api/teste2/testeatributo', function($request) {

	require_once('dbconnect_teste.php');

	$query1 = "SELECT `id` FROM `teste` ORDER BY `id` DESC LIMIT 1"; // Run your query
		$result1=$mysqli->query($query1);
		$row1 = $result1->fetch_object();
		$num=$row1->id;

		echo $num;


		$number = count($_POST["name"]);
		if($number >= 1)
		{
			for($i=0; $i<$number; $i++)
			{
				if(trim($_POST["name"][$i] != ''))
				{
					$descricao = $request->getParsedBody()['name'][$i];
					
					echo $descricao;
				}
			}
		}
});

$app->post('/api/teste2/fuckoff', function($request) {

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

?>