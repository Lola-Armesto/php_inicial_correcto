<?php

// Realizando conexion con BBDD
include_once("../dB_conexion/conexion.php");
$tab = "CREATE TABLE IF NOT EXISTS agenda(
		id_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		nombre_id varchar(10),
		apellidos_id  varchar(80),
		direccion_id varchar(50),
		telefono_id  int(9),
		email_id varchar(30))" ;

		if (mysqli_query($db_conn, $tab)) {
		// Mostramos mensaje si la tabla ha sido creado correctamente!
			//echo "Tabla Agenda created successfully";
		} else {
			// Mostramos mensaje si hubo algún error en el proceso de creación
			//echo "Error al crear la tabla: " . mysqli_error($db_conn);
		}
		

// Recogiendo datos del formulario
$name = $_POST['name'];
$surname = $_POST['surname'];
$dir = $_POST['dir']; 
$phone = $_POST['phone'];
$mail = $_POST['mail'];




$sql="INSERT INTO agenda (nombre_id, apellidos_id, direccion_id, telefono_id, email_id) VALUES ('".$name."','".$surname."','".$dir."','".$phone."','".$mail."')";
$ej=mysqli_query($db_conn,$sql);

// Listado datos BBDD sin filtro
$datos = "SELECT * FROM agenda";
$consulta = mysqli_query($db_conn, $datos);

$newJSON = array();


while($resultado = mysqli_fetch_array($consulta)){	
	$name=$resultado['nombre_id'];
	$surname=$resultado['apellidos_id'];
	$dir=$resultado['direccion_id'];
	$phone=$resultado['telefono_id'];
	$mail=$resultado['email_id'];
	

   $newJSON[] = array("nombre"=>$name,"apellidos"=>$surname,"direccion"=>$dir,"telefono"=>$phone,"email"=>$mail);
}
//Creando JSON

$jsonObj = json_encode($newJSON);

echo $jsonObj;

//echo $jsone;

//die($jsonObj);

// Para crear el archivo JSON

$archivoJson = 'cosas.json';
file_put_contents($archivoJson,$jsonObj);


?>