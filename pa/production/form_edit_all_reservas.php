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
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
    
    


    
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
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar reservas <small>Insira as informações necessárias</small></h2>
                    <div class="title_right">
                      <div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right">
                        <a href="form_search_edit_all_reservas.php" id="button" type="button"  class="btn btn-primary botao" ><i class="fa fa-arrow-left"></i>  Voltar pagina anterior</a>
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    
                    <form id="demo-form2"  method="post" action="http://myslimsite/api/formResEdit/allEdit" class="form-horizontal form-label-left" >   

                      <?php
                            $id = $_GET['var'];
                            $query2 = "SELECT reserva.id,
                                        reserva.data_inicio,
                                        reserva.data_fim,
                                        reserva.observacao,
                                        reserva.id_estado,
                                        reserva.id_reservante,
                                        estado.descricao AS descEst,
                                        kit.descricao AS descKit,
                                        res.username AS descReservante,
                                        func.username AS descFuncionario                                       
                                        FROM reserva 
                                        INNER JOIN user as res ON reserva.id_reservante = res.id
                                        INNER JOIN user as func ON reserva.id_funcionario = func.id
                                        INNER JOIN kit ON reserva.id_kit = kit.id
                                        INNER JOIN estado ON reserva.id_estado = estado.id
                                        WHERE reserva.id='$id' "; // Run your query
                            $result2=$mysqli->query($query2);
                            $row2 = $result2->fetch_assoc();

                            $_SESSION['paginaAnterior'] = 'form_edit_all_reservas.php?var='.$id;
                      ?>

                      <input type="hidden" name="idres" id="idres" value="<?php echo $id; ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="requisitante">Requisitante </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="requisitante" name="requisitante" class="form-control col-md-7 col-xs-12" value="<?php echo $row2['descReservante']; ?>" disabled>
                          <span id="msg_requisitante" name="msg" style="color:red"></span>
                        </div>
                        <button id="button[]" type="button" class="btn btn-primary botao" data-id="<?php echo $row2['id_reservante']; ?>">Página de utilizador</button>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="funcionario">Funcionário </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="funcionario" name="funcionario" class="form-control col-md-7 col-xs-12" value="<?php echo $row2['descFuncionario']; ?>" disabled>
                          <span id="msg_funcionario" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kit">Kit </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="kit" name="kit" class="form-control col-md-7 col-xs-12" value="<?php echo $row2['descKit']; ?>" disabled>
                          <span id="msg_kit" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inicio">Data de início de reserva </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="inicio" name="inicio" class="form-control col-md-7 col-xs-12" value="<?php echo $row2['data_inicio']; ?>" disabled>
                          <span id="msg_inicio" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fim">Data de fim de reserva </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fim" name="fim" class="form-control col-md-7 col-xs-12" value="<?php echo $row2['data_fim']; ?>" disabled>
                          <span id="msg_fim" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Estado </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                         
                          <?php

                            // Assume $db is a PDO object
                            $query = "SELECT * FROM `estado` "; // Run your query
                            $result=$mysqli->query($query);
                            
                            echo '<select class="form-control" id="estado" name="estado" >'; // Open your drop down box

                            // Loop through the query results, outputing the options one by one
                            while ($row = $result->fetch_assoc()) {
                               echo '<option value="'.$row['id'].'" ';
                               if( $row['id'] == $row2['id_estado'] )
                               {
                                 echo ("selected");
                               }
                               echo ' ">'.$row['descricao'].'</option>';
                            }

                            echo '</select>';// Close your drop down box
                          ?>
                          <span id="msg_estado" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obs">Observações (300 chars max) : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="obs" class="form-control" name="obs"><?php echo  $row2['observacao']; ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a id="button[]" type="button" class="btn btn-primary" href="<?php echo '/pa/production/print.php?r='.$id.'' ?>;" target="_blank" >Imprimir ficheiro</a>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <input type="hidden" name="_METHOD" value="PUT"/> 
                          <button type="submit" class="btn btn-success">Submeter</button>                          
                          <span id="msg" name="msg" class="control-label col-md-5 col-sm-3 col-xs-12" ></span>                      
                        </div>
                      </div>

                      <div class="ln_solid"></div>


                    </form>
                    
                    <!--</form>-->
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

     $(".botao").click(function(){

        var v = $(this).data('id');        
        if (v != undefined && v != null) {
          window.location = "/pa/production/form_info_user.php?var=" + v;
        }

      });
 
     
      
        $(function() {
          // Get the form.
          var form = $('#demo-form2');
          
          // Get the messages div.
          var formMessages = $('#msg');
           
          // Set up an event listener for the contact form.
          $(form).submit(function(event) {

            // Stop the browser from submitting the form.
            event.preventDefault();
 
            // Serialize the form data.
            var formData = $(form).serialize();
            // Submit the form using AJAX.
            $.ajax({
                type: 'post',
                url: $(form).attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data) { 
                  location.reload();
                }
            });
            
            $('#msg').html("Reserva editada com sucesso!");
                
          });

        });

      });
    </script>


  
  </body>
</html>