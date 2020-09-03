<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<?php
include("Conexionproducto.php");
$registros = $conn->query("SELECT * FROM productos")->fetchAll(PDO::FETCH_OBJ);


if(isset($_POST["cr"])){

  $nombre=$_POST["Nom"];
  $precio  =$_POST["pre"];
  $Garantia =$_POST["Gar"];
  $AnodeFabricacion=$_POST["fab"];
  $Modelo=$_POST["Mod"];
  $Descripcion=$_POST["es"];
  $Estado=$_POST["Est"];
  $Stock=$_POST["Sto"];

  $sql="INSERT INTO productos(Nombre,precio,Garantia,AñodeFabricación,Modelo,Descripcion,
    Estado,Stock )VALUES( :Nom,:pre,:Gar,:fab,:Mod,:es,:Est,:Sto )";

  $resultado=$conn->prepare($sql);
  
  $resultado->execute(array(":Nom"=>$nombre,":pre"=>$precio,":Gar"=>$Garantia,":fab"=>$AnodeFabricacion,
                      ":Mod"=>$Modelo,":es"=>$Descripcion,":Est"=>$Estado,":Sto"=>$Stock));
   
  header("Location:producto.php");
  
}
?>

<span class="text-center">Create Read Update Delete</span>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<h2 align="center">Registrar Nuevo Producto</h2>
<tr>
  <td></td>
      <td>Nombre:</td>
      <td><input type='text' name='Nom' size='10' class='text-left'></td>
      <br><br>
      <td>precio:</td>
      <td><input type='number' step='any' name='pre' size='10' class='text-left'></td>
      <br><br>
      <td>Garantia: </td>
      <td><input type='text' name='Gar' size='10' class='text-left'></td>
      <br><br>
      <td>AñodeFabricación:</td>
      <td><input type='text' name='fab' size='10' class='text-left'></td>
      <br><br>
      <td>Modelo:</td>
      <td><input type='text' name='Mod' size='10' class='text-left'></td>
      <br><br>
      <td>Descripcion:</td>
      <td><input type='text' name='es' size='10' class='text-left'></td>
      <br><br>
      <td>Estado:</td>
      <td><input type='text' name='Est' size='10' class='text-left'></td>
      <br><br>
      <td>Stock:</td>
      <td><input type='text' name='Sto' size='10' class='text-left'></td>
      <br><br>

      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>
</form>
<br>
<!- haciendo la barra de busqueda ....->

<nav class="navbar navbar-dark bg-dark">
<a class="navbar-brand" href="#">Busqueda De Datos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    </ul>
    <form action="producto.php" method="POST" class="form-inline my-2 my-lg-0">
      <input name="busca" id="busca" class="form-control mr-sm-2" type="text" placeholder="Que Desea Buscar?..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="busca">Buscar</button>
    </form>
    <br>
    <table border="1" align="center">
      <thead class="p-3 mb-2 bg-light text-dark">
        <th>Codigo Producto</th>
        <th>Nombre</th>
        <th>precio</th>
        <th>Garantia</th>
        <th>AñodeFabricación</th>
        <th>Modelo</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th>Stock</th>
      </thead>
      <tbody>
        <?php
           include "buscarproducto.php";
           while ($row = mysqli_fetch_array($sql_query)){
            ?>
          <tr  class="table table-striped p-3 mb-2 bg-light text-dark" > 
            <td><?= $row['idProducto']?></td>
            <td><?= $row['Nombre']?></td>
            <td><?= $row['precio']?></td>
            <td><?= $row['Garantia']?></td>
            <td><?= $row['AñodeFabricación']?></td>
            <td><?= $row['Modelo']?></td>
            <td><?= $row['Descripcion']?></td>
            <td><?= $row['Estado']?></td>
            <td><?= $row['Stock']?></td>
          
            <td class="bot"><a href="borrarproducto.php?id=<?php echo $row['idProducto']?>">
      <input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href= "editarproducto.php?id=<?php echo $row['idProducto']?> &
       nom=<?php echo $row['Nombre']?> & pre=<?php echo $row['precio']?> & Gar=<?php echo $row['Garantia']?>
       & fab=<?php echo $row['AñodeFabricación']?>
      & Mod=<?php echo $row['Modelo']?> & es=<?php echo $row['Descripcion']?> & Est=<?php echo $row['Estado']?> &
       Sto=<?php echo $row['Stock']?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
 
          </tr>
            
          <?php } ?>
      </tbody>
    </table>

</nav>





<p>&nbsp;</p>
 <script src="js/jquery-3.5.1.min.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>