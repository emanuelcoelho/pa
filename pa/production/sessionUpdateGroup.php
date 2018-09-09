<?php
	// atualiza as variaveis session para refletir as mudanças feitas no grupo
	
	// recolhe id do grupo do utilizador activo	
	$sql = "SELECT * FROM user WHERE id = '".$_SESSION['id']."' ";
	$result = mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

  // o grupo onde pertence o utilizador activo
	$group = $row['id_grupo'];

	// recolhe informações do grupo do utilizador activo
	$sql2 = "SELECT * FROM grupo WHERE id = '$group' ";
	$result2 = mysqli_query($mysqli,$sql2);
	$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

	// actualiza as permissoes
	$_SESSION['ver'] = $row2['ver'];
	$_SESSION['reservar'] = $row2['reservar'];
	$_SESSION['ver_admin'] = $row2['ver_admin'];
	$_SESSION['reservas'] = $row2['reservas'];
	$_SESSION['criar_editar'] = $row2['criar_editar'];
	$_SESSION['user_ver'] = $row2['user_ver'];
	$_SESSION['user_editar'] = $row2['user_editar'];
	$_SESSION['criar_msg'] = $row2['criar_msg'];
	$_SESSION['ver_historico'] = $row2['ver_historico'];

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

?>