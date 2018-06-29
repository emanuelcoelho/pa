<?php
// iniciar uma sessão

$user=$_SESSION['id'];
$id=$_GET['var'];
  	$query = "SELECT * FROM `mensagem` WHERE `id`='$id' "; // Run your query
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

	if ($row['id_utilizador']!=$user)
	{
		header('Location: index.php');
	}




?>