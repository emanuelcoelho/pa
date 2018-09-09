<?php 
  // ligaçao a bd
  require_once('dbconnect_teste.php');
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
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <!-- login -->
        <div class="animate form login_form">
          <section class="login_content">
            <form action = "login_check.php" method = "post" enctype="multipart/form-data">
              <h1>Login</h1>
              <!-- campo email -->
              <div>
                <input type="text" class="form-control" placeholder="Email" required="" id="email" name="email"  />
              </div>
              <!-- campo password -->
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" id="password" name="password" />
              </div>
              <!-- botao submit -->
              <div>
                <button class="btn btn-default submit" type="submit" value="enter" name="enter" id="enter">Entrar</button>
                <a class="reset_pass" >Recupere a sua password</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ainda não tem conta?
                  <a href="#signup" class="to_register"> Registe-se no site! </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="logo_cores_desc.png" style="width:275px;height:100px;">
                  <br>
                  <br>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <!-- registo -->
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <!-- form -->
            <form action = "register_user.php" method = "post" enctype="multipart/form-data">
              <h1>Registo de conta</h1>
              <!-- campo username -->
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" id="usernameReg" name="usernameReg" />
              </div>
              <!-- campo email -->
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" id="emailReg" name="emailReg"/>
                <span id="msg_mail" name="msg" style="color:red"></span>
              </div>
              <!-- campo password -->
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" id="passwordReg" name="passwordReg"/>
              </div>
              <!-- botao submit -->
              <div>
                <button class="btn btn-default submit" type="submit" value="enterReg" name="enterReg" id="enterReg">Registar</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Já tem conta no site?
                  <a href="#signin" class="to_register"> Faça login</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="logo_cores_desc.png" style="width:275px;height:100px;">
                  <br>
                  <br>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>

    <script>
      $(document).ready(function(){

        // mensagem de password esquecida
        $(".reset_pass").click(function(){ // Click to only happen on announce links

          <?php
            // recolhe id do username sistema
            $sql3 = "SELECT * FROM user WHERE username = 'Sistema'";
            // recolhe informacoes do user sistema atraves de id
            $result3 = mysqli_query($mysqli,$sql3);
            $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
            // recolhe mail do user sistema
            $funcmail=$row3['email'];
          ?>

          // mensagem com email do user sistema
          alert("Por favor entre em contacto com o funcionário responsável pelas reservas através do email <?php echo $funcmail; ?>! "); 
        });
      });
    </script>
  </body>
</html>





