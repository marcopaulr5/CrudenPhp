<?php

include("Conection.php");

if(!isset($_POST['busca'])){

$_POST['busca']="";

$busca= $_POST['busca'];

}

$busca = $_POST['busca'];

$read = "SELECT * FROM cliente WHERE idCliente LIKE '%".$busca."%' OR Nombre LIKE'%".$busca."%' OR Apellidos LIKE 
'%".$busca."%' OR Edad LIKE '%".$busca."%' OR NCelular LIKE '%".$busca."%' OR correo LIKE '%".$busca."%' OR 
sexo LIKE '%".$busca."%' OR sexo LIKE '%".$busca."%' or Cuidad LIKE '%".$busca."%' ";

$sql_query = mysqli_query($conn,$read);



?>