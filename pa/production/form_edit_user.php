<?php 
require_once('dbconnect_teste.php');
require_once('session.php');
require_once('sessionUpdate.php');
require_once('session_user_editar.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title> Projecto PA </title>

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
              <a href="index.php" class="site_title"><i class="fa fa-book"></i> <span>Projecto PA</span></a>
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
                  <li><a><i class="fa fa-search"></i> Pesquisar <span class="fa fa-chevron-down"></span> </a>
                    <ul class="nav child_menu">
                      <li <?php echo $style_user_ver;?> ><a  href="form_search_user.php">Utilizador</a></li>
                    </ul>
                  </li>
                  <li <?php echo $style_ver;?> ><a ><i class="fa fa-edit" ></i> Registar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li <?php echo $style_criar_editar;?> ><a href="form_item.php">Item</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_categoria_item.php">Categoria item  </a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_categoria_kit.php">Categoria kit</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_kit.php">Kit</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_estado.php">Estado</a></li>
                      <li <?php echo $style_user_editar;?> ><a href="form_grupo.php">Grupo</a></li>
                    </ul>
                  </li>
                  <li <?php echo $style_ver;?> ><a ><i class="fa fa-pencil" ></i> Editar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_kit.php">Kit</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_item.php">Item</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_categoria_item.php">Categoria item</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_categoria_kit.php">Categoria kit</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_estado.php">Estado</a></li>
                      <li <?php echo $style_user_editar;?> ><a href="form_search_edit_user.php">Utilizador</a></li>
                      <li <?php echo $style_user_editar;?> ><a href="form_search_edit_group.php">Grupo</a></li>
                      <li <?php echo $style_ver;?> ><a href="form_utilizador.php">Meu perfil</a></li>
                    </ul>
                  </li>
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
                    <li><a href="form_utilizador.php"><i class="fa fa-edit pull-right"></i> Editar informações</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">3</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
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
                    <h2>Editar utilizador <small>Insira as informações necessárias</small></h2>
                    
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Nome de utilizador </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="username" name="username" class="form-control col-md-7 col-xs-12" value="<?php echo $row['username'] ?>" >
                          <span id="msg_username" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $row['email'] ?>">
                          <span id="msg_email" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="password" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo $row['password'] ?>">
                          <span id="msg_password" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Número de aluno </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="number" class="form-control col-md-7 col-xs-12"  value="<?php echo $row['numero'] ?>">
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
                          <button type="submit" class="btn btn-success">Submit</button>                          
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

            

            if(message1 == '' || message2 == '' || message3 == '' )  
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
                    
                    location.reload();
                   
                  }
              });
              $('#msg_descricao').html("");
              $('#msg').html("Upload de dados concluído!");
              //$('#demo-form2').trigger("reset");
              //$('#descricao').val('');
            }
          });
        });
      });
    </script>


  
  </body>
</html>