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

	$up = "UPDATE agenda SET nombre_id = '$nname', apellidos_id = '$nsurname', direccion_id = '$ndirection', telefono_id = '$nphone', email_id = '$nmail' WHERE id_id = '$cod'";
	$upej = mysqli_query($db_conn,$up);

	$selup = "SELECT * FROM agenda WHERE id_id = '$cod'";
	$ejup = mysqli_query($db_conn,$selup);
	$resup = mysqli_fetch_array($ejup);

	$nname = $resup['nombre_id'];
	$nsurname =$resup['apellidos_id'];
	$ndirection =$resup['direccion_id'];
	$nphone = $resup['telefono_id'];
	$nmail = $resup['email_id'];

	$newJSON[] = array("nombre"=>$nname,"apellidos"=>$nsurname,"direccion"=>$ndirection,"telefono"=>$nphone,"correo"=>$nmail);
	$nJSON = json_encode($newJSON);
	die($nJSON);
	mysqli_free_result($upej,$ejup);
	unset($_POST,$db_conn,$resup);
	mysqli_close($db_conn);
	session_destroy();
?>