<?php
   // iniciar uma sessão
	
	$id=$_GET['var'];

if ($id==$_SESSION['id'])
  {
    $query = "SELECT * FROM `user` WHERE `id`='$id' "; // Run your query
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['email'] = $row['email'];
  }
?>