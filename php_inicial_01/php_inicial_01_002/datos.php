<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen">
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
</head>
<body>
<p><label><a href="../../index.html">Volver a inicio</a></label></p>
<?php

include_once("../../dB_conexion/conexion.php");
// Recogiendo datos del formulario
if(isset($_POST)){
$matricula = $_POST['matricula'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo']; 
$color = $_POST['color'];
$precio = $_POST['precio'];
// Grabando nuevos datos y comprobacion de grabación correcta en BBDD
$sql="INSERT INTO php_inicial_lola (matricula_coche, marca_coche, modelo_coche, color_coche, precio_coche) VALUES ('".$matricula."','".$marca."','".$modelo."','".$color."','".$precio."')";
if(mysqli_query($db_conn,$sql)){ echo"<h3>DATOS GRABADOS</h3>"; }else{ die('No se han grabado los datos. Intentalo de nuevo');}

// Listado datos BBDD sin filtro
$datos = "SELECT * FROM php_inicial_lola";
$consulta = mysqli_query($db_conn, $datos);
$resultado = mysqli_fetch_array($consulta);
 WHILE($resultado=mysqli_fetch_array($consulta)){
	$matricula=$resultado['matricula_coche'];
	$marca=$resultado['marca_coche'];
	$modelo=$resultado['modelo_coche'];
	$color=$resultado['color_coche'];
	$precio=$resultado['precio_coche'];
	echo($matricula.' | '.$marca.' | '.$modelo.' | '.$color.' | '.$precio.' </br>');
 }
echo " <a href='index_ejercicio2.html'>Nuevo Usuario</a>";
}else{die('Datos no recibidos');}
?>
</body>
</html>