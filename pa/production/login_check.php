<?php
  $error = "";
  require_once('dbconnect_teste.php');
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $myusername = $_POST['username'];
    $mypassword = $_POST['password']; 
    $enter = $_POST['enter'];

    if (isset($enter)) {

      
           
      $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $myemail = $row["email"];
      $count = mysqli_num_rows($result);
      if ($count<=0){
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
        die();
      }else{
        setcookie("login",$myusername);
        $_SESSION['username'] = $myusername;
        $_SESSION['password'] = $mypassword;
        $_SESSION['email'] = $myemail;
        header("Location:index.php");
      }
    }
  }
?>