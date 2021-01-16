
<?php

// Realizando conexion con BBDD
include_once("../../dB_conexion/conexion.php");
include_once("helper.php");

//VALIDACION DATOS LADO SERVIDOR

$error ='';
//CHECK REQUEST
if(empty($_POST)){$error[] = '<p>No se han encontrado datos</p>';}
if(!isset($_POST['matricula'],$_POST['marca'],$_POST['modelo'],$_POST['color'],$_POST['precio'])){$error+= '<p>No se han recibido todos los datos requeridos</p>';}

//CHECK VALUES
if(empty($_POST['matricula'])){$error.= '<p>El campo matrícula no puede estar vacío</p>';}
if(empty($_POST['marca'])){$error.= '<p>El campo marca no puede estar vacío</p>';}
if(empty($_POST['modelo'])){$error.= '<p>El campo modelo no puede estar vacío</p>';}
if(empty($_POST['color'])){$error.= '<p>El campo color no puede estar vacío</p>';}
if(empty($_POST['precio'])){$error.= '<p>El campo precio no puede estar vacío</p>';}

if(!empty($error)){send_err(-1,$error);exit;}

$matricula = $_POST['matricula'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$precio = $_POST['precio'];

// Grabando nuevos datos y comprobacion de grabación correcta en BBDD

if(!mysqli_query($db_conn,"INSERT INTO php_inicial_lola (matricula_coche, marca_coche, modelo_coche, color_coche, precio_coche) VALUES ('".$matricula."','".$marca."','".$modelo."','".$color."','".$precio."')"))
{send_err(-2,'<p>No es posible insertar los datos</p>');exit; }


// Listado datos BBDD sin filtro
$datos = "SELECT * FROM php_inicial_lola";
$consulta = mysqli_query($db_conn, $datos);
$resultado = mysqli_fetch_array($consulta);
$cadenaJSON = array();
while($resultado=mysqli_fetch_array($consulta)){
	
	$matricula=$resultado['matricula_coche'];
	$marca=$resultado['marca_coche'];
	$modelo=$resultado['modelo_coche'];
	$color=$resultado['color_coche'];
	$precio=$resultado['precio_coche'];
	
	$cadenaJSON[]=array("matricula"=>$matricula,"marca"=>$marca,"modelo"=>$modelo,"color"=>$color,"precio"=>$precio);
} 
//Creando JSON
$jsonObj = json_encode($cadenaJSON);
//echo $jsonObj;
die(json_encode($cadenaJSON));
//cerrando variables y conexiones
mysqli_free_result($consulta);
unset($_POST,$db_conn,$resultado);
mysqli_close($db_conn);

exit;//end of file

?>