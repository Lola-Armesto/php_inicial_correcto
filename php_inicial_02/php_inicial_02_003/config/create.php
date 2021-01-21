<?php

// Realizando conexion con BBDD
include_once("../../dB_conexion/conexion.php");
include_once("../../utilities/helper.php");
//VALIDACION DATOS LADO SERVIDOR

$error ='';
//CHECK REQUEST
if(empty($_POST)){$error[] = '<p>No se han encontrado datos</p>';}
if(!isset($_POST['name'],$_POST['surname'],$_POST['dir'],$_POST['phone'],$_POST['mail'])){$error+= '<p>No se han recibido todos los datos requeridos</p>';}

//CHECK VALUES
if(empty($_POST['name'])){$error.= '<p>El campo nombre no puede estar vacío</p>';}
if(empty($_POST['surname'])){$error.= '<p>El campo apellidos no puede estar vacío</p>';}
if(empty($_POST['dir'])){$error.= '<p>El campo dirección no puede estar vacío</p>';}
if(empty($_POST['phone'])){$error.= '<p>El campo teléfono no puede estar vacío</p>';}
if(empty($_POST['mail'])){$error.= '<p>El campo email no puede estar vacío</p>';}


$name = $_POST['name'];
$surname = $_POST['surname'];
$dir = $_POST['dir'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];

$cmail = "SELECT * FROM agenda WHERE email_id = '".$mail."'";
$ccmail = mysqli_query($db_conn,$cmail);
$rcmail = mysqli_fetch_array($ccmail);
$mailc = $rcmail['email_id'];
if($mail == $mailc){$error.='<p>El usuario con este email, ya existe. Introduzca otro email o modifique el correo del otro usuario</p>';}
if(!empty($error)){send_err(-1,$error);exit;}



// Grabando nuevos datos y comprobacion de grabación correcta en BBDD



if(!mysqli_query($db_conn,"INSERT INTO agenda (nombre_id, apellidos_id, direccion_id, telefono_id, email_id) VALUES ('".$name."','".$surname."','".$dir."', '".$phone."', '".$mail."')"))
{send_err(-2,'<p>No es posible insertar los datos</p>');exit; }

// Listado datos BBDD sin filtro
$datos = "SELECT * FROM agenda";
$consulta = mysqli_query($db_conn, $datos);
$resultado = mysqli_fetch_array($consulta);
$cod = $resultado['id_id'];
session_start();
$_SESSION['codigo'] = $cod;
$cadenaJSON = array();
while($resultado = mysqli_fetch_array($consulta)){
	
	$name=$resultado['nombre_id'];
	$surname=$resultado['apellidos_id'];
	$dir=$resultado['direccion_id'];
	$phone=$resultado['telefono_id'];
	$mail=$resultado['email_id'];
	
	$cadenaJSON[]=array("name"=>$name,"surname"=>$surname,"direction"=>$dir,"phone"=>$phone,"mail"=>$mail);
} 
//Creando JSON

$jsonObj = json_encode($cadenaJSON);
//echo $jsonObj;
die(json_encode($cadenaJSON));
//cerrando variables y conexiones
mysqli_free_result($consulta);
unset($_POST,$db_conn,$resultado);
mysqli_close($db_conn);
//
exit;//end of file

?>