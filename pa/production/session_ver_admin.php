<?php
   // iniciar uma sessão


  if($_SESSION['ver_admin']==0)
  {


  	$id=$_GET['var'];
  	$query = "SELECT * FROM `itens` WHERE `id`='$id' "; // Run your query
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

	if ($row['visivel']==0)
	{
		header('Location: index.php');
	}

    
  }


	
?>