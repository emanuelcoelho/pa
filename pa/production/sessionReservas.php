<?php
     // verifica quantidades de reservas em atraso e pendentes, altera reservas de em progresso para em atraso caso seja necessário

     $_SESSION['pendenteAviso']="";
     $_SESSION['atrasoAviso']="";
     $_SESSION['reservasAviso']="";
     $_SESSION['pendente']=0;
     $_SESSION['atraso']=0;
     $_SESSION['totalReservas']=0;

     // recolhe a data de hoje
     $data=date("Y-m-d H:i:s");

     // verifica a quantidade de reservas que estão em progresso e já passaram a data de entrega
     $sql5 = "SELECT reserva.id,
               reserva.data_inicio,
               reserva.data_fim,
               reserva.id_reservante,
               reserva.id_funcionario,
               estado.descricao AS descEst,
               kit.descricao AS descKit,
               kit.designacao AS desigKit,
               user.username AS descReservante
               FROM reserva 
               INNER JOIN user ON reserva.id_reservante = user.id
               INNER JOIN kit ON reserva.id_kit = kit.id
               INNER JOIN estado ON reserva.id_estado = estado.id 
               WHERE estado.descricao = 'Em progresso'
               AND reserva.data_fim<'$data'";
     $result5 = mysqli_query($mysqli,$sql5);
     $count5 = mysqli_num_rows($result5);

     // recolhe id do username sistema
     $sql3 = "SELECT * FROM user WHERE username = 'Sistema'";
     // recolhe informacoes do user sistema atraves de id
     $result3 = mysqli_query($mysqli,$sql3);
     $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
     // recolhe mail do user sistema
     $funcmail=$row3['email'];

     // se existir uma ou mais reservas
     if($count5>=1)
     {

          // recolhe id do estado "em atraso"
          $sql = "SELECT * FROM estado WHERE descricao = 'Em atraso' ";
          $result = mysqli_query($mysqli,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          $estado=$row['id'];

          // enquanto existirem reservas
          while ($row5 = $result5->fetch_assoc()) {

               // actualiza reserva para ficar em atraso
               $resId=$row5['id'];

               $query = "UPDATE `reserva` SET `id_estado` = ? WHERE `id` = ?";

               $stmt = $mysqli->prepare($query);

               $stmt->bind_param("ii", $estado,$resId);

               $stmt->execute();

               //manda mensagem de aviso ao utilizador
               $query4 = "INSERT INTO `mensagem` (`assunto`,`mensagem`, `lido`,`data`, `id_utilizador`,`id_emissor`) VALUES (?, ?, ?, ?, ?,?)";

               $stmt4 = $mysqli->prepare($query4);

               $stmt4->bind_param("ssisii", $assunto, $mensagem, $lido, $data, $idDestinatario, $funcionario);

               $lido=0;

               $funcionario = $row5['id_funcionario'];

               $idDestinatario = $row5['id_reservante'];
               $myusername = $row5['descReservante'];
               $kit = $row5['descKit'];
               $Dkit = $row5['desigKit'];
               $dataFim = $row5['data_fim'];

               $assunto = "Aviso!";
               $mensagem = "Caro ".$myusername.". 
               O tempo de aluguer do kit <b>".$Dkit." - ".$kit."</b> já chegou ao final, a data de entrega do kit está registada como <b>".$dataFim."</b>, por favor entregue o kit ou entre em contacto com o funcionário através do email <b>".$funcmail."</b> para explicar a situação!";
               

               $stmt4->execute();
          }     
     }

     // verifica a quantidade de reservas que estão pendentes
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

     // se existir uma ou mais reservas pendentes
     if($count3>=1)
     {
          // recolhe a quantidade de reservas pendentes que existem
     	$_SESSION['pendente']=$count3;
     	$_SESSION['pendenteAviso']='<span class="badge bg-green">  '.$_SESSION['pendente'].' </span>';
     }


     // verifica a quantidade de reservas que estão em atraso
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

     // se existir uma ou mais reservas em atraso
     if($count4>=1)
     {
          // recolhe a quantidade de reservas pendentes que existem
     	$_SESSION['atraso']=$count4;
     	$_SESSION['atrasoAviso']='<span class="badge bg-green">  '.$_SESSION['atraso'].' </span>';
     }

     // se a soma de reservas pendentes e em atraso for maior ou igual a 1
     if(($count3+$count4)>=1)
     {    
          // recolhe a quantidade total de reservas pendentes e em atraso que existem
     	$_SESSION['totalReservas']=intval($_SESSION['atraso'])+intval($_SESSION['pendente']);
     	$_SESSION['reservasAviso']='<span class="badge bg-green">  '.$_SESSION['totalReservas'].' </span>';
     }
?>