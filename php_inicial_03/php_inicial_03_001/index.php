<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD Función PHP MySQLi </title>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen">
</head>

<body>
<div >
<h1>CRUD con Función PHP MySQLi </h1>
<br><br>
<div id = "insertar">
<form action="" method="post">
  <div>
    <input name="nombres" type="text" placeholder="Nombre" required>
  </div>
  <div >
    <input name="apellidos" type="text" placeholder="Apellidos" required>
  </div>  
  <div >
    <input name="direccion" type="text" placeholder="Direccion" required>
  </div>  
  <div >
    <input name="telefono" type="number" placeholder="Telefono" required>
  </div>  
  <div >
    <input name="correo" type="email" placeholder="Email" required>
  </div>  
	<input type="submit" name="submit"  value="Insertar">
</form>
</br>
<?php
    include_once("config/funciones.php");
    if(isset($_POST['submit'])){
        $field = array("nombre_id"=>$_POST['nombres'],"apellidos_id"=>$_POST['apellidos'],"direccion_id"=>$_POST['direccion'],"telefono_id"=>$_POST['telefono'],"email_id"=>$_POST['correo']);
        $tabla = "agenda";
        insert($tabla,$field);
    }
?>
</div> 
<div id = "mostrarTabla">
<table border= "2px" width = 80% align = "center">
    <tr width = "20%">
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>
        <th colspan = 2>Operaciones</th>
    </tr>
    <?php 
    include("../db_conexion/conexion.php");
    $sql = "SELECT * FROM agenda";
    $ej = mysqli_query($db_conn,$sql);
    while ($row = mysqli_fetch_object($ej)){
     ?>
    
    <tr>
      <td><?php echo $row->nombre_id;?></td>
      <td><?php echo $row->apellidos_id;?></td>
      <td><?php echo $row->direccion_id;?></td>
      <td><?php echo $row->telefono_id;?></td>
      <td><?php echo $row->email_id;?></td>
      <td><a href = "config/update.php?var=<?php echo $row->id_id;?>">Actualizar</a></td>
      <td><a href="config/delete.php?var=<?php echo $row->id_id;?>">Eliminar</a></td>
    

    </tr>
    <?php }; ?>
    
  
    
    </table>
  </br>
</div> 

</body>
</html>