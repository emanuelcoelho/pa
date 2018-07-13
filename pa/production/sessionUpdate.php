<?php
  // verifica se o utilizador que editou é o seu próprio utilizador

  // recolhe id do utilizador que editou	
  $id=$_GET['var'];

  // verifica se id da sessão é igual ao id do utilizador que editou
  if ($id==$_SESSION['id'])
    {

      // se for verdade recolhe informações novas do utilizador
      $query = "SELECT * FROM `user` WHERE `id`='$id' "; 
      $result = $mysqli->query($query);
      $row = $result->fetch_assoc();

      // actualiza variaveis de sessão
      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['email'] = $row['email'];
    }
?>