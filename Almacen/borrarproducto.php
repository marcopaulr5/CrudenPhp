<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>borrando...</title>
</head>
<body>
<?php
  include("Conexionproducto.php");

  $id=$_GET["id"];
  $conn->query("DELETE FROM productos WHERE idProducto='$id'");

  header("Location:producto.php");

?>
</body>
</html>