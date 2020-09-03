<?php

include("Conectionproducto.php");

if(!isset($_POST['busca'])){

$_POST['busca']="";

$busca= $_POST['busca'];

}

$busca = $_POST['busca'];

$read = "SELECT * FROM productos WHERE idProducto LIKE '%".$busca."%' OR Nombre LIKE'%".$busca."%' OR precio LIKE 
'%".$busca."%' OR Garantia LIKE '%".$busca."%'OR AñodeFabricación LIKE '%".$busca."%' OR Modelo LIKE '%".$busca."%' OR
  Descripcion Like '%".$busca."%' OR Estado LIKE '%".$busca."%' OR Stock LIKE '%".$busca."%' ";

$sql_query = mysqli_query($conn,$read);


?>