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

      //Pesquisa pelo email na bd

      $sql = "SELECT * FROM user WHERE email = '$myemail' ";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      //Se não encontrar email igual
      if ($count<=0){

        // Inserir utilizador na base de dados
        $sql = "SELECT * FROM grupo WHERE descricao = 'Visitante' ";
        $result = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $grupo=$row['id'];

        $query = "INSERT INTO `user` (`username`, `password`, `email`, `id_grupo`) VALUES (?, ?, ?, ?)";

        $stmt = $mysqli->prepare($query);

        $stmt->bind_param("sssi", $myusername, $mypassword, $myemail, $grupo);

        $stmt->execute();
        
        // Pesquisar utilizador na base de dados
             
        $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if ($count<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
          die();
        }else{

          $sql2 = "SELECT * FROM grupo WHERE id = '$grupo' ";
          $result2 = mysqli_query($mysqli,$sql2);
          $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

          $_SESSION['ver'] = $row2['ver'];
          $_SESSION['reservar'] = $row2['reservar'];
          $_SESSION['ver_admin'] = $row2['ver_admin'];
          $_SESSION['reservas'] = $row2['reservas'];
          $_SESSION['criar_editar'] = $row2['criar_editar'];
          $_SESSION['user_ver'] = $row2['user_ver'];
          $_SESSION['user_editar'] = $row2['user_editar'];
          $_SESSION['criar_msg'] = $row2['criar_msg'];
          $_SESSION['ver_historico'] = $row2['ver_historico'];

          $sql3 = "SELECT * FROM user WHERE username = 'Sistema'";
          $result3 = mysqli_query($mysqli,$sql3);
          $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
          $funcionario=$row3['id'];


          $query4 = "INSERT INTO `mensagem` (`assunto`,`mensagem`, `lido`,`data`, `id_utilizador`,`id_emissor`) VALUES (?, ?, ?, ?, ?,?)";

          $stmt4 = $mysqli->prepare($query4);

          $stmt4->bind_param("ssisii", $assunto, $mensagem, $lido, $data, $idDestinatario, $funcionario);

          $data=date("Y-m-d H:i:s");
          echo $data;
          $lido=0;

          $idDestinatario = $row['id'];

          $assunto = "Bem-vindo!";
          $mensagem = "Caro ".$myusername.". 
          Se deseja usufruir de mais funcionalidades da nossa plataforma por favor complete o seu perfil com o seu contacto e número mecatrónico!
          Para editar o seu perfil por favor carregue no seu nome, no canto superior direito, e depois escolha a opção <b>Editar informações</b>!
          Depois de completar o seu perfil entre em contacto com o email <b>mail@mail.ipvc.pt</b>, onde envia algumas informações como o seu mail registado, o seu número mecatrónico e o seu username para poder ter acesso a mais privilégios!";
          

          $stmt4->execute();



          setcookie("login",$myusername);
          $_SESSION['username'] = $myusername;
          $_SESSION['password'] = $mypassword;
          $_SESSION['email'] = $myemail;
          $_SESSION['id'] = $row['id'];
          header("Location:index.php");
        }
        //Se encontrar email igual na BD
      }else{

        echo"<script language='javascript' type='text/javascript'>alert('Já existe utilizador com esse email, por favor utilize um email diferente!');window.location.href='login.php';</script>";
        die();
      }

      
    }
  }
?>