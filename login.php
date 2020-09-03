<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "12345678";
$dbname = "mydb";

$conn1 = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn1) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

$nombre1 = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn1,"SELECT * FROM login WHERE IdUsuario = '".$nombre1."' and Password = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	header("Location: home.html");
}
else if ($nr == 0) 
{
	header("Location: login.html");
}
?>