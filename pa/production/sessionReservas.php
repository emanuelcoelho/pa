<?php
// iniciar uma sessão


$_SESSION['pendenteAviso']="";
$_SESSION['atrasoAviso']="";
$_SESSION['reservasAviso']="";
$_SESSION['pendente']=0;
$_SESSION['atraso']=0;
$_SESSION['totalReservas']=0;


$sql3 = "SELECT reserva.id,
          reserva.data_inicio,
          reserva.data_fim,
          reserva.observacao,
          estado.descricao AS descEst,
          kit.descricao AS descKit,
          user.username AS descReservante
          FROM reserva 
          INNER JOIN user ON reserva.id_reservante = user.id
          INNER JOIN kit ON reserva.id_kit = kit.id
          INNER JOIN estado ON reserva.id_estado = estado.id 
          WHERE estado.descricao = 'Pendente'";
$result3 = mysqli_query($mysqli,$sql3);
$count3 = mysqli_num_rows($result3);

if($count3>=1)
{
	$_SESSION['pendente']=$count3;
	$_SESSION['pendenteAviso']='<span class="badge bg-green">  '.$_SESSION['pendente'].' </span>';
}



$sql4 = "SELECT reserva.id,
          reserva.data_inicio,
          reserva.data_fim,
          reserva.observacao,
          estado.descricao AS descEst,
          kit.descricao AS descKit,
          user.username AS descReservante
          FROM reserva 
          INNER JOIN user ON reserva.id_reservante = user.id
          INNER JOIN kit ON reserva.id_kit = kit.id
          INNER JOIN estado ON reserva.id_estado = estado.id 
          WHERE estado.descricao = 'Em atraso'";
$result4 = mysqli_query($mysqli,$sql4);
$count4 = mysqli_num_rows($result4);

if($count4>=1)
{
	$_SESSION['atraso']=$count4;
	$_SESSION['atrasoAviso']='<span class="badge bg-green">  '.$_SESSION['atraso'].' </span>';
}

if(($count3+$count4)>=1)
{
	$_SESSION['totalReservas']=intval($_SESSION['atraso'])+intval($_SESSION['pendente']);
	$_SESSION['reservasAviso']='<span class="badge bg-green">  '.$_SESSION['totalReservas'].' </span>';
}


        

        





?>