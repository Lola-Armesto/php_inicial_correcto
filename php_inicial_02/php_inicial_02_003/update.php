<?php

// Realizando conexion con BBDD
include_once("../dB_conexion/conexion.php");
include_once("../utilities/helper.php");

//VALIDACION DATOS LADO SERVIDOR

$error ='';
//CHECK REQUEST
if(empty($_POST)){$error[] = '<p>No se han encontrado datos</p>';}
if(!isset($_POST['nombre'],$_POST['apellidos'],$_POST['direccion'],$_POST['telefono'],$_POST['correo'])){$error+= '<p>No se han recibido todos los datos requeridos</p>';}

//CHECK VALUES
if(empty($_POST['nombre'])){$error.= '<p>El campo nombre no puede estar vacío</p>';}
if(empty($_POST['apellidos'])){$error.= '<p>El campo apellidos no puede estar vacío</p>';}
if(empty($_POST['direccion'])){$error.= '<p>El campo dirección no puede estar vacío</p>';}
if(empty($_POST['telefono'])){$error.= '<p>El campo teléfono no puede estar vacío</p>';}
if(empty($_POST['correo'])){$error.= '<p>El campo email no puede estar vacío</p>';}

if(!empty($error)){send_err(-1,$error);exit;}

$name = $_POST['nombre'];
$surname = $_POST['apellidos'];
$dir = $_POST['direccion'];
$phone = $_POST['telefono'];
$mail = $_POST['correo'];

$sqlcod = "SELECT * FROM agenda WHERE email_id = '$mail'";
$sqlejcod = mysqli_query($db_conn,$sqlcod);
$rescod = mysqli_fetch_array($sqlejcod);

$cod = $rescod['id_id'];


// Actualizando nuevos datos y comprobacion de grabación correcta en BBDD

$up = "UPDATE agenda SET nombre_id = '".$name."' , apellidos_id = '".$surname."', direccion_id = '".$dir."', telefono_id = '".$phone."', email_id = '".$mail."' WHERE id_id = '".$cod."' ";
$ejup =mysqli_query($db_conn,$up);
echo "resultados actualizados";

/*if(!mysqli_query($db_conn,"UPDATE agenda SET nombre_id = '".$name."' , apellidos_id = '".$surname."', direccion_id = '".$dir."', telefono_id = '".$phone."', email_id = '".$mail."')  "))
{send_err(-2,'<p>No es posible insertar los datos</p>');exit; }*/

// Listado datos BBDD sin filtro
/*$datos = "SELECT * FROM agenda";
$consulta = mysqli_query($db_conn, $datos);
$resultado = mysqli_fetch_array($consulta);

$cadenaJSON = array();
while($resultado = mysqli_fetch_array($consulta)){
	$cod = $resultado['id_id'];
	$name=$resultado['nombre_id'];
	$surname=$resultado['apellidos_id'];
	$dir=$resultado['direccion_id'];
	$phone=$resultado['telefono_id'];
	$mail=$resultado['email_id'];
	
	$cadenaJSON[]=array("cod"=>$cod,"name"=>$name,"surname"=>$surname,"direction"=>$dir,"phone"=>$phone,"mail"=>$mail);
} 
//Creando JSON
$jsonObj = json_encode($cadenaJSON);
//echo $jsonObj;
die(json_encode($cadenaJSON));
//cerrando variables y conexiones
mysqli_free_result($consulta);
unset($_POST,$db_conn,$resultado);
mysqli_close($db_conn);
//*/
//exit;//end of file

?>