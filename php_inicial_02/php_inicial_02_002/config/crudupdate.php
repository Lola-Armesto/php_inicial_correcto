<?php
include_once("../../dB_conexion/conexion.php");
include_once("../../utilities/helper.php");
	
	$mail = $_POST['mailup'];
	$oldJSON = array();
	$error = '';

	$sql = "SELECT * FROM agenda where email_id = '".$mail."'";
	$ej = mysqli_query($db_conn,$sql);
	$res = mysqli_fetch_array($ej);
if($res){
		 $cod = $res['id_id'];
		 session_start();
		 $_SESSION['codigo'] = $cod;
		 $name = $res['nombre_id'];
		 $surname = $res['apellidos_id'];
		 $direction = $res['direccion_id'];
		 $phone = $res['telefono_id'];
		 $mail = $res['email_id'];

	 $oldJSON[] = array("nombre"=>$name,"apellidos"=>$surname,"direccion"=>$direction,"telefono"=>$phone,"correo"=>$mail);
	 $vJSON = json_encode($oldJSON);
	 die ($vJSON);
		
		if(isset($_POST["up"])){

	$nname = $_POST['dato1'];
	$nsurname = $_POST['dato2'];
	$ndirection = $_POST['dato3'];
	$nphone = $_POST['dato4'];
	$nmail = $_POST['dato5'];
	$newJSON = array();

	$up = "UPDATE agenda SET nombre_id = '".$nname."', apellidos_id = '".$nsurname."', direccion_id = '".$ndirection."', telefono_id = '".$nphone."', email_id = '".$nmail."' WHERE id_id = '".$cod."'";
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
	die ($nJSON);
	mysqli_free_result($ej,$upej,$ejup);
	unset($_POST,$db_conn,$res,$resup);
	mysqli_close($db_conn);
	session_destroy();
}
	
}else{$error = '<p>No existe este registro en la base de datos</p>';
	  send_err(-1,$error);exit;	}


			
			

?>