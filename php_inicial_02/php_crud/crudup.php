<?php

include_once("../dB_conexion/conexion.php");
 	if (isset($_GET["var"])){
			$cod = $_GET["var"];
			
			
			}
	$nname = $_POST['nom'];
	$nsurname = $_POST['ape'];
	$ndirection = $_POST['dir'];
	$nphone = $_POST['tel'];
	$nmail = $_POST['mail'];
	$newJSON = array();

	$up = "UPDATE agenda SET nombre_id = '$nname', apellidos_id = '$nsurname', direccion_id = '$ndirection', telefono_id = '$nphone', email_id = '$nmail' WHERE id_id = '$cod'";
	$upej = mysqli_query($db_conn,$up);

	$selup = "SELECT * FROM agenda WHERE id_id = '$cod'";
	$ejup = mysqli_query($db_conn,$selup);
	$resup = mysqli_fetch_array($ejup);

	$nname = $resup['nom'];
	$nsurname =$resup['ape'];
	$ndirection =$resup['dir'];
	$nphone = $resup['tel'];
	$nmail = $resup['mail'];

	$newJSON[] = array("nombre"=>$nname,"apellidos"=>$nsurname,"direccion"=>$ndirection,"telefono"=>$nphone,"correo"=>$nmail);
	$nJSON = json_encode($newJSON);
	 echo $nJSON;
?>