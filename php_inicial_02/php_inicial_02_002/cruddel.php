<?php

include_once("../../dB_conexion/conexion.php");
session_start();
$cod = $_SESSION['codigo'];


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
echo $nJSON;

mysqli_free_result($delej);
unset($db_conn,$res);
mysqli_close($db_conn);
session_destroy();

	
?>