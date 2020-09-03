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