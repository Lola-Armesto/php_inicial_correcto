<?php

include_once("../../dB_conexion/conexion.php");
	 session_start();
	 $cod = $_SESSION['codigo'];
	$nname = $_POST['dato1'];
	$nsurname = $_POST['dato2'];
	$ndirection = $_POST['dato3'];
	$nphone = $_POST['dato4'];
	$nmail = $_POST['dato5'];
	$newJSON = array();

	//$up = "UPDATE agenda SET nombre_id = '$nname', apellidos_id = '$nsurname', direccion_id = '$ndirection', telefono_id = '$nphone', email_id = '$nmail' WHERE id_id = '$cod'";
    //$upej = mysqli_query($db_conn,$up);
    $del = "DELETE FROM agenda WHERE id_id = '$cod'";
    $delej = mysqli_query($db_conn,$del);

	

	$nname = '';
	$nsurname = '';
	$ndirection = '';
	$nphone = '';
	$nmail = '';
	$newJSON[] = array("nombre"=>$nname,"apellidos"=>$nsurname,"direccion"=>$ndirection,"telefono"=>$nphone,"correo"=>$nmail);
	$nJSON = json_encode($newJSON);
	 echo $nJSON;
?>