<?php

require_once('dbconnect_teste.php');



$query = "SELECT marca, modelo, id_categoria, id_kit, id_estado FROM teste";


$response = $mysqli->query($query);

$data = array();
if ($response) {
  while($row = mysqli_fetch_assoc($response)) {
    $data[] = $row;
  }
}
echo json_encode(array('data' => $data));

mysqli_close($mysqli);
?>