<?php 
  require_once('dbconnect_teste.php');
  require_once('session.php');
  require_once('sessionMessages.php'); 
  require_once('sessionReservas.php');
  require_once('session_reservar.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>

  <style>

#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>


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
    <link rel="stylesheet" href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
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
                  <li><a href="index.php"><i class="fa fa-search"></i> Pesquisar </a></li>
                  <li><a><i class="fa fa-edit"></i> Registar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_item.php">Item</a></li>
                      <li><a href="form_categoria.php">Categoria</a></li>
                      <li><a href="form_data.php">Data</a></li>
                      <li><a href="form_kit.php">Kit</a></li>
                      <li><a href="form_estado.php">Estado</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-pencil"></i> Editar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_search_edit_kit.php">Kit</a></li>
                      <li><a href="form_search_edit_item.php">Item</a></li>
                      <li><a href="form_search_edit_categoria.php">Categoria</a></li>
                      <li><a href="form_search_edit_estado.php">Estado</a></li>
                      <li><a href="form_utilizador.php">Meu perfil</a></li>
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
                    <h2>Ver kit <small>Reserva aqui o seu kit</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    
                    <form id="demo-form2" action="" method=""  class="form-horizontal form-label-left" >

                      <?php
                            $id = $_GET['var'];
                            $query2 = "SELECT * FROM `kit` WHERE `kit`.`id`='$id' "; // Run your query
                            $result2=$mysqli->query($query2);
                            $row2 = $result2->fetch_assoc();
                      ?>

                      <!--<input type="hidden" name="idkit" id="idkit" value="<?//php echo $row2['id'] ?>">-->
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descrição </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="descricao" name="descricao" class="form-control col-md-7 col-xs-12" value="<?php echo $row2['descricao'] ?>" readonly>
                          
                          <span id="msg_descricao" name="msg" style="color:red"></span>  
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Categoria </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                      
                          <?php
                                    
                            // Assume $db is a PDO object
                            $query = "SELECT * FROM `categoria_kit` where id=$row2[id_categoria]"; // Run your query
                            $result=$mysqli->query($query);
                            $row = $result->fetch_assoc();
                           
                          ?>
                             <input type="text" id="categoria" name="categoria" class="form-control col-md-7 col-xs-12" value="<?php echo $row['descricao'] ?>" readonly>
                          <span id="msg_cat" name="msg" style="color:red"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="limite">Limite máximo de dias </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="limite" name="limite" class="form-control col-md-7 col-xs-12" min="1" value="<?php echo $row2['limite_data'] ?>"readonly>
                          <span id="msg_limite" name="msg" style="color:red"></span>
                        </div>
                      </div>



                     

                      <div class="ln_solid"></div>


                      </form>
                    
                      <form id="formtabela"  class="form-horizontal form-label-left" action="" method="">
                        <div class="form-group">
                          <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action dt-responsive nowrap" cellspacing="0" width="100%">
                          
                          
                            <thead>
                              <tr>
                                <th>Descrição</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Kit</th>
                                <th>Estado</th>
                                <th>Categoria</th>
                                <th>Observações</th>
                                <th>Foto</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Descrição</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Kit</th>
                                <th>Estado</th>
                                <th>Categoria</th>
                                <th>Observações</th>
                                <th>Foto</th>
                              </tr> 
                            </tfoot>
                            <tbody>
                              <?php
                                
                                // Assume $db is a PDO object
                                
                                $query = "SELECT itens.id, 
                                          itens.marca,
                                          itens.descricao,
                                          itens.observacao,
                                          itens.modelo,
                                          itens.id_kit,
                                          itens.foto,
                                          categoria_item.descricao AS descCat, 
                                          estado.descricao AS descEst,
                                          kit.descricao AS descKit
                                          FROM itens 
                                          INNER JOIN categoria_item ON itens.id_categoria = categoria_item.id
                                          INNER JOIN kit ON itens.id_kit = kit.id
                                          INNER JOIN estado ON itens.id_estado = estado.id 
                                          
                                          where (itens.id_kit='$id' AND itens.visivel=1)
                                          ORDER BY itens.id_kit DESC";
                                $result=$mysqli->query($query);
                                
                                // Loop through the query results, outputing the options one by one
                                while ($row = $result->fetch_assoc()) {
                                  
                                 
                                   //echo '<tr><td><button type="button" id="button[]"  '; 
                                          if($row['id_kit'] == $row2['id'] )
                                          {
                                            //echo('class="btn btn-danger botaodel" data-id="'.$row['id'].'">Remover</button></td>');
                                            
                                          }
                                          else if ($row['id_kit'] != $row2['id'] ) 
                                          {
                                            //echo('class="btn btn-success botaoadd" value="'.$row2['id'].'" data-id="'.$row['id'].'">Adicionar</button> </td>');
                                          }; 
                                          echo '  
                                          <td> '.$row['descricao'].'</td>
                                          <td> '.$row['marca'].'</td>
                                          <td> '.$row['modelo'].'</td>
                                          <td> '.$row['descKit'].'</td>
                                          <td> '.$row['descEst'].'</td> 
                                          <td>'.$row['descCat'].'</td>
                                          <td><textarea rows="4" cols="5" style="with:100%;min-width:400px;max-width:500px;min-height:100px;max-height:100px;" readonly>'.$row['observacao'].'</textarea></td>
                                          <td><img class="myImg" onclick="myFunc(this)" src="../../images/'.$row['foto'].'" alt="'.$row['descricao'].'" style="display: block;width:100%;max-width:100px;margin-left: auto;
                                          margin-right: auto"></td>
                                        </tr>';
                                }
                                echo '</select>';// Close your drop down box
                              ?>
                              
                            </tbody>
                          </table>
                        </form>
                        <form id="formData"  class="form-horizontal form-label-left" action="http://myslimsite/api/teste/reserva2/<?php echo $id ?>" method="POST">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Escolha a Data para levantar </label> 
                            <div class="row calendar-exibit">
                              <div class="container">
                                <div class="row">
                                  <div class='col-sm-6'>
                                    <div class="form-group">
                                      <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" id="calendario1" name="calendario1"/>
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span></span>
                                      </div>
                                    </div>
                                  </div> 
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Escolha a Data para entrega </label> 
                            <div class="row calendar-exibit">
                              <div class="container">
                                <div class="row">
                                  <div class='col-sm-6'>
                                    <div class="form-group">
                                      <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control"  id="calendario2" name="calendario2" />
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span></span>
                                      </div>
                                    </div>
                                  </div> 
                                </div>
                              </div>
                            </div>
                          </div>


                          <label class="control-label col-md-3 col-sm-3 col-xs-12" id="label1">  </label> 

                        </div>
                          <input type="hidden" name="idres" id="idres" value="<?php echo $_SESSION['id']; ?>">
                          <input type="hidden" name="_METHOD" value="POST"/> 
                          <button type="submit" class="btn btn-success" style="font-size: 40px;display:block;margin-left: auto;margin-right: auto">Requisitar</button>        
                        </div>

                      </form>

                    <!--</form>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div id="myModal" class="modal">
          <span class="close" onClick="modal.style.display='none'">&times;</span>
          <img class="modal-content" id="img01">
          <div id="caption"></div>
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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/moment/moment.js"></script>
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

  <script  src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <script  src="../vendors/bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
  <script  src="../vendors/moment/min/moment-with-locales.js"></script>

    
    <script type="text/javascript">
            $(function () {      
                $('#datetimepicker1').datetimepicker({
                    format: 'L',
                    minDate: moment(),
                });
            });
           

        </script>


    <script type="text/javascript">
            $(function () {
             
                $('#datetimepicker2').datetimepicker({
                    format: 'L',
                    minDate: moment(),
                });
            });
        </script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker1").on("dp.change", function (e) {
            
            $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker1").on("dp.change", function (e) {
          var max = document.getElementById('limite').value;
          var m = parseInt(max);
          var teste=new Date(e.date);
          var todayDate = teste.getDate();
          var t = new Date(new Date().setDate(todayDate + m));

          $("#datetimepicker1").on("dp.change", function (e) {
            $('#datetimepicker2').data("DateTimePicker").maxDate(t);
        });
        });
    });
</script>


    <script>
    
      var modal = document.getElementById('myModal');

        // Get the image and insert it inside the modal - use its "alt" text as a caption
       // var img = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");

      function myFunc(el){
          var ImgSrc = el.src;
          var altText = el.alt;
          modal.style.display = "block";
            modalImg.src = ImgSrc;
            captionText.innerHTML = altText;
      }

        // Handle ESC key (key code 27)
        document.addEventListener('keyup', function(e) {
            if (e.keyCode == 27) {
              modal.style.display = "none";
            }
        });

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>


      <script>



        $(document).ready(function(){
          $(function() {

            // Get the form.
            var form = $('#formData');

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
                  type: 'POST',
                  url: $(form).attr('action'),
                  data: formData,
                  success: function(response) { 
                    $("#tbody").html(response);

                  }
              });
            
            });
          });
        });
        </script>
  






  </body>
  
</html>