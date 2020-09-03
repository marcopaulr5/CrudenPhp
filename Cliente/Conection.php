<?php 

$conn=mysqli_connect("127.0.0.1","root","12345678","mydb");
  if($conn->connect_errno){
      echo "No conectado ";
  }else {
      echo "Resultados";
  }

?>