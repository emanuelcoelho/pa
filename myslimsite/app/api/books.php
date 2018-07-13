<?php

// Apresentar todas as entradas da tabela books
$app->get('/api/books', function() {
	//echo "Welcome to books";

	require_once('dbconnect.php');

	$query = "select * from books order by id";
	$result = $mysqli->query($query);

	while($row = $result->fetch_assoc()){
		$data[] = $row;
	}

	if(isset($data)){
		header('Content-Type: application/json');

		echo json_encode($data);

	}
});


// Apresentar uma entrada especifica da tabela books
$app->get('/api/books/{id}', function($request) {

	require_once('dbconnect.php');
	$id = $request->getAttribute('id');

	//echo "The id is ".$id;
	$query = "select * from books where id=$id";
	$result = $mysqli->query($query);

	$data[] = $result->fetch_assoc();

	header('Content-Type: application/json');

	echo json_encode($data);

});

// criar nova entrada na tabela books
$app->post('/api/books', function($request) {

	//$my_name = $request->getParsedBody()['my_name'];
	//echo "hello again ".$my_name;
	require_once('dbconnect.php');
	$query = "INSERT INTO `books` (`book_title`, `author`, `amazon_url`) VALUES (?, ?, ?)";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("sss", $book_title, $author, $amazon_url);

	$book_title = $request->getParsedBody()['book_title'];
	$author = $request->getParsedBody()['author'];
	$amazon_url = $request->getParsedBody()['amazon_url'];

	$stmt->execute();
	echo "done";
});

// Actualizar entrada na tabela books
$app->put('/api/books/{id}', function($request) {

	require_once('dbconnect.php');
	$id = $request->getAttribute('id');

	$query = "UPDATE `books` SET `book_title` = ?, `author` = ?, `amazon_url` = ? WHERE `books`.`id` = $id";

	$stmt = $mysqli->prepare($query);

	$stmt->bind_param("sss", $book_title, $author, $amazon_url);

	$book_title = $request->getParsedBody()['book_title'];
	$author = $request->getParsedBody()['author'];
	$amazon_url = $request->getParsedBody()['amazon_url'];

	$stmt->execute();
	echo "done";

});


// Eliminar entrada na tabela books
$app->delete('/api/books/{id}', function($request) {

	require_once('dbconnect.php');
	$id = $request->getAttribute('id');
	
	$query = "delete from books where id=$id";
	$result = $mysqli->query($query);
	
	echo "done";

});