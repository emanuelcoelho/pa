<?php 
  // ligaçao a bd
  require_once('dbconnect_teste.php');
  // define as permissoes e verifica se tem sessao iniciada
  require_once('session.php');
  // verifica se tem permissão para editar reservas
  require_once('session_reservas.php');
  // numero de reservas pendentes e em atraso, tambem actualiza reservas em progresso para em atraso se for necessario
  require_once('sessionReservas.php'); 
  // numero de mensagens
  require_once('sessionMessages.php'); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title> LIA Reservas </title>

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
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">  
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

              <!-- top right menu -->
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

                <!-- top right message menu -->
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <?php echo $_SESSION['numberMessages']; ?>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                      // recolhe id de utilizador na sessao actual
                      $id=$_SESSION['id'];

                      // recolhe as 5 ultimas mensagens do utilizador que estejam por ler
                      $sql3 = "SELECT * FROM mensagem 
                               WHERE id_utilizador = '$id' 
                               AND lido = 0 
                               ORDER BY data DESC 
                               LIMIT 5  ";
                      $result3 = mysqli_query($mysqli,$sql3);

                      // escreve as 5 mensagens recolhidas no menu de mensagens
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
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ver histórico <small>Seleccione a reserva que pretende editar</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <!-- form -->
                    <form id="demo-form2" class="form-horizontal form-label-left" >

                      <div class="form-group">
                        <!-- tabela das reservas -->
                        <table id="table" class="table table-striped table-bordered bulk_action dt-responsive text-center nowrap" cellspacing="0" width="100%">
                        
                       
                          <thead>
                            <tr>                              
                              <th class="text-center">Requisitante</th>
                              <th class="text-center">Funcionário</th>
                              <th class="text-center">Designação</th>
                              <th class="text-center">Kit</th>
                              <th class="text-center">Data inicial</th>
                              <th class="text-center">Data final</th>
                              <th class="text-center">Estado</th>
                              <th class="text-center">Observação</th>
                              <th class="text-center">Editar</th>
                            </tr>
                          </thead>                          
                          <tbody>
                            <?php

                              // recolhe todas as reservas                               
                              $query = "SELECT reserva.id,
                                        reserva.data_inicio,
                                        reserva.data_fim,
                                        reserva.observacao,
                                        estado.descricao AS descEst,
                                        kit.descricao AS descKit,
                                        kit.designacao AS desigKit,
                                        res.username AS descReservante,
                                        func.username AS descFuncionario                                       
                                        FROM reserva 
                                        INNER JOIN user as res ON reserva.id_reservante = res.id
                                        INNER JOIN user as func ON reserva.id_funcionario = func.id
                                        INNER JOIN kit ON reserva.id_kit = kit.id
                                        INNER JOIN estado ON reserva.id_estado = estado.id";
                              $result=$mysqli->query($query);                              

                              // percorre todos os resultados da query e apresenta os mesmos
                              while ($row = $result->fetch_assoc()) {
                                
                                // preenche a tabela
                                echo '<tr>                                       
                                      <td> '.$row['descReservante'].'</td>
                                      <td> '.$row['descFuncionario'].'</td>
                                      <td> '.$row['desigKit'].'</td> 
                                      <td> '.$row['descKit'].'</td> 
                                      <td> '.$row['data_inicio'].'</td>
                                      <td> '.$row['data_fim'].'</td>   
                                      <td>'.$row['descEst'].'</td>
                                      <td>'.$row['observacao'].'</td>
                                      <td><button id="button[]" type="button" class="btn btn-primary botao" value='.$_SESSION['id'].' data-id='.$row['id'].'><i class="fa fa-pencil"></i></button>
                                      </td>
                                    </tr>';
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </form>
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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
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

        // funcao de mensagens
        $(".msgm").click(function(){ 
          // ao carregar numa das mensagens recolhe o id da mensagem
          var v = $(this).attr("id");        
          // e corre uma api para mudar o estado dessa mensagem para "lido" e depois abre a mensagem escolhida
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

        // inicializa tabela
        $('#table').DataTable( {
          "order": [[ 4, "asc" ]],
          "columnDefs": [
            { "orderable": false, "targets": 8 }
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
          }
        });

        // ao carregar no botao da tabela
        $('#table').on('click','.botao',function () {
          // recolhe id da reserva
          var v = $(this).data('id');
          // abre pagina para editar reserva        
          if (v != undefined && v != null) {
            window.location = '/pa/production/form_edit_all_reservas.php?var=' + v;
          }
        });
      });
    </script>
  </body>
</html>