<?php

if(!isset($_POST['busca'])) exit('No se recibió el valor a buscar');

require_once 'Conexion.php';

function search()
{
  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST['busca']);
  $query = "SELECT * FROM cliente WHERE Nombre LIKE '%busca%' ";
  $res = $mysqli->query($query);
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    echo "<p>$row[Nombre]</p>";
  }
}

search();


?>