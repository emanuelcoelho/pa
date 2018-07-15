<?php 
// ligaçao a bd
  require_once('dbconnect_teste.php');
  // define as permissoes e verifica se tem sessao iniciada
  require_once('session.php');
  // verifica se tem a permissao criar_editar
  require_once('session_criar_editar.php');
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
                    <h2>Criar item <small>Insira as informações necessárias (campos com <span style="color:red">*</span> são obrigatórios!)</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2"  action="http://myslimsite/api/formItem/insertItem" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descrição <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="descricao" name="descricao" class="form-control col-md-7 col-xs-12">
                          <span id="msg_descricao" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marca">Marca <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="marca" name="marca" class="form-control col-md-7 col-xs-12">
                          <span id="msg_marca" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="modelo">Modelo <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="modelo" name="modelo" class="form-control col-md-7 col-xs-12">
                          <span id="msg_modelo" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="serialnumber">Serial Number <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="serialnumber" name="serialnumber" class="form-control col-md-7 col-xs-12" min="1">
                          <span id="msg_serialnumber" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ipvcnumber">Serial IPVC <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="ipvcnumber" name="ipvcnumber" class="form-control col-md-7 col-xs-12" min="1">
                          <span id="msg_ipvcnumber" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Visivel</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" class="flat" id="visivel" name="visivel" value="1" checked> Sim<br>
                          <input type="radio" class="flat" id="visivel" name="visivel" value="0"> Não<br>
                          <span id="msg_visivel" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Categoria </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                         
                          <?php

                            // Assume $db is a PDO object
                            $query = "SELECT * FROM `categoria_item` "; // Run your query
                            $result=$mysqli->query($query);
                            $final=[];
                            echo '<select class="form-control" id="desc" name="desc" >'; // Open your drop down box

                            // Loop through the query results, outputing the options one by one
                            while ($row = $result->fetch_assoc()) {
                               echo '<option value="'.$row['id'].'">'.$row['descricao'].'</option>';
                            }

                            echo '</select>';// Close your drop down box
                          ?>
                          <span id="msg_desc" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Estado </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                         
                          <?php

                            // Assume $db is a PDO object
                            $query = "SELECT * FROM `estado` "; // Run your query
                            $result=$mysqli->query($query);
                            $final=[];
                            echo '<select class="form-control" id="estado" name="estado" >'; // Open your drop down box

                            // Loop through the query results, outputing the options one by one
                            while ($row = $result->fetch_assoc()) {
                               echo '<option value="'.$row['id'].'">'.$row['descricao'].'</option>';
                            }

                            echo '</select>';// Close your drop down box
                          ?>
                          <span id="msg_estado" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Atributos </label>
                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                         <table class="table table-bordered" id="dynamic_field">
                          <tr>
                            <td><input type="text" id="attributes[]" name="attributes[]" placeholder="" class="form-control name_list" /></td>
                            <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus-square"></i></button></td>
                          </tr>
                         </table>
                         <span id="msg_attributes" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obs">Observações (300 chars max) : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="obs" class="form-control" name="obs"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Fotografia <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                          <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12" />
                          <span id="msg_image" name="msg" style="color:red"></span>
                        </div>
                        <div class="control-label">
                            <a  data-toggle="tooltip" title="A imagem tem de ter uma extensão válida (JPEG/JPG/PNG) e também tem como limite 10 mb! " class="fa fa-info fa-lg pull-left"></a>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Quantidade de itens a inserir <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                         
                          <input type="number" id="qtd" name="qtd" class="form-control col-md-7 col-xs-12" min="1" max ="20">
                          <span id="msg_qtd" name="msg" style="color:red"></span>
                        </div>
                        <div class="control-label">
                            <a  data-toggle="tooltip" title="Tem de indicar a quantidade de itens deseja criar com esta informação, tem como limite 20 itens!" class="fa fa-info fa-lg pull-left"></a>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						              <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submeter</button>
                          <span id="msg" name="msg" class="control-label col-md-5 col-sm-3 col-xs-12"></span>
                        </div>
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

      $('[data-toggle="tooltip"]').tooltip();



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




        $("#image").change(function() {
          var maxSize=10000000; 
          var file = this.files[0];
          var imagefile = file.type;
          var imagename = file.name;
          var match= ["image/jpeg","image/png","image/jpg"];
          if(this.files[0].size>maxSize){
            alert('Por favor escolha uma imagem com menos de 10mb');
            $("#image").val('');
            return false;
          }
          if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Por favor escolha uma imagem com uma extensão válida (JPEG/JPG/PNG).');
            $("#image").val('');
            return false;
          }
          $.ajax({
              url:'http://localhost/images/'+imagename,
              type:'HEAD',
              error: function()
              {
                  //file not exists
              },
              success: function()
              {
                  alert('Já existe uma imagem com esse nome, por favor mude o nome da sua imagem.');
                  $("#image").val('');
                  return false;
              }
          });
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

            var message1 = $('#marca').val();  
            var message2 = $('#descricao').val();      
            var message4 = $('#visivel').val();  
            var message5 = $('#desc').val();  
            var message6 = $('#image').val();
            var message7 = $('#serialnumber').val();
            var message8 = $('#ipvcnumber').val();
            var message9 = $('#modelo').val();
            var message10 = $('#qtd').val();  

            <?php 

              $sql3 = "SELECT * FROM categoria_item WHERE descricao = 'Sem categoria'";
              $result3 = mysqli_query($mysqli,$sql3);
              $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
              $semcat=$row3['id']; 
            ?> 


            if(message1 == '' || message2 == '' ||  message4 == '' || message5 == '<?php echo $semcat; ?>' || message6 == '' || message7 == '' || message8 == '' || message9 == '' || message10 == '' )  
            {  

              if( message1 == '' )  
              {  
                $('#msg_marca').html("Deve preencher este campo de forma válida! Ex: Canon");
              }
              else
              {
                $('#msg_marca').html("");
              }

              if( message2 == '' )  
              {  
                $('#msg_descricao').html("Deve preencher este campo de forma válida! Ex: Camara fotografica Canon 500D");
              }
              else
              {
                $('#msg_descricao').html("");
              }

              if( message4 == '' )  
              {  
                $('#msg_visivel').html("Deve preencher este campo de forma válida! Ex: wut");
              }
              else
              {
                $('#msg_visivel').html("");
              }

              if( message5 == '1' )  
              {  
                $('#msg_desc').html("Deve escolher uma categoria válida! Ex: Camara fotografica");
              }
              else
              {
                $('#msg_desc').html("");
              }

              if( message6 == '' )  
              {  
                $('#msg_image').html("Deve preencher este campo de forma válida!");
              }
              else
              {
                $('#msg_image').html("");
              }

              if( message7 == '' )  
              {  
                $('#msg_serialnumber').html("Deve preencher este campo de forma válida! Ex: 1002392");
              }
              else
              {
                $('#msg_serialnumber').html("");
              }

              if( message8 == '' )  
              {  
                $('#msg_ipvcnumber').html("Deve preencher este campo de forma válida! Ex: 293");
              }
              else
              {
                $('#msg_ipvcnumber').html("");
              }

              if( message9 == '' )  
              {  
                $('#msg_modelo').html("Deve preencher este campo de forma válida! Ex: 500D");
              }
              else
              {
                $('#msg_modelo').html("");
              }

              if( message10 == '' )  
              {  
                $('#msg_qtd').html("Deve preencher este campo de forma válida! Ex: 5");
              }
              else
              {
                $('#msg_qtd').html("");
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
                  data: new FormData(this),
                  contentType: false,
                  cache: false,
                  processData:false
              });
               $('#msg_nome').html("");
              $('#msg_descricao').html("");
              $('#msg_visivel').html("");
              $('#msg_desc').html("");   
              $('#msg_attributes').html("");
              $('#msg_image').html("");
              $('#msg_ipvcnumber').html("");
              $('#msg_serialnumber').html("");
              $('#msg_qtd').html("");
              $('#msg').html("Item criado com sucesso!");
              $('#demo-form2').trigger("reset");
              //$('#descricao').val('');
            }
          });


        });
      });
    </script>


    

	
  </body>
</html>



<!-- Adicionar mais campos para atributos -->
<script>
$(document).ready(function(){
  var i=1;
  $('#add').click(function(){
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" id="attributes[]" name="attributes[]" placeholder="" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
  });
  
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });
});
</script>