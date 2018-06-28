<?php
// iniciar uma sessão
	
$sql = "SELECT * FROM user WHERE id = '".$_SESSION['id']."' ";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);



$_SESSION['username'] = $row['username'];
$_SESSION['password'] = $row['password'];
$_SESSION['email'] = $row['email'];

?>