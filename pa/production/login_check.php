<?php

  // verifica se o utilizador existe
  $error = "";
  require_once('dbconnect_teste.php');
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    // recolhe informações do form    
    $myemail = $_POST['email'];
    $mypassword = $_POST['password']; 
    $enter = $_POST['enter'];

    if (isset($enter)) {

      
      // pesquisa pelo utilizador na bd   
      $sql = "SELECT * FROM user WHERE email = '$myemail' and password = '$mypassword'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $myusername = $row['username'];
      $group = $row["id_grupo"];
      $id = $row["id"];
      $count = mysqli_num_rows($result);
      // verifica se encontrou utilizador
      if ($count<=0){
        // se não encontra
        // avisa utilizador e expulsa da página actual
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
        die();
      }else{

        // se encontra
        // pesquisa o grupo onde o utilizador faz parte
        $sql2 = "SELECT * FROM grupo WHERE id = '$group' ";
        $result2 = mysqli_query($mysqli,$sql2);
        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

        // guarda as permissões do grupo em variaveis SESSION
        $_SESSION['ver'] = $row2['ver'];
        $_SESSION['reservar'] = $row2['reservar'];
        $_SESSION['ver_admin'] = $row2['ver_admin'];
        $_SESSION['reservas'] = $row2['reservas'];
        $_SESSION['criar_editar'] = $row2['criar_editar'];
        $_SESSION['user_ver'] = $row2['user_ver'];
        $_SESSION['user_editar'] = $row2['user_editar'];
        $_SESSION['criar_msg'] = $row2['criar_msg'];
        $_SESSION['ver_historico'] = $row2['ver_historico'];

        // guarda as informações do utilizador em variaveis SESSION
        $_SESSION['username'] = $myusername;
        $_SESSION['password'] = $mypassword;
        $_SESSION['email'] = $myemail;
        $_SESSION['id'] = $row['id'];
        header("Location:index.php"); 
      }
    }
  }
?>