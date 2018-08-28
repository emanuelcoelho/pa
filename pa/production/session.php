<?php

  // ao iniciar sessão grava várias permissões em SESSION para serem utilizadas no site

  session_start();
  $username=$_SESSION['username'];


  $style_ver = "";
  $style_reservar = "";
  $style_ver_admin = "";
  $style_ver_admin_query = "";
  $style_reservas = "";
  $style_criar_editar = "";
  $style_user_ver = "";
  $style_user_editar = "";
  $style_criar_msg="";
  $style_ver_historico="";
  $style_menu_criar="";
  $style_menu_editar="";

  // verifica se não tem permissão para criar/editar ou editar utilizadores
  if($_SESSION['criar_editar']==0 && $_SESSION['user_editar']==0)
  {
    // esconde elementos
    $style_menu_criar = "style='display:none'";
    $style_menu_editar= "style='display:none'";
  }

  // verifica se não tem permissão para ver
  if($_SESSION['ver']==0)
  {
    // esconde elementos
    $style_ver = "style='display:none'";
  }

  // verifica se não tem permissão para reservar
  if($_SESSION['reservar']==0)
  {
    // esconde elementos
    $style_reservar = "style='display:none'";
  }

  // verifica se não tem permissão para ver itens escondidos
  if($_SESSION['ver_admin']==0)
  {
    // apenas mostra itens visiveis
    $style_ver_admin_query = "WHERE itens.visivel=1";
    // esconde elementos
    $style_ver_admin = "style='display:none'";
  }

  // verifica se não tem permissão para editar reservas
  if($_SESSION['reservas']==0)
  {
    // esconde elementos
    $style_reservas = "style='display:none'";
  }

  // verifica se não tem permissão para ver criar/editar
  if($_SESSION['criar_editar']==0)
  {
    // esconde elementos
    $style_criar_editar = "style='display:none'";
  }

  // verifica se não tem permissão para ver utilizadores
  if($_SESSION['user_ver']==0)
  {
    // esconde elementos
    $style_user_ver = "style='display:none'";
  }

  // verifica se não tem permissão para editar utilizadores e grupos
  if($_SESSION['user_editar']==0)
  {
    // esconde elementos
    $style_user_editar = "style='display:none'";
  }

  // verifica se não tem permissão para criar mensagem
  if($_SESSION['criar_msg']==0)
  {
    // esconde elementos
    $style_criar_msg = "style='display:none'";
  }

  // verifica se não tem permissão para ver historico de utilizadores
  if($_SESSION['ver_historico']==0)
  {
    // esconde elementos
    $style_ver_historico = "style='display:none'";
  }

  // verifica se existe sessão iniciada
  if (empty($_SESSION['id'])) 
  {
    // não existe sessão iniciada
    // o utilizador  é expulso da página actuaç
    header('Location: login.php');
    exit();
  }
	
?>