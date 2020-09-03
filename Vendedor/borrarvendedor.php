<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>borrando...</title>
</head>
<body>
<?php
  include("Conexionvendedor.php");

  $id=$_GET["id"];
  $conn->query("DELETE FROM trabajador WHERE idTrabajador='$id'");

  header("Location:vendedor.php");

?>
</body>
</html>