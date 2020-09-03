<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UpDate</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

<h1 align='center'>ACTUALIZAR</h1>
<?php

  include("Conexionproducto.php");

  if(!isset($_POST["bot_actualizar"])){

  $id=$_GET["id"];
  $nom=$_GET["nom"];
  $pre=$_GET["pre"];
  $Gar=$_GET["Gar"];
  $fab=$_GET["fab"];
  $Mod=$_GET["Mod"];
  $es=$_GET["es"];
  $Est=$_GET["Est"];
  $Sto=$_GET["Sto"];;
  
  }else{
    $id=$_POST["id"];
    $nom=$_POST["nom"];
    $pre=$_POST["pre"];
    $Gar=$_POST["Gar"];
    $fab=$_POST["fab"];
    $Mod=$_POST["Mod"];
    $es=$_POST["es"];
    $Est=$_POST["Est"];
    $Sto=$_POST["Sto"];
     
   
    
     $sql="UPDATE productos SET Nombre=:miNom, precio=:mipre, Garantia=:miGar, AñodeFabricación=:mifab,
     Modelo=:miMod, Descripcion=:mies ,Estado=:miEst , Stock=:miSto  WHERE idProducto=:miId ";

     $resultado=$conn->prepare($sql);

     $resultado->execute(array(":miId"=>$id,":miNom"=>$nom,":mipre"=>$pre ,":miGar"=>$Gar,":mifab"=>$fab,
                 ":miMod"=>$Mod,":mies"=>$es,":miEst"=>$Est,":miSto"=>$Sto ));

     header("Location:producto.php");
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
      <td>precio</td>
      <td><label for="pre"></label>
      <input type="text" name="pre" step="any" id="pre" value="<?php echo $pre?>"></td>
    </tr>
    <tr>
      <td>Garantia</td>
      <td><label for="Gar"></label>
      <input type="text" name="Gar" id="Gar" value="<?php echo $Gar?>"></td>
    </tr>
    <tr>
      <td>Año de Fabricación</td>
      <td><label for="fab"></label>
      <input type="text" name="fab" id="fab" value="<?php echo $fab?>"></td>
    </tr>
    <tr>
      <td>Modelo</td>
      <td><label for="Mod"></label>
      <input type="text" name="Mod" id="Mod" value="<?php echo $Mod?>"></td>
    </tr>
    <tr>
      <td>Descripción</td>
      <td><label for="es"></label>
      <input type="text" name="es" id="es" value="<?php echo $es?>"></td>
    </tr>
    <tr>
      <td>Estado</td>
      <td><label for="Est"></label>
      <input type="text" name="Est" id="Est" value="<?php echo $Est?>"></td>
    </tr>
    <tr>
      <td>Stock</td>
      <td><label for="Sto"></label>
      <input type="text" name="Sto" id="Sto" value="<?php echo $Sto?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>