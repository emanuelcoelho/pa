
<?php 
require_once('dbconnect_teste.php');
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="addInput.js" language="Javascript" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<html>
<body>

<h2>Text Input</h2>

<!--
<?php 
  $con=mysqli_connect("localhost","root","");
  mysqli_select_db($con,"pa");     
      
?>


<form action="http://myslimsite/api/teste/insert" method="POST">
  First name:<br>
  <input type="text" name="first_name">
  <br>
  Last name:<br>
  <input type="text" name="last_name">
  <br>
  Number:<br>
  <input type="text" name="number">
  <br>
  Hidden:<br>
  <input type="radio" name="hidden" value="1" checked> Yes<br>
  <input type="radio" name="hidden" value="0"> No<br>
  <br>
  <input type="submit" value="Submit">
</form>


<select name="desc">
    <?php 
      $result = mysqli_query($con, "select * from teste_fkey");
      while ($row = mysqli_fetch_array($result)){
    ?>
    
    <option value= <?php echo $row["id"]; ?> > <?php echo $row["descricao"]; ?> </option>

    <?php
    
      }
      
    ?>
  </select>

-->


<form action="http://myslimsite/api/teste/insertF" method="POST" enctype="multipart/form-data">
  First name:<br>
  <input type="text" name="first_name">
  <br>
  Last name:<br>
  <input type="text" name="last_name">
  <br>
  Number:<br>
  <input type="text" name="number">
  <br>
  Hidden:<br>
  <input type="radio" name="visible" value="1" checked> Yes<br>
  <input type="radio" name="visible" value="0"> No<br>
  <br>

  <!--Dropdown list com elementos de chave estrangeira-->
  Description:<br>
  <?php

  // Assume $db is a PDO object
  $query = "SELECT * FROM `teste_fkey` "; // Run your query
  $result=$mysqli->query($query);
  $final=[];
  echo '<select name="desc">'; // Open your drop down box

  // Loop through the query results, outputing the options one by one
  while ($row = $result->fetch_assoc()) {
     echo '<option value="'.$row['id'].'">'.$row['descricao'].'</option>';

  }

  echo '</select>';// Close your drop down box
  ?>
  <br>
  

  <!--Calendário com limite minimo do dia seguinte e limite máximo de mais 6 dias-->
  Data limite (amanhã até 6 dias depois):
  <br>
  <?php

  $g=strtotime("tomorrow");
  $f=6;
  $d=strtotime("+ ".$f." days");
  echo '<input type="date" name="bday" min="'.date("Y-m-d",$g).'" max="'.date("Y-m-d",$d).'">';
  
  ?>
  <br>

  <!--Calendário com limite minimo da base de dados e limite máximo de mais 6 dias-->
  Data limite (16 de maio 2018 até 6 dias depois, data da base de dados):
  <br>
  <?php


  $query1 = "SELECT * FROM `teste_data` WHERE `id` = 2"; // Run your query
  $result1=$mysqli->query($query1);
  $row1 = $result1->fetch_object();
  
  $h=date('Y-m-d', strtotime($row1->data));
  //$h=date($row1->data);
  //var_dump($h);
 
  $j=strtotime($h."+ ".$f." days");
  echo '<input type="date" name="bday2" min="'.$h.'" max="'.date("Y-m-d",$j).'">';
  
  ?>
  <br>


  <!-- ATRIBUTOS JAVASCRIPT 

  <div id="dynamicInput">
    Atributo 1
    <br>
    <input type="text" name="myInputs[]">
    <br>
    
  </div>
  <input type="button" value="Add another text input" onClick="addInput('dynamicInput');">
  <br>
  -->



  <table class="table table-bordered" id="dynamic_field">
    <tr>
      <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
      <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
    </tr>
  </table>

  <br>

  <label>File: </label><input type="file" name="image" />
  <br>


  <input type="submit" value="Submit">
</form>


<!--FORM Inserir data na base de dados-->
<form action="http://myslimsite/api/teste/insertdate" method="POST">
  <br>
  Data:<br>
  
  Inserir data na base de dados
  <br>
  <input type="date" name="data">;
  <br>


  <input type="submit" value="Submit">
</form>

<br>
<br>


<!--FORM Inserir foto(url) na base de dados-->
<form action="http://myslimsite/api/teste/image" method="post" enctype="multipart/form-data">
  <label>File: </label><input type="file" name="image" />
  <input type="submit" />
</form>

<p>Note that the form itself is not visible.</p>

<p>Also note that the default width of a text input field is 20 characters.</p>

</body>
</html>

<script>
$(document).ready(function(){
  var i=1;
  $('#add').click(function(){
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
  });
  
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });
  
  
});
</script>