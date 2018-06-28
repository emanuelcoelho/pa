<?php
   // iniciar uma sessão


  if($_SESSION['user_editar']==0)
  {
    header('Location: index.php');
  }


	
?>