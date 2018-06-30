<?php
   // iniciar uma sessão
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


  if($_SESSION['ver']==0)
  {
    $style_ver = "style='display:none'";
  }

  if($_SESSION['reservar']==0)
  {
    $style_reservar = "style='display:none'";
  }

  if($_SESSION['ver_admin']==0)
  {
    $style_ver_admin_query = "WHERE itens.visivel=1";
    $style_ver_admin = "style='display:none'";
  }

  if($_SESSION['reservas']==0)
  {
    $style_reservas = "style='display:none'";
  }

  if($_SESSION['criar_editar']==0)
  {
    $style_criar_editar = "style='display:none'";
  }

  if($_SESSION['user_ver']==0)
  {
    $style_user_ver = "style='display:none'";
  }

  if($_SESSION['user_editar']==0)
  {
    $style_user_editar = "style='display:none'";
  }

  if($_SESSION['criar_msg']==0)
  {
    $style_criar_msg = "style='display:none'";
  }

  if($_SESSION['ver_historico']==0)
  {
    $style_ver_historico = "style='display:none'";
  }

	if (empty($_SESSION['id'])) {
	 
		// não existe sessão iniciada
		// neste caso, levamos o utilizador para a página de login
		header('Location: login.php');
		exit();
	}
	
?>