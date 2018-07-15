<?php 
  // ligaçao a bd
  require_once('dbconnect_teste.php');
  // define as permissoes e verifica se tem sessao iniciada
  require_once('session.php');
  // actualiza as SESSION com informações novas do utilizador caso tenha editado o próprio perfil
  require_once('sessionUpdate.php');
  // verifica se tem permissão para editar utilizadores e grupos
  require_once('session_user_editar.php');
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
              <a href="index.php" class="site_title"><i class="fa fa-book"></i> <span>IPVC Reservas</span></a>
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
                    <h2>Editar utilizador <small>Insira as informações necessárias (campos com <span style="color:red">*</span> são obrigatórios!)</small></h2>
                    <div class="title_right">
                      <div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right">
                        <a href="form_search_edit_user.php" id="button" type="button"  class="btn btn-primary botao" ><i class="fa fa-arrow-left"></i>  Voltar pagina anterior</a>
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    
                    <form id="demo-form2" action="http://myslimsite/api/formEditUser/update" method="post"  class="form-horizontal form-label-left" >

                      <?php
                            $id = $_GET['var'];
                            $query = "SELECT * FROM `user` WHERE `id`='$id' "; // Run your query
                            $result = $mysqli->query($query);
                            $row = $result->fetch_assoc();
                      ?>

                      <input type="hidden" name="iduser" id="iduser" value="<?php echo $row['id'] ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Nome de utilizador <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="username" name="username" class="form-control col-md-7 col-xs-12" value="<?php echo $row['username'] ?>" >
                          <span id="msg_username" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $row['email'] ?>">
                          <span id="msg_email" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="password" name="password" class="form-control col-md-4 col-xs-12 masked" value="<?php echo $row['password'] ?>">
                          <span id="msg_password" name="msg" style="color:red"></span>
                        </div>
                        <div class="control-label">
                            <a  id="eye" class="fa fa-eye fa-lg pull-left"></a>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Número mecatrónico <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="number" class="form-control col-md-7 col-xs-12" min=1 value="<?php echo $row['numero'] ?>">
                          <span id="msg_number" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phonenumber">Número de telefone </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="phonenumber" name="phonenumber" class="form-control col-md-7 col-xs-12"  value="<?php echo $row['telefone'] ?>">
                          <span id="msg_phonenumber" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Grupo </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                      
                          <?php
                                    
                            // Assume $db is a PDO object
                            $query2 = "SELECT * FROM `grupo` "; // Run your query
                            $result2=$mysqli->query($query2);
                           
                            echo '<select class="form-control" id="desc" name="desc" >'; // Open your drop down box
                            // Loop through the query results, outputing the options one by one
                            while ($row2 = $result2->fetch_assoc()) 
                            {
                               echo '<option value="'.$row2['id'].'" '; 
                               if($row2['id'] == $row['id_grupo'] )
                               {
                                  echo("selected");
                               }; 
                               echo '   >'.$row2['descricao'].'</option>';
                            }
                            echo '</select>';// Close your drop down box
                          ?>
                          <span id="msg_cat" name="msg" style="color:red"></span>
                        </div>
                      </div>



                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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

      function show() {
        var p = document.getElementById('password');
        p.setAttribute('type', 'text');
        var g = document.getElementById('eye');
        g.setAttribute('class', 'fa fa-eye-slash fa-lg pull-left');
      }

      function hide() {
        var p = document.getElementById('password');
        var g = document.getElementById('eye');
        g.setAttribute('class', 'fa fa-eye fa-lg pull-left');
        p.setAttribute('type', 'password');
      }

      var pwShown = 0;

      document.getElementById("eye").addEventListener("click", function () {
        if (pwShown == 0) {
          pwShown = 1;
          show();
        } 
        else 
        {
          pwShown = 0;
          hide();
        }
      }, false);

  
      
     
      
        $(function() {
          // Get the form.
          var form = $('#demo-form2');
          
          // Get the messages div.
          var formMessages = $('#msg');
           
          // Set up an event listener for the contact form.
          $(form).submit(function(event) {

            // Stop the browser from submitting the form.
            event.preventDefault();

            var message1 = $('#username').val();  
            var message2 = $('#email').val();  
            var message3 = $('#password').val(); 
            var message4 = $('#number').val(); 

            

            if(message1 == '' || message2 == '' || message3 == '' || message4 == '' )  
            {  

              if( message1 == '' )  
              {  
                $('#msg_username').html("Deve preencher este campo de forma válida! Ex: Pedro");
              }
              else
              {
                $('#msg_username').html("");
              }

              if( message2 == '' )  
              {  
                $('#msg_email').html("Deve preencher este campo de forma válida! Ex: emailteste@hotmail.com");
              }
              else
              {
                $('#msg_email').html("");
              }

              if( message3 == '' )  
              {  
                $('#msg_password').html("Deve preencher este campo de forma válida! Ex: palavrapasse");
              }
              else
              {
                $('#msg_password').html("");
              }

              if( message4 == '' )  
              {  
                $('#msg_number').html("Deve preencher este campo de forma válida! Ex: 10225");
              }
              else
              {
                $('#msg_number').html("");
              }
                   
            }  
            else  
            {  
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
                    alert(data);                    
                    location.reload();
                   
                  }
              });
              $('#msg_descricao').html("");
            }
          });
        });
      });
    </script>


  
  </body>
</html>