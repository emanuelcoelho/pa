<?php

  // verifica se o utilizador activo tem permissão para ver o item actual

  // se o utilizador não tiver permissão para ver itens escondidos
  if($_SESSION['ver_admin']==0)
  {

    // recolhe o id do item actual 
  	$id=$_GET['var'];

    // recolhe informações do item actual
  	$query = "SELECT * FROM `itens` WHERE `id`='$id' "; // Run your query
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    // se for um item escondido
    if ($row['visivel']==0)
    {
      // expulsa o utilizador da página actuaç
    	header('Location: index.php');
    }
  }	
?>