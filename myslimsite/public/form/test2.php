
<?php 
require_once('dbconnect_teste.php');
?>

<!DOCTYPE html>
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


<form action="http://myslimsite/api/teste/insertF" method="POST">
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
  
  

  <input type="submit" value="Submit">
</form>

<p>Note that the form itself is not visible.</p>

<p>Also note that the default width of a text input field is 20 characters.</p>

</body>
</html>