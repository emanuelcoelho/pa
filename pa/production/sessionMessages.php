<?php
// iniciar uma sessão


$_SESSION['numberMessages']="";


$sql = "SELECT * FROM mensagem WHERE id_utilizador = '".$_SESSION['id']."' AND lido=0 ";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

$_SESSION['mensagens_novas'] = $count;

if($count>0)
{
	$_SESSION['numberMessages']='<span class="badge bg-green">  '.$_SESSION['mensagens_novas'].' </span>';


	
}





?>