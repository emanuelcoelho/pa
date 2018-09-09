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
                    <h2>Criar item <small>Insira as informações necessárias (campos com <span style="color:red">*</span> são obrigatórios!)</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <!-- form -->
                    <form id="demo-form2"  action="http://myslimsite/api/formItem/insertItem" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">

                      <!-- campo da descricao -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descrição <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="descricao" name="descricao" class="form-control col-md-7 col-xs-12">
                          <span id="msg_descricao" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <!-- campo da marca -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marca">Marca </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="marca" name="marca" class="form-control col-md-7 col-xs-12">
                          <span id="msg_marca" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <!-- campo do modelo -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="modelo">Modelo </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="modelo" name="modelo" class="form-control col-md-7 col-xs-12">
                          <span id="msg_modelo" name="msg" style="color:red"></span>
                        </div>
                      </div>
                      
                      <!-- campo do serial number -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="serialnumber">Serial Number </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="serialnumber" name="serialnumber" class="form-control col-md-7 col-xs-12" min="1">
                          <span id="msg_serialnumber" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <!-- campo do serial ipvc -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ipvcnumber">Serial IPVC </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="ipvcnumber" name="ipvcnumber" class="form-control col-md-7 col-xs-12" min="1">
                          <span id="msg_ipvcnumber" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <!-- campo do visivel -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Visivel</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" class="flat" id="visivel" name="visivel" value="1" checked> Sim<br>
                          <input type="radio" class="flat" id="visivel" name="visivel" value="0"> Não<br>
                          <span id="msg_visivel" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <!-- campo da categoria -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Categoria </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                         
                          <?php

                            // recolhe todas as categorias
                            $query = "SELECT * FROM `categoria_item` "; 
                            $result=$mysqli->query($query);
                            
                            // abre a drop down box
                            echo '<select class="form-control" id="desc" name="desc" >'; 

                            // percorre todos os resultados da query e apresenta os mesmos
                            while ($row = $result->fetch_assoc()) {
                               echo '<option value="'.$row['id'].'">'.$row['descricao'].'</option>';
                            }
                            // fecha a drop down box
                            echo '</select>';
                          ?>
                          <span id="msg_desc" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <!-- campo do estado -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Estado </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                         
                          <?php

                            // recolhe todos os estados
                            $query = "SELECT * FROM `estado` ";
                            $result=$mysqli->query($query);
                            
                            // abre a drop down box
                            echo '<select class="form-control" id="estado" name="estado" >'; 

                            // percorre todos os resultados da query e apresenta os mesmos
                            while ($row = $result->fetch_assoc()) {
                               echo '<option value="'.$row['id'].'" >'.$row['descricao'].'</option>';
                            }
                            // fecha a drop down box
                            echo '</select>';
                          ?>
                          <span id="msg_estado" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <!-- campo dos atributos -->
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

                      <!-- campo das observacoes -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obs">Observações (300 chars max) : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="obs" class="form-control" name="obs"></textarea>
                        </div>
                        <div class="control-label">
                          <!-- tooltip -->
                          <a  data-toggle="tooltip" title="Deve introduzir as observações de uma maneira organizada. Ex: -Obs1; -Obs2; " class="fa fa-info fa-lg pull-left"></a>
                        </div>
                      </div>

                      <!-- campo da fotografia -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Fotografia </label>
                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                          <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12" />
                          <span id="msg_image" name="msg" style="color:red"></span>
                        </div>
                        <div class="control-label">
                          <!-- tooltip -->
                          <a  data-toggle="tooltip" title="A imagem tem de ter uma extensão válida (JPEG/JPG/PNG) e também tem como limite 10 mb! " class="fa fa-info fa-lg pull-left"></a>
                        </div>
                      </div>

                      <!-- campo da quantidade -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Quantidade de itens a inserir <span style="color:red">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                         
                          <input type="number" id="qtd" name="qtd" class="form-control col-md-7 col-xs-12" min="1" max ="20">
                          <span id="msg_qtd" name="msg" style="color:red"></span>
                        </div>
                        <div class="control-label">
                          <!-- tooltip -->
                          <a  data-toggle="tooltip" title="Tem de indicar a quantidade de itens deseja criar com esta informação, tem como limite 20 itens!" class="fa fa-info fa-lg pull-left"></a>
                        </div>
                      </div>

                      <div class="ln_solid"></div>

                      <!-- botoes reset e submit -->
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

        // ao alterar a imagem
        $("#image").change(function() {
          // tamanho max
          var maxSize=10000000; 
          // imagem seleccionada
          var file = this.files[0];
          // tipo de imagem
          var imagefile = file.type;
          // nome da imagem
          var imagename = file.name;
          // tipo de imagem aceitavel
          var match= ["image/jpeg","image/png","image/jpg"];
          // se tamanho da imagem for maior do que o permitido
          if(this.files[0].size>maxSize){
            // nao faz upload e remove o valor da imagem que foi seleccionada
            alert('Por favor escolha uma imagem com menos de 10mb');
            $("#image").val('');
            return false;
          }
          // se o tipo de imagem nao for um dos tipos aceitaveis
          if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            // nao faz upload e remove o valor da imagem que foi seleccionada
            alert('Por favor escolha uma imagem com uma extensão válida (JPEG/JPG/PNG).');
            $("#image").val('');
            return false;
          }
          // upload da imagem
          $.ajax({
              url:'http://localhost/images/'+imagename,
              type:'HEAD',
              error: function()
              {
                //file not exists
              },
              success: function()
              {
                // nao faz upload por ja existir imagem com nome
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

            // recolhe o conteudo dos campos obrigatorios
            var message2 = $('#descricao').val();      
            var message4 = $('#visivel').val();  
            var message5 = $('#desc').val();  
            var message10 = $('#qtd').val();  

            <?php 
              // recolhe id da categoria "Sem categoria"
              $sql3 = "SELECT * FROM categoria_item WHERE descricao = 'Sem categoria'";
              $result3 = mysqli_query($mysqli,$sql3);
              $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
              $semcat=$row3['id']; 
            ?> 

            // verifica se algum dos campos obrigatorios esta vazio
            if(message2 == '' ||  message4 == '' || message5 == '<?php echo $semcat; ?>' || message10 == '' )  
            {  
              // se algum dos campos estiver vazio, avisa o utilizador e nao faz submit do form
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

              if( message5 == '<?php echo $semcat; ?>' )  
              {  
                $('#msg_desc').html("Deve escolher uma categoria válida! Ex: Camara fotografica");
              }
              else
              {
                $('#msg_desc').html("");
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
              // se todos os campos obrigatorios estiverem preenchidos
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
              // Elimina a mensagem de aviso, avisa que foi criado com sucesso e faz reset ao form
              $('#msg_descricao').html("");
              $('#msg_visivel').html("");
              $('#msg_desc').html("");   
              $('#msg_qtd').html("");
              $('#msg').html("Item criado com sucesso!");
              $('#demo-form2').trigger("reset");
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
    // adicionar campos para atributos
    $('#add').click(function(){
      i++;
      // adiciona entrada da tabela de atributos presente na pagina
      $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" id="attributes[]" name="attributes[]" placeholder="" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    // remover campos de atributos
    $(document).on('click', '.btn_remove', function(){
      // recolhe id do atributo
      var button_id = $(this).attr("id");
      // remove entrada da tabela de atributos presente na pagina 
      $('#row'+button_id+'').remove();
    });
  });
</script>