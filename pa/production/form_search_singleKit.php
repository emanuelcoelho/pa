<?php 
  require_once('dbconnect_teste.php');
  require_once('session.php');
  require_once('sessionReservas.php'); 
  require_once('sessionMessages.php');
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
                    </ul>
                  </li>
                  <li <?php echo $style_ver;?> ><a  ><i class="fa fa-archive" ></i><?php echo $_SESSION['reservasAviso']; ?> Reservas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li <?php echo $style_reservas;?> ><a href="form_search_pendente.php">Pedidos pendentes <?php echo $_SESSION['pendenteAviso']; ?></a></li>
                      <li <?php echo $style_reservas;?> ><a href="form_search_atraso.php">Reservas em atraso <?php echo $_SESSION['atrasoAviso']; ?></a></li>
                      <li <?php echo $style_reservas;?> ><a href="form_search_edit_all_reservas.php">Todas as reservas </a></li>
                      <li <?php echo $style_reservas;?> ><a href="form_search_reserva.php">Reservar kit </a></li>
                    </ul>
                  </li>
                  <li <?php echo $style_criar_msg;?> ><a href="form_search_send_messages.php"><i class="fa fa-send"></i> Enviar mensagem </a></li>
                  <li <?php echo $style_ver_historico;?> ><a href="form_search_history_user.php"><i class="fa fa-book"></i> Histórico utilizador </a></li>
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
                          <table id="table" class="table table-striped table-bordered bulk_action dt-responsive nowrap" cellspacing="0" width="100%">
                          
                          
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
                        <form id="formData"  class="form-horizontal form-label-left" action="http://myslimsite/api/teste/reserva2" method="POST" enctype="multipart/form-data">
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_date">Escolha a data para levantar </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12" type="text" id="from_date" name="from_date" readonly>
                              <span id="msg_inicio" name="msg" style="color:red"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="to_date">Escolha a data para entregar </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12" type="text" id="to_date" name="to_date" readonly>
                              <span id="msg_fim" name="msg" style="color:red"></span>
                            </div>
                          </div>


                          <label class="control-label col-md-3 col-sm-3 col-xs-12" id="label1">  </label> 

                        </div>
                          <input type="hidden" name="idkit" id="idkit" value="<?php echo $id; ?>">
                          <input type="hidden" name="idres" id="idres" value="<?php echo $_SESSION['id']; ?>">
                          <button type="submit" class="btn btn-success" style="font-size: 40px;display:block;margin-left: auto;margin-right: auto">Requisitar</button>
                          <span id="msg" name="msg" class="col-md-12 col-sm-12 col-xs-12 form-group" align="center"></span>        
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
    <!-- jQuery Ui -->
    <script src="../vendors/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
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



    <?php 

      $data=date("Y-m-d");

      //echo $data; 

      $sql = "SELECT reserva.id,
                reserva.data_inicio,
                reserva.data_fim,
                reserva.id_kit,
                estado.descricao AS descEst
                FROM reserva 
                INNER JOIN estado ON reserva.id_estado = estado.id 
                WHERE (reserva.id_kit = '$id' AND estado.descricao = 'Em progresso' AND reserva.data_fim>='$data')
                OR (reserva.id_kit = '$id' AND estado.descricao = 'Aceite' AND reserva.data_fim>='$data')
                OR (reserva.id_kit = '$id' AND estado.descricao = 'Pendente' AND reserva.data_fim>='$data')";
      $result = mysqli_query($mysqli,$sql);
      $count = mysqli_num_rows($result);

      $i=0;
      $n=0;


      if($count>=1)
      {
        while ($row = $result->fetch_assoc()) {
          
         // echo "<br> Data inicial do ciclo ".$i.": ".$row['data_inicio'];
         // echo "<br> Data final do ciclo ".$i.": ".$row['data_fim']; 
          $inicio[]=date('Y-m-d', strtotime($row['data_inicio']));
          $final=date('Y-m-d', strtotime($row['data_fim']));
         // echo "<br> Data do ciclo ".$i.", posição array ".$n.": ".$inicio[$n];
          

          while($inicio[$n]<$final)
          {
            
            $inicio[] = date('Y-m-d', strtotime($inicio[$n]. ' + 1 days'));
            $n++;
            //echo "<br> Data do ciclo ".$i.", posição array ".$n.": ".$inicio[$n];
          }
          $n++;
          //echo "<br>";
          $i++;  
        }
        

      }
      else if($count==0)
      {
          $inicio[]=$date;
      }


      ?>





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

        var arrayFromPHP = <?php echo json_encode($inicio); ?>;
        var limite=parseInt($("#limite").val());

        $( function() {
          $( "#from_date" ).datepicker();
          $( "#to_date" ).datepicker();
        } );

        $("#from_date").datepicker({
            beforeShowDay: function(date){

              if (!$.datepicker.noWeekends(date)[0])
              return [false, '', '']; 

              var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
              return [ arrayFromPHP.indexOf(string) == -1 ]

            },
            minDate: 2,
            dateFormat: "yy-mm-dd", 
            onSelect: function(selectedDate) {
              var date = new Date($("#from_date").val());
              date.setDate(date.getDate() + limite);

              $("#to_date").datepicker("option", "minDate", selectedDate);

              //alert("Limite: "+limite+"! Data selecionada: "+selectedDate+"! Data limite: "+date);

              $("#to_date").datepicker("option", "maxDate", date);
              $("#to_date").val('');
            }
          });      

          $("#to_date").datepicker({
            beforeShowDay: function(date){

              if (!$.datepicker.noWeekends(date)[0])
              return [false, '', ''];     

              var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
              return [ arrayFromPHP.indexOf(string) == -1 ] 
            },
            minDate: 2,
            dateFormat: "yy-mm-dd",
            onSelect: function(chosenDate) {

              if ($("#from_date").val()!="" && $("#to_datete").val()!="") {
                  var date1 = $("#from_date").val();
                  var date2 = $("#to_date").val();

                  for (var k = 0; k < arrayFromPHP.length; k++) {
                    var date = arrayFromPHP[k];
                      if (date1 <= date && date <= date2) {
                          alert("The range contains not selectable dates.");
                          $("#to_date").val('');
                          return false;
                      }
                  }

              }

            }

          });


          $('#table').DataTable( {
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


        $(function() {

          // Get the form.
          var form = $('#formData');

          // Get the messages div.
          var formMessages = $('#msg');

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
                  success: function(response) { 
                   location.reload();
                  }
              });
              $('#msg_inicio').html("");
              $('#msg_fim').html("");
              $('#msg').html("Reserva criada com sucesso!");
            }

          });

        });

      });
      </script>
  </body>
  
</html>