<?php
  $error = "";
  require_once('dbconnect_teste.php');
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $myusername = $_POST['usernameReg'];
    $mypassword = $_POST['passwordReg'];
    $myemail = $_POST['emailReg']; 
    $enter = $_POST['enterReg'];

    if (isset($enter)) {

      // Inserir utilizador na base de dados

      $query = "INSERT INTO `teste_user` (`username`, `password`, `email`) VALUES (?, ?, ?)";

      $stmt = $mysqli->prepare($query);

      $stmt->bind_param("sss", $myusername, $mypassword, $myemail);

      $stmt->execute();
      
      // Pesquisar utilizador na base de dados
           
      $sql = "SELECT * FROM teste_user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if ($count<=0){
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
        die();
      }else{
        setcookie("login",$myusername);
        $_SESSION['username'] = $myusername;
        header("Location:index.php");
      }
    }
  }
?>