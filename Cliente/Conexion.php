<?php

try {
    $conn=new PDO('mysql:host=localhost; dbname=mydb','root','12345678');

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("SET CHARACTER SET UTF8");

}catch(Exception $e)
{
  die('Error'. $e->getMessage());
  echo "linea del error ". $e->getLine();

}


/*
  $conn=mysqli_connect("127.0.0.1","root","12345678","mydb");
  if($conn->connect_errno){
      echo "No conectado ";
  }else {
      echo "Conectado";
  }
*/

?>