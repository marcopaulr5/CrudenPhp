<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>borrando...</title>
</head>
<body>
<?php
  include("Conexion.php");

  $id=$_GET["id"];
  $conn->query("DELETE FROM cliente WHERE idCliente='$id'");

  header("Location:index.php");

?>
</body>
</html>