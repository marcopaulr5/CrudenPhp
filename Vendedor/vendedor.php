<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<?php
include("Conexionvendedor.php");
$registros = $conn->query("SELECT * FROM trabajador")->fetchAll(PDO::FETCH_OBJ);


if(isset($_POST["cr"])){

  $nombre=$_POST["Nom"];
  $apellido=$_POST["Ape"];
  $edad=$_POST["Eda"];
  $sexo=$_POST["Sex"];
  $celular=$_POST["Cel"];
  
  $sql="INSERT INTO trabajador(Nombre,Apellido,Edad,sexo,Celular)VALUES(:nom, :ape, :eda, :sex, :cel )";

  $resultado=$conn->prepare($sql);
  
  $resultado->execute(array(":nom"=>$nombre,":ape"=>$apellido,":eda"=>$edad,
  ":sex"=>$sexo, ":cel"=>$celular));
   
  header("Location:vendedor.php");
  
}
?>

<span class="text-center">Create Read Update Delete</span>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<h2 align="center">Registrar Nuevo Trabajdor</h2>
<tr>
  <td></td>
      <td>Nombre:</td>
      <td><input type='text' name='Nom' size='10' class='text-left'></td>
      <br><br>
      <td>Apellidos:</td>
      <td><input type='text' name='Ape' size='10' class='text-left'></td>
      <br><br>
      <td>Edad: </td>
      <td><input type='text' name='Eda' size='10' class='text-left'></td>
      <br><br>
      <td>Genero</td>
      <td><select name='Sex' class='derecha'>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
      </select></td>
      <br><br>
      <td>Celular:</td>
      <td><input type='text' name='Cel' size='10' class='text-left'></td>
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
    <form action="vendedor.php" method="POST" class="form-inline my-2 my-lg-0">
      <input name="busca" id="busca" class="form-control mr-sm-2" type="text" placeholder="Que Desea Buscar?..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="busca">Buscar</button>
    </form>
    <br>
    <table border="1" align="center">
      <thead class="p-3 mb-2 bg-light text-dark">
        <th>Codigo Trabajador</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th>Celular</th>
      </thead>
      <tbody>
        <?php
           include "buscarvendedor.php";
           while ($row = mysqli_fetch_array($sql_query)){
            ?>
          <tr  class="table table-striped p-3 mb-2 bg-light text-dark" > 
            <td><?= $row['idTrabajador']?></td>
            <td><?= $row['Nombre']?></td>
            <td><?= $row['Apellido']?></td>
            <td><?= $row['Edad']?></td>
            <td><?= $row['sexo']?></td>
            <td><?= $row['Celular']?></td>
          
            <td class="bot"><a href="borrarvendedor.php?id=<?php echo $row['idTrabajador']?>">
      <input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href= "editarvendedor.php?id=<?php echo $row['idTrabajador']?> &
       nom=<?php echo $row['Nombre']?> & 
      ape=<?php echo $row['Apellido']?> & eda=<?php echo $row['Edad']?>
       & sex=<?php echo $row['sexo']?>
      & cel=<?php echo $row['Celular']?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
 
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