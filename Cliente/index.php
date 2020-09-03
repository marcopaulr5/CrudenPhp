<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<?php
include("Conexion.php");
$registros = $conn->query("SELECT * FROM cliente")->fetchAll(PDO::FETCH_OBJ);


if(isset($_POST["cr"])){

  $nombre=$_POST["Nom"];
  $apellido=$_POST["Ape"];
  $edad=$_POST["Eda"];
  $celular=$_POST["Cel"];
  $correo=$_POST["Cor"];
  $sexo=$_POST["Sex"];
  $dni=$_POST["Dni"];
  $cuidad=$_POST["Cui"];
  
  $sql="INSERT INTO cliente(Nombre,Apellidos,Edad,NCelular,correo,sexo,DNI,Cuidad)VALUES(:nom, :ape, :eda, :cel, :cor, :sex, :dni, :cui )";

  $resultado=$conn->prepare($sql);
  
  $resultado->execute(array(":nom"=>$nombre,":ape"=>$apellido,":eda"=>$edad,
  ":cel"=>$celular,":cor"=>$correo,":sex"=>$sexo,":dni"=>$dni,":cui"=>$cuidad));

  header("Location:index.php");
  
}

?>

<span class="text-center">Create Read Update Delete</span>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<h2 align="center">Registrar Nuevo Cliente</h2>
<tr>
  <td></td>
      <td>Nombre:</td>
      <td><input type='text' name='Nom' size='10' class='text-left'></td>
      <br><br>
      <td>Apellidos:</td>
      <td><input type='text' name='Ape' size='10' class='text-center'></td>
      <br><br>
      <td>Edad: </td>
      <td><input type='text' name='Eda' size='10' class='centrado'></td>
      <br><br>
      <td>Celular:</td>
      <td><input type='text' name='Cel' size='10' class='derecha'></td>
      <br><br>
      <td>Correo Electronico:</td>
      <td><input type='text' name='Cor' size='15' class='text-left' placeholder="gmail,hotmail,etc.."></td>
      <br><br>
      <td>Genero</td>
      <td><select name='Sex' class='derecha'>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
      </select></td>
      <br><br>
      <td>DNI:</td>
      <td><input type='text' name='Dni' size='10' class='derecha'></td>
      <br><br>
      <td>Ciudad:</td>
      <td><input type='text' name='Cui' size='10' class='derecha'></td>
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
    <form action="index.php" method="POST" class="form-inline my-2 my-lg-0">
      <input name="busca" id="busca" class="form-control mr-sm-2" type="text" placeholder="Que Desea Buscar?..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="busca">Buscar</button>
    </form>
    <br>
    <table border="1" align="center">
      <thead class="p-3 mb-2 bg-light text-dark">
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>Celular</th>
        <th>Correo</th>
        <th>Sexo</th>
        <th>DNI</th>
        <th>Ciudad</th>
      </thead>
      <tbody>
        <?php
           include "buscar.php";
           while ($row = mysqli_fetch_array($sql_query)){
            ?>
          <tr  class="table table-striped p-3 mb-2 bg-light text-dark" > 
            <td><?= $row['idCliente']?></td>
            <td><?= $row['Nombre']?></td>
            <td><?= $row['Apellidos']?></td>
            <td><?= $row['Edad']?></td>
            <td><?= $row['NCelular']?></td>
            <td><?= $row['correo']?></td>
            <td><?= $row['sexo']?></td>
            <td><?= $row['DNI']?></td>
            <td><?= $row['Cuidad']?></td>
          </tr>
            
          <?php } ?>
      </tbody>
    </table>

</nav>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <table class="table table-sm table-dark" border="1" align="left">
  
    <tr>
      <td scope="col">Codigo</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellidos</td>
      <td class="primera_fila">Edad</td>
      <td class="primera_fila">Celular</td>
      <td class="primera_fila">Correo</td>
      <td class="primera_fila">Sexo</td>
      <td class="primera_fila">DNI</td>
      <td class="primera_fila">Ciudad</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
     
    
    </tr> 
   
    <?php
    foreach($registros as $cliente):
    ?>    
   	<tr>
      <td><?php echo $cliente->idCliente?> </td>
      <td><?php echo $cliente->Nombre?></td>
      <td><?php echo $cliente->Apellidos?></td>
      <td><?php echo $cliente->Edad?></td>
      <td><?php echo $cliente->NCelular?></td>
      <td><?php echo $cliente->correo?></td>
      <td><?php echo $cliente->sexo?></td>
      <td><?php echo $cliente->DNI?></td>
      <td><?php echo $cliente->Cuidad?></td>
 
      <td class="bot"><a href="borrar.php?id=<?php echo $cliente->idCliente?>">
      <input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href= "editar.php?id=<?php echo $cliente->idCliente?> & nom=<?php echo $cliente->Nombre?> & 
      ape=<?php echo $cliente->Apellidos?> & eda=<?php echo $cliente->Edad?> & cel=<?php echo $cliente->NCelular?> 
      & cor=<?php echo $cliente->correo?> & sex=<?php echo $cliente->sexo?> & dni=<?php echo $cliente->DNI?> 
      & cui=<?php echo $cliente->Cuidad?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>     
    
    <?php 
    endforeach;
    ?>
    
  </table>
</form>




<p>&nbsp;</p>
 <script src="js/jquery-3.5.1.min.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript" src="js/funcion.js"></script>
</body>
</html>