<?php 
require_once('dbconnect_teste.php');
require_once('session.php');
require_once('session_criar_editar.php');
require_once('sessionReservas.php'); 
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
                  <li <?php echo $style_user_ver;?> ><a  href="form_search_user.php"><i class="fa fa-search"></i>Pesquisar utilizador</a></li>
                  <li <?php echo $style_menu_criar;?> ><a ><i class="fa fa-edit" ></i> Registar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li <?php echo $style_criar_editar;?> ><a href="form_item.php">Item</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_categoria_item.php">Categoria item  </a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_categoria_kit.php">Categoria kit</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_kit.php">Kit</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_estado.php">Estado</a></li>
                      <li <?php echo $style_user_editar;?> ><a href="form_grupo.php">Grupo</a></li>
                    </ul>
                  </li>
                  <li <?php echo $style_menu_editar;?> ><a ><i class="fa fa-pencil" ></i> Editar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_kit.php">Kit</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_item.php">Item</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_categoria_item.php">Categoria item</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_categoria_kit.php">Categoria kit</a></li>
                      <li <?php echo $style_criar_editar;?> ><a href="form_search_edit_estado.php">Estado</a></li>
                      <li <?php echo $style_user_editar;?> ><a href="form_search_edit_user.php">Utilizador</a></li>
                      <li <?php echo $style_user_editar;?> ><a href="form_search_edit_group.php">Grupo</a></li>
                    </ul>
                  </li>
                  <li <?php echo $style_reservar;?> ><a href="form_search_reserva.php"><i class="fa fa-archive"></i> Reservar kit </a></li>
                  <li <?php echo $style_reservas;?> ><a  ><i class="fa fa-archive" ></i><?php echo $_SESSION['reservasAviso']; ?> Reservas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li <?php echo $style_reservas;?> ><a href="form_search_pendente.php">Pedidos pendentes <?php echo $_SESSION['pendenteAviso']; ?></a></li>
                      <li <?php echo $style_reservas;?> ><a href="form_search_atraso.php">Reservas em atraso <?php echo $_SESSION['atrasoAviso']; ?></a></li>
                      <li <?php echo $style_reservas;?> ><a href="form_search_decorrer.php">Reservas aceites/em progresso </a></li>
                      <li <?php echo $style_reservas;?> ><a href="form_search_edit_all_reservas.php">Todas as reservas </a></li>
                    </ul>
                  </li>
                  <li <?php echo $style_criar_msg;?> ><a href="form_search_send_messages.php"><i class="fa fa-send"></i> Enviar mensagem </a></li>
                  <li <?php echo $style_ver_historico;?> ><a href="form_search_history_user.php"><i class="fa fa-book"></i> Histórico utilizador </a></li>
                  <li <?php echo $style_reservar;?> ><a href="form_myhistory_reservas.php"><i class="fa fa-book"></i> Meu histórico </a></li>
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
                    <h2>Editar kit <small>Insira as informações necessárias</small></h2>
                    <div class="title_right">
                      <div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right">
                        <a href="form_search_edit_kit.php" id="button" type="button"  class="btn btn-primary botao" >Voltar a todos os kits</a>
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    
                    <form id="demo-form2" action="http://myslimsite/api/formEditKit/update" method="post"  class="form-horizontal form-label-left" >

                      <?php
                            $id = $_GET['var'];
                            $query2 = "SELECT * FROM `kit` WHERE `kit`.`id`='$id' "; // Run your query
                            $result2=$mysqli->query($query2);
                            $row2 = $result2->fetch_assoc();
                      ?>

                      <input type="hidden" name="idkit" id="idkit" value="<?php echo $row2['id'] ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descrição </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="descricao" name="descricao" class="form-control col-md-7 col-xs-12" value="<?php echo $row2['descricao'] ?>">
                          <span id="msg_descricao" name="msg" style="color:red"></span>  
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Categoria </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                      
                          <?php
                                    
                            // Assume $db is a PDO object
                            $query = "SELECT * FROM `categoria_kit` "; // Run your query
                            $result=$mysqli->query($query);
                           
                            echo '<select class="form-control" id="desc" name="desc" >'; // Open your drop down box
                            // Loop through the query results, outputing the options one by one
                            while ($row = $result->fetch_assoc()) 
                            {
                               echo '<option value="'.$row['id'].'" '; 
                               if($row['id'] == $row2['id_categoria'] )
                               {
                                  echo("selected");
                               }; 
                               echo '   >'.$row['descricao'].'</option>';
                            }
                            echo '</select>';// Close your drop down box
                          ?>
                          <span id="msg_cat" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="limite">Limite máximo de dias </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="limite" name="limite" class="form-control col-md-7 col-xs-12" min="1" value="<?php echo $row2['limite_data'] ?>">
                          <span id="msg_limite" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obs">Observações (300 chars max) : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="obs"  class="form-control" name="obs"><?php echo $row2['observacao'] ?></textarea>
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
                    
                      <form id="formtabela"  class="form-horizontal form-label-left" action="http://myslimsite/api/formKitEdit/RemoveItem" method="PUT">
                        <div class="form-group">
                          <table id="table" class="table table-striped table-bordered bulk_action dt-responsive text-center nowrap" cellspacing="0" width="100%">
                          
                          
                            <thead>
                              <tr>
                                <th></th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Modelo</th>
                                <th class="text-center">Kit</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Categoria</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th></th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Modelo</th>
                                <th class="text-center">Kit</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Categoria</th>
                              </tr> 
                            </tfoot>
                            <tbody>
                              <?php
                                
                                // Assume $db is a PDO object
                                
                                $query = "SELECT itens.id, 
                                          itens.marca,
                                          itens.modelo,
                                          itens.id_kit,
                                          categoria_item.descricao AS descCat, 
                                          estado.descricao AS descEst,
                                          kit.descricao AS descKit
                                          FROM itens 
                                          INNER JOIN categoria_item ON itens.id_categoria = categoria_item.id
                                          INNER JOIN kit ON itens.id_kit = kit.id
                                          INNER JOIN estado ON itens.id_estado = estado.id 
                                          WHERE (itens.id_kit=1 AND itens.visivel=1)
                                          OR (itens.id_kit='$id' AND itens.visivel=1)
                                          ORDER BY itens.id_kit DESC";
                                $result=$mysqli->query($query);
                                
                                // Loop through the query results, outputing the options one by one
                                while ($row = $result->fetch_assoc()) {
                                  
                                 
                                   echo '<tr> 
                                          <td><button type="button" id="button[]"  '; 
                                          if($row['id_kit'] == $row2['id'] )
                                          {
                                            echo('class="btn btn-danger botaodel" data-id="'.$row['id'].'">Remover</button></td>');
                                            
                                          }
                                          else if ($row['id_kit'] != $row2['id'] ) 
                                          {
                                            echo('class="btn btn-success botaoadd" value="'.$row2['id'].'" data-id="'.$row['id'].'">Adicionar</button> </td>');
                                          }; 
                                          echo '  
                                          <td> '.$row['marca'].'</td>
                                          <td> '.$row['modelo'].'</td>
                                          <td> '.$row['descKit'].'</td>
                                          <td> '.$row['descEst'].'</td> 
                                          <td>'.$row['descCat'].'</td>
                                        </tr>';
                                }
                                echo '</select>';// Close your drop down box
                              ?>
                              
                            </tbody>
                          </table>
                          <input type="hidden" name="_METHOD" value="PUT"/>
                        </div>

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

     $('#table').DataTable( {
        "order": [[ 0, "desc" ]],
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





      
     $('#table').on('click','.botaoadd',function () {
      var v = $(this).data('id');
      var i = $(this).attr('value');        
      var form2 = $('#formtabela');
        $.ajax({
          type: 'put',
                  url: "http://myslimsite/api/formKitEdit/AddItem/num="+v+"&num2="+i,
                  contentType: false,
                  cache: false,
                  processData:false,
                  success: function(data) { 
                    location.reload();
                  }
        });
        //alert("delete!! "+i);          
     });


      $('#table').on('click','.botaodel',function () {
        var v = $(this).data('id'); 
        //var dataObject = { 'num': v};
        var form2 = $('#formtabela');
        //var formData = $(this).serialize();
        $.ajax({
          type: 'put',
                  url: "http://myslimsite/api/formKitEdit/RemoveItem/num="+v,
                  contentType: false,
                  cache: false,
                  processData:false,
                  success: function(data) { 
                    location.reload();
                  }
        });
        //alert("delete!! "+v);    
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

            var message = $('#descricao').val();
            var message2 = $('#desc').val();   
            var message3 = $('#limite').val();

            if(message == '' || message2 == '1' || message3 == ''  )  
            {  
              
              if( message == '' )  
              {  
                $('#msg_descricao').html("Deve preencher este campo de forma válida! Ex: Camara fotografica Canon 500D");
              }
              else
              {
                $('#msg_descricao').html("");
              }
              if( message2 == '1' )  
              {  
                $('#msg_cat').html("Deve escolher uma categoria válida! Ex: Camara fotografica");
              }
              else
              {
                $('#msg_cat').html("");
              }
              if( message3 == '' )  
              {  
                $('#msg_limite').html("Deve preencher este campo de forma válida! Ex: 6");
              }
              else
              {
                $('#msg_limite').html("");
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
              $('#msg_check').html("");
              $('#msg_limite').html("");
              $('#msg').html("Kit editado com sucesso!");
              //$('#demo-form2').trigger("reset");
              //$('#descricao').val('');
            }
          });
        });
      });
    </script>


  
  </body>
</html>