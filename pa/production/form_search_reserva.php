<?php 
  // ligaçao a bd
  require_once('dbconnect_teste.php');
  // define as permissoes e verifica se tem sessao iniciada
  require_once('session.php');
  // verifica se tem permissão para reservar kits
  require_once('session_reservar.php');
  // numero de reservas pendentes e em atraso, tambem actualiza reservas em progresso para em atraso se for necessario
  require_once('sessionReservas.php'); 
  // numero de mensagens
  require_once('sessionMessages.php'); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>


    <style >
      
      .hiddenFielde{
          display: none;
      }
    </style>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title> IPVC Reservas </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!--Jquery Ui -->
    <link rel="stylesheet" href="../vendors/jquery-ui-1.12.1.custom/jquery-ui.css">

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- jQuery Ui -->
    <script src="../vendors/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="logo_branco.png" style="width:50px;height:45px;"></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Bem vindo,</span>
                <h2><?php echo $_SESSION['username']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Navegação</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a></li>
                  <li <?php echo $style_reservar;?> ><a href="form_search_reserva.php"><i class="fa fa-archive"></i> Reservar kit </a></li>
                  <li <?php echo $style_ver;?> ><a ><i class="fa fa-search" ></i> Pesquisar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li <?php echo $style_user_ver;?> ><a  href="form_search_user.php">Utilizadores</a></li>
                      <li <?php echo $style_ver;?> ><a  href="form_search_view_kit.php">Kits</a></li>
                      <li <?php echo $style_ver;?> ><a  href="form_search_view_cat_kit.php">Categorias de kits</a></li>
                    </ul>
                  </li>
                  <li <?php echo $style_reservas;?> ><a  ><i class="fa fa-archive" ></i> Reservas <?php echo $_SESSION['reservasAviso']; ?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li <?php echo $style_reservas;?> ><a href="form_search_pendente.php">Reservas pendentes <?php echo $_SESSION['pendenteAviso']; ?></a></li>
                      <li <?php echo $style_reservas;?> ><a href="form_search_atraso.php">Reservas em atraso <?php echo $_SESSION['atrasoAviso']; ?></a></li>
                      <li <?php echo $style_reservas;?> ><a href="form_search_decorrer.php">Reservas aceites/em progresso </a></li>
                      <li <?php echo $style_reservas;?> ><a href="form_search_edit_all_reservas.php">Todas as reservas </a></li>
                    </ul>
                  </li>
                  <li <?php echo $style_menu_criar;?> ><a ><i class="fa fa-edit" ></i> Criar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li <?php echo $style_criar_editar;?> ><a href="form_item.php">Item</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_categoria_item.php">Categoria item  </a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_kit.php">Kit</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_categoria_kit.php">Categoria kit</a></li>      
                      <li <?php echo $style_criar_editar;?> ><a href="form_estado.php">Estado</a></li>
                      <li <?php echo $style_user_editar;?> ><a href="form_grupo.php">Grupo</a></li>
                    </ul>
                  </li>
                  <li <?php echo $style_menu_editar;?> ><a ><i class="fa fa-pencil" ></i> Editar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_item.php">Item</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_categoria_item.php">Categoria item</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_kit.php">Kit</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_categoria_kit.php">Categoria kit</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_estado.php">Estado</a></li>
                      <li <?php echo $style_user_editar;?> ><a href="form_search_edit_group.php">Grupo</a></li>
                      <li <?php echo $style_user_editar;?> ><a href="form_search_edit_user.php">Utilizador</a></li>                     
                    </ul>
                  </li>
                  <li <?php echo $style_criar_msg;?> ><a href="form_search_send_messages.php"><i class="fa fa-send"></i> Enviar mensagem </a></li>
                  <li <?php echo $style_ver_historico;?> ><a href="form_search_history_user.php"><i class="fa fa-book"></i> Histórico utilizador </a></li>
                  <li <?php echo $style_reservar;?> ><a href="form_myhistory_reservas.php"><i class="fa fa-book"></i> Meu histórico </a></li>
                  <li <?php echo $style_ver;?> ><a href="form_sobre.php"><i class="fa fa-info"></i> Sobre </a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['username']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a <?php echo $style_ver;?> href="form_utilizador.php"><i class="fa fa-edit pull-right"></i> Editar informações</a></li>
                    <li><a <?php echo $style_reservar;?> href="form_myhistory_reservas.php"><i class="fa fa-book pull-right"></i> Meu histórico </a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <?php echo $_SESSION['numberMessages']; ?>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                      $id=$_SESSION['id'];

                      $sql3 = "SELECT * FROM mensagem 
                               WHERE id_utilizador = '$id' 
                               AND lido = 0 
                               ORDER BY data DESC 
                               LIMIT 5  ";
                      $result3 = mysqli_query($mysqli,$sql3);

                      while ($row3 = $result3->fetch_assoc()) {
                        $mensagem= substr($row3['mensagem'],0,40);
                        $date = new DateTime($row3['data']);
                                  
                                 
                                   echo '<li>
                                          <a class="msgm" id='.$row3['id'].'>
                                            <span>
                                              <span><b>'.$row3['assunto'].'</b></span>
                                              <span class="time">'.date_format($date, 'H:i d-m-Y').'</span>
                                            </span>
                                            <span class="message">
                                              '.$mensagem.'
                                            </span>
                                          </a>
                                        </li>';
                                }

                    ?>
                    <li>
                      <a href="form_search_messages.php" align="center">
                        <b><u>Ver todas as mensagens</u></b>
                      </a>
                    </li>
                    
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" action="" method="get" class="form-horizontal form-label-left">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reservar Kit <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />        
                      
                      <div class="form-group" id="demo-form1">
                        <table id="table" class="table table-striped table-bordered bulk_action text-center dt-responsive nowrap" cellspacing="0" width="100%">
                        
                        <!--<table id="example" class="display" cellspacing="0" width="100%"> -->
                          <thead>
                              <tr>
                              
                                
                                <th class="text-center"></th>
                                <th class="text-center">Kit</th>
                                <th class="text-center">Observação</th>
                                <th class="text-center">Disponibilidade</th>
                                <th></th>
                              </tr>
                            </thead>
                            
                            <tbody>

                              <?php

                              


                              // recolhe id de estado "em atraso"
                              $sql = "SELECT * FROM estado WHERE descricao = 'Em atraso'";
                              $result = mysqli_query($mysqli,$sql);
                              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                              $atraso=$row['id'];

                              // verifica todos os kits que estejam em atraso
                              $query = "SELECT * FROM `reserva` WHERE `id_estado`='$atraso' GROUP BY `id_kit`";

                              $result=$mysqli->query($query);
                              $teste[0]="1";
                              $i=0;
                              // Loop through the query results, outputing the options one by one
                              while ($row = $result->fetch_assoc()) {

                                $teste[$i] = $row['id_kit'];
                                $i++;
                              } 

                              // recolhe id de categoria_kit "Sem categoria"
                              $sql = "SELECT * FROM categoria_kit WHERE descricao = 'Sem Categoria'";
                              $result = mysqli_query($mysqli,$sql);
                              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                              $noCat=$row['id'];

                              $query = "SELECT  
                                    b.id as id, 
                                    b.descricao as descricao, 
                                    c.descricao as descCat,
                                    b.observacao
                                    FROM  kit b, categoria_kit c  
                                    WHERE b.id NOT IN (".implode(',',$teste).")
                                    AND b.id_categoria = c.id
                                    AND c.id != '$noCat' 
                                    ORDER BY b.id";

                              $result=$mysqli->query($query);
                              
                              $data=date("Y-m-d");
                              //echo $data;
                              // Loop through the query results, outputing the options one by one
                              while ($row = $result->fetch_assoc()) {  

                                $inicio = array();

                                $idKit = $row['id'];


                                //echo "<br>kit com id: ".$idKit."";
                                //echo $data; 

                                $sql = "SELECT reserva.id,
                                          reserva.data_inicio,
                                          reserva.data_fim,
                                          reserva.id_kit,
                                          estado.descricao AS descEst
                                          FROM reserva 
                                          INNER JOIN estado ON reserva.id_estado = estado.id 
                                          WHERE (reserva.id_kit = '$idKit' AND estado.descricao = 'Em progresso' AND reserva.data_fim>='$data')
                                          OR (reserva.id_kit = '$idKit' AND estado.descricao = 'Aceite' AND reserva.data_fim>='$data')
                                          OR (reserva.id_kit = '$idKit' AND estado.descricao = 'Pendente' AND reserva.data_fim>='$data')";
                                $result1 = mysqli_query($mysqli,$sql);
                                $count1 = mysqli_num_rows($result1);

                                
                                $n=0;


                                if($count1>=1)
                                {
                                  while ($row1 = $result1->fetch_assoc()) {
                                    
                                    //echo "<br> Data inicial do ciclo : ".$row1['data_inicio'];
                                    //echo "<br> Data final do ciclo : ".$row1['data_fim']; 
                                    $inicio[]=date('Y-m-d', strtotime($row1['data_inicio']));
                                    $final=date('Y-m-d', strtotime($row1['data_fim']));
                                   // echo "<br> Data do ciclo ".$i.", posição array ".$n.": ".$inicio[$n];
                                    

                                    while($inicio[$n]<$final)
                                    {
                                      
                                      $inicio[] = date('Y-m-d', strtotime($inicio[$n]. ' + 1 days'));
                                      $n++;
                                      //echo "<br> Data do ciclo ".$i.", posição array ".$n.": ".$inicio[$n];
                                    }
                                    $n++;
                                    //echo "<br>";
                                    //$i++;  
                                  }
                                  //echo "<br>Com reserva<br>";
                                  //print_r($inicio);
                                  

                                }
                                else if($count1==0)
                                {
                                    $inicio[]=$data;
                                    //echo "<br>Sem reserva<br>";
                                    //print_r($inicio);
                                }

                                //echo "<script type=text/javascript> alert(".json_encode($inicio)."); </script>";


                                echo '<tr> 
                                    

                                    <td> '.$row['descCat'].'</td>
                                    <td> '.$row['descricao'].'</td>
                                    <td><textarea rows="4" cols="5" style="with:100%;min-width:400px;max-width:500px;min-height:100px;max-height:100px;" readonly>'.$row['observacao'].'</textarea></td>
                                    <td><input type="input" name="hiddenField'.$row['id'].'" id="hiddenField'.$row['id'].'" class="hiddenFielde" /></td>
                                    <td><button id="button[]" type="button"  class="btn btn-primary botao" data-id="'.$row['id'].'">Reservar</button></td>
                                    </tr>';
                                
                                echo "<script > 
                                  
                                  var arrayFromPHP".$idKit." = ".json_encode($inicio).";
                                  

                                  $( '#hiddenField".$idKit."' ).datepicker({
                                    showOn: 'button',
                                      buttonText: '',
                                    monthNames: [ 'Janeiro','Fevereiro','Março','Abril','Maio','Junho',
                                    'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro' ],
                                    monthNamesShort: [ 'Jan','Fev','Mar','Abr','Mai','Jun',
                                    'Jul','Ago','Set','Out','Nov','Dez' ],
                                    dayNames: [
                                      'Domingo',
                                      'Segunda-feira',
                                      'Terça-feira',
                                      'Quarta-feira',
                                      'Quinta-feira',
                                      'Sexta-feira',
                                      'Sábado'
                                    ],
                                    dayNamesShort: [ 'Dom','Seg','Ter','Qua','Qui','Sex','Sáb' ],
                                    dayNamesMin: [ 'Dom','Seg','Ter','Qua','Qui','Sex','Sáb' ],
                                    weekHeader: 'Sem',
                                    beforeShowDay: function(date){

                                      if (!$.datepicker.noWeekends(date)[0])
                                      return [false, '', '']; 

                                      var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                                      return [ arrayFromPHP".$idKit.".indexOf(string) == -1 ]

                                    },
                                    dateFormat: 'yy-mm-dd',
                                    minDate: 0
                                  }).next('.ui-datepicker-trigger').addClass('fa fa-calendar');

                                  
                                  

                                 </script>";

                              } 

                            ?>
                        
                          </tbody>
                        </table>
                       
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../vendors/bootstrap/js/transition.js"></script>
    <script src="../vendors/bootstrap/js/collapse.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>


    

    <script>

      $(document).ready(function(){

        $(".msgm").click(function(){ // Click to only happen on announce links

          var v = $(this).attr("id");        
          if (v != undefined && v != null) {
            $.ajax({
              type: 'put',
                      url: "http://myslimsite/api/formMessageEdit/update/num="+v,
                      contentType: false,
                      cache: false,
                      processData:false,
                      success: function(data) { 
                        window.location.href = "/pa/production/form_open_message.php?var=" + v;
                      }
            });
          }  
         });

        

        /*
        $( '.hiddenFielde' ).datepicker({
          showOn: 'button',
            buttonText: '',
          monthNames: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
          "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ],
          monthNamesShort: [ "Jan","Fev","Mar","Abr","Mai","Jun",
          "Jul","Ago","Set","Out","Nov","Dez" ],
          dayNames: [
            "Domingo",
            "Segunda-feira",
            "Terça-feira",
            "Quarta-feira",
            "Quinta-feira",
            "Sexta-feira",
            "Sábado"
          ],
          dayNamesShort: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
          dayNamesMin: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
          weekHeader: "Sem",
          beforeShowDay: $.datepicker.noWeekends,
          minDate: 2,
          dateFormat: "yy-mm-dd"
        }).next('.ui-datepicker-trigger').addClass('fa fa-calendar');
        
        */
  

        /*
        $( function() {
          $( "#from_date" ).datepicker();
          $( "#to_date" ).datepicker();
        } );

        $("#from_date").datepicker({
          monthNames: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
          "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ],
          monthNamesShort: [ "Jan","Fev","Mar","Abr","Mai","Jun",
          "Jul","Ago","Set","Out","Nov","Dez" ],
          dayNames: [
            "Domingo",
            "Segunda-feira",
            "Terça-feira",
            "Quarta-feira",
            "Quinta-feira",
            "Sexta-feira",
            "Sábado"
          ],
          dayNamesShort: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
          dayNamesMin: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
          weekHeader: "Sem",
          beforeShowDay: $.datepicker.noWeekends,
          minDate: 2,
          dateFormat: "yy-mm-dd", 
          onSelect: function(selectedDate) {

            $("#to_date").datepicker("option", "minDate", selectedDate);

            $("#to_date").val('');
          }
        });      

          $("#to_date").datepicker({
            monthNames: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
            "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ],
            monthNamesShort: [ "Jan","Fev","Mar","Abr","Mai","Jun",
            "Jul","Ago","Set","Out","Nov","Dez" ],
            dayNames: [
              "Domingo",
              "Segunda-feira",
              "Terça-feira",
              "Quarta-feira",
              "Quinta-feira",
              "Sexta-feira",
              "Sábado"
            ],
            dayNamesShort: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
            dayNamesMin: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
            weekHeader: "Sem",
            beforeShowDay: $.datepicker.noWeekends,
            minDate: 2,
            dateFormat: "yy-mm-dd"
          });
          */


          // TABELA
         
          $('#table').DataTable( {
            "order": [[ 0, "desc" ]],
            "columnDefs": [
              { "orderable": false, "targets": 3 }
            ],
            "language": {
              "lengthMenu": "_MENU_ Registos por página",
              "zeroRecords": "Não foram encontrados registos",
              "info": "Página _PAGE_ de _PAGES_",
              "infoEmpty": "Não foram encontrados registos",
              "infoFiltered": "(de _MAX_ registos no total)",
              "search": "Pesquisar:",
              "oPaginate": {
                "sNext": "Página seguinte",
                "sPrevious": "Página anterior",
                "sFirst": "Primeira página",
                "sLast": "Última página"
              }
            },
            initComplete: function () {
              this.api().columns().every( function () {
                  var column = this;
                  if(column[0]==0){ /* is the first column you want to have dropdown filter */
                      var select = $('<select><option value="">Categoria</option></select>')
                      .appendTo( $(column.header()))
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );

                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      });

                      column.data().unique().sort().each( function ( d, j ) {
                          select.append( '<option value="'+d+'">'+d+'</option>' )
                      });
                    }
              });
            }
          });

          $('#table').on('click','.botao',function () {

            var v = $(this).data('id');        
            if (v != undefined && v != null) {
                window.location = '/pa/production/form_reserva.php?var=' + v;
            }
             
           });


        /*
        $(function() {

          // Get the form.
          var form = $('#demo-form2');

          // Get the messages div.
          var formMessages = $('#msg');

          $("#tbody").fadeIn(1000);

          var teste;
          // Set up an event listener for the contact form.
          $(form).submit(function(event) {
            // Stop the browser from submitting the form.
            event.preventDefault();

            var message1 = $('#from_date').val();  
            var message2 = $('#to_date').val();  

            if(message1 == '' || message2 == '' )  
            {  

              if( message1 == '' )  
              {  
                $('#msg_inicio').html("Deve preencher este campo de forma válida!");
              }
              else
              {
                $('#msg_inicio').html("");
              }

              if( message2 == '' )  
              {  
                $('#msg_fim').html("Deve preencher este campo de forma válida!");
              }
              else
              {
                $('#msg_fim').html("");
              }              
                   
            }  
            else  
            {  

              // Serialize the form data.
              var formData = $(form).serialize();

              // Submit the form using AJAX.
              $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData,
                dataType: "html",
                success: function(response) 
                { 
                  $("#tbody").html(response);
                }

              });
              $('#msg_inicio').html("");
              $('#msg_fim').html("");
            }

          });

      });
      */
    });

    </script>
	   <!--
    <script>
      function myFunction(el) {
        var v = $(el).attr('data-id');        
        if (v != undefined && v != null) {
         // window.location = '/pa/production/form_search_singleKit.php?var=' + v;
           var form = $('#demo-form2');

       // var v = $(this).data('id'); 
        //var dataObject = { 'num': v};
        //var form2 = $('#formtabela');
        var formData = $(form).serialize();
        $.ajax({
          type: 'post',
                  url: "http://myslimsite/api/teste/reserva2/num="+v,
                  data: formData,
                  dataType: "html",
                  success: function(data) { 
                    location.reload();
                  }
        });
        }
      }


      
    </script>
    -->
  </body>
</html>