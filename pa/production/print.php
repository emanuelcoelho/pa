<?php 
  // ligaçao a bd
  require_once('dbconnect_teste.php');
  // define as permissoes e verifica se tem sessao iniciada
  require_once('session.php');
  // verifica se tem permissão para editar reservas
  require_once('session_reservas.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <style>
      body{
        height:297mm;
        width:210mm;
      }

      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }

      @media print
      {    
        .no-print, .no-print *
        {
          display: none !important;
        }
      }
    </style>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title> LIA Reservas </title>

  </head>

  <!-- conteudo da pagina -->
  <body >
    <!-- botao para imprimir -->
    <button class="no-print" onclick="myFunction()">Imprimir página</button>
    <br>
    <div style="background-color:lightgrey">
      <h3><center>Requisição de Equipamento - Laboratório de Interação e Audiovisuais (L 3.6)</center></h3>
      <br>
    </div>
    <?php
      // recolhe id da reserva atraves do url
      $rid = $_GET['r'];

      // recolhe informacoes da reserva atraves do id                              
      $query = "SELECT reserva.id,
                reserva.id_reservante,
                user.nome,
                user.numero,
                user.email,
                user.telefone
                FROM reserva 
                INNER JOIN user ON reserva.id_reservante = user.id
                where reserva.id='$rid'";
      $result=$mysqli->query($query); 
      $row = $result->fetch_assoc();
    ?>
    <br><b>Nome Completo:</b> <?php echo $row['nome'];?> <b>Data de nascimento:</b> __/__/____  <b>BI:</b> ____________
    <br><b>Telefone/Telemóvel:</b> <?php echo $row['telefone'];?> <b>Email:</b> <?php echo $row['email'];?> 
    <br>&#10066;<b>Aluno do curso:</b> _________________ <b>Ano:</b> ___ <b>N.º Mecanográfico:</b> <?php echo $row['numero'];?> <b>Unidade Orgânica:</b> _____________
    <br>&#10066;<b>Outro:</b> _________________ <b>Observações:</b> _____________________________________________________
    <br>
    <br>----------------------------------------------------------------------------------------------------------------------------------------------------
    <br>
    <?php
      // recolhe id da reserva atraves do url
      $rid = $_GET['r'];

      // recolhe informacoes da reserva atraves do id                              
      $query = "SELECT reserva.id, 
                reserva.data_inicio,
                reserva.data_fim,
                reserva.id_kit,
                kit.designacao AS desigKit,
                kit.descricao AS descKit
                FROM reserva 
                INNER JOIN kit ON reserva.id_kit = kit.id
                where reserva.id='$rid'";
      $result=$mysqli->query($query); 
      $row = $result->fetch_assoc();
      // recolhe id do kit associado a reserva
      $id = $row['id_kit'];
    ?>
    <br><b>Solicita a requisição, entre <?php echo $row['data_inicio'];?> e <?php echo $row['data_fim'];?> , do equipamento no kit <?php echo "".$row['desigKit']." - ".$row['descKit']."";?>, afeto ao Laboratório de Interação e Audiovisuais, com a seguinte fundamentação</b>
    <br>
    <br>___________________________________________________________________________________________________
    <br>___________________________________________________________________________________________________
    <br>___________________________________________________________________________________________________
    <br>___________________________________________________________________________________________________
    <br>
    <br><b>O equipamento é composto por: (VERIFIQUE SE ESTÁ TUDO CERTO)</b>
    <br>
    <br>
    <table style="width:100%">
      <tr>
        <th>Descrição</th>
        <th>Serial</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Observações</th> 
      </tr>
      <?php

        // recolhe informacoes do kit atraves do id
        $query = "SELECT itens.id,
                  itens.serial_number, 
                  itens.marca,
                  itens.descricao,
                  itens.observacao,
                  itens.modelo,
                  itens.id_kit
                  FROM itens 
                  where itens.id_kit='$id'";
        $result=$mysqli->query($query);
        
        // percorre todos os resultados da query e apresenta os mesmos
        while ($row = $result->fetch_assoc()) {
          // preenche tabela
          echo ' <tr> 
          <td>'.$row['descricao'].'</td>
          <td>'.$row['serial_number'].'</td>
          <td>'.$row['marca'].'</td>
          <td>'.$row['modelo'].'</td>
          <td>'.$row['observacao'].'</td>
          </td>
        </tr>';
        }
      ?>
    </table>
    <br>
    <br><b>Após receber o equipamento e ter verificado a sua composição e o seu estado de conservação, declaro que tomei conhecimento que:</b>
    <br>
    <br>- O equipamento pertence à Escola Superior de Tecnologia e Gestão do Instituto Politécnico de Viana do Castelo e está alocado ao Laboratório de Interação e Audiovisuais (L 3.6);
    <br>
    <br>- O equipamento apenas poderá ser utilizado como suporte à realização de trabalhos no âmbito de aulas/projectos;
    <br>
    <br>- Não é permitida a disponibilização do equipamento a terceiros;
    <br>
    <br>- A duração da requisição do equipamento é apenas entre o período mencionado anteriormente. Findo este período, o equipamento deve ser devolvido na data indicada, no mesmo estado de conservação em que me foi entregue. Caso tal não aconteça, estarei sujeito às penalizações indicadas nos termos da avaliação das disciplinas do curso em que me encontro inscrito, assim como do regulamento interno da unidade orgânica a que pertenço.
    <br>
    <br>----------------------------------------------------------------------------------------------------------------------------------------------------
    <br>
    <br><b>Data ____/____/______ O Requerente ______________________________________________________________</b>
    <br>
    <br><b>Data ____/____/______ O Responsável pelo Laboratório de Interação e Audiovisuais (L 3.6) ________________</b>
    <br>
    <br>
    <br><b>Data da Devolução: _______/______/_____; Recebido por: ______________________________________</b>
    <br>
    <br><b>Completo?: SIM &#10066; NÃO &#10066;</b>
    <br>
    <br><b>Observações:</b>
    <br>
    <br>___________________________________________________________________________________________________
    <br>___________________________________________________________________________________________________
    <br>___________________________________________________________________________________________________
    <br>
    <br>
    <br>
    
    <!-- funcao para imprimir -->
    <script>
      function myFunction() {
          window.print();
      }
    </script>
  </body> 
</html>