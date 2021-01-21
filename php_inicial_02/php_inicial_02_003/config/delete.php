<?php

include_once("../../dB_conexion/conexion.php");

$mail = $_POST['correo'];

$sqlcod = "SELECT * FROM agenda WHERE email_id = '$mail'";
$sqlejcod = mysqli_query($db_conn,$sqlcod);
$rescod = mysqli_fetch_array($sqlejcod);

$cod = $rescod['id_id'];

$newJSON = array();

	
$del = "DELETE FROM agenda WHERE id_id = '".$cod."'";
$delej = mysqli_query($db_conn,$del);
$nname = '';
$nsurname = '';
$ndirection = '';
$nphone = '';
$nmail = '';
$newJSON[] = array("nombre"=>$nname,"apellidos"=>$nsurname,"direccion"=>$ndirection,"telefono"=>$nphone,"correo"=>$nmail);
$nJSON = json_encode($newJSON);
die ($nJSON);

mysqli_free_result($sqlejcod);
unset($_POST,$db_conn,$rescod);
mysqli_close($db_conn);

exit;//end of file

	
?>