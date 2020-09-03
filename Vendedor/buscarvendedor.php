<?php

include("Conectionvendedor.php");

if(!isset($_POST['busca'])){

$_POST['busca']="";

$busca= $_POST['busca'];

}

$busca = $_POST['busca'];

$read = "SELECT * FROM trabajador WHERE idTrabajador LIKE '%".$busca."%' OR Nombre LIKE'%".$busca."%' OR Apellido LIKE 
'%".$busca."%' OR Edad LIKE '%".$busca."%'OR sexo LIKE '%".$busca."%' OR Celular LIKE '%".$busca."%'  ";

$sql_query = mysqli_query($conn,$read);


?>