<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UpDate</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>
<?php

  include("Conexion.php");

  if(!isset($_POST["bot_actualizar"])){

  $id=$_GET["id"];
  $nom=$_GET["nom"];
  $ape=$_GET["ape"];
  $eda=$_GET["eda"];
  $cel=$_GET["cel"];
  $cor=$_GET["cor"];
  $sex=$_GET["sex"];
  $dni=$_GET["dni"];
  $cui=$_GET["cui"];
  }else{
     $id=$_POST["id"];
     $nom=$_POST["nom"];
     $ape=$_POST["ape"];
     $eda=$_POST["eda"];
     $cor=$_POST["cor"];
     $cel=$_POST["cel"];
     $sex=$_POST["sex"];
     $dni=$_POST["dni"];
     $cui=$_POST["cui"];
    
     $sql="UPDATE cliente SET Nombre=:miNom, Apellidos=:miApe, Edad=:miEda, NCelular=:miCel, 
     correo=:miCor, sexo=:miSex, DNI=:miDni, Cuidad=:miCui WHERE idCliente=:miId";

     $resultado=$conn->prepare($sql);

     $resultado->execute(array(":miId"=>$id,":miNom"=>$nom,":miApe"=>$ape,":miEda"=>$eda, ":miCel" =>$cel,
      ":miCor"=>$cor, ":miSex"=>$sex, ":miDni"=>$dni,":miCui"=>$cui ));

     header("Location:index.php");
  }
?>
<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nom?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $ape?>"></td>
    </tr>
    <tr>
      <td>Edad</td>
      <td><label for="eda"></label>
      <input type="text" name="eda" id="eda" value="<?php echo $eda?>"></td>
    </tr>

    <tr>
      <td>Celular</td>
      <td><label for="cel"></label>
      <input type="text" name="cel" id="cel" value="<?php echo $cel?>"></td>
    </tr>
    <tr>
      <td>Correo Electronico</td>
      <td><label for="cor"></label>
      <input type="text" name="cor" id="cor" value="<?php echo $cor?>"></td>
    </tr>
    <tr>
      <td>Sexo</td>
      <td><label for="sex"></label>
      <input type="text" name="sex" id="sex" value="<?php echo $sex?>"></td>
    </tr>
    <tr>
      <td>DNI</td>
      <td><label for="dni"></label>
      <input type="text" name="dni" id="dni" value="<?php echo $dni?>"></td>
    </tr>
    <tr>
      <td>Ciudad</td>
      <td><label for="cui"></label>
      <input type="text" name="cui" id="cui" value="<?php echo $cui?>"></td>
    </tr>
    <tr>

      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>