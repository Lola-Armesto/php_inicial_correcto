<?php
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
	
	$mail = $_POST['mailup'];
	$oldJSON = array();
	

	$sql = "SELECT * FROM agenda where email_id ='".$mail."'";
	$ej = mysqli_query($db_conn,$sql);
	$res = mysqli_fetch_array($ej);
		 $cod = $res['id_id'];
		 $name = $res['nombre_id'];
		 $surname = $res['apellidos_id'];
		 $direction = $res['direccion_id'];
		 $phone = $res['telefono_id'];
		 $mail = $res['email_id'];
	 
	 
	 

	 $oldJSON[] = array("nombre"=>$name,"apellidos"=>$surname,"direccion"=>$direction,"telefono"=>$phone,"correo"=>$mail);
	 $vJSON = json_encode($oldJSON);
	 echo $vJSON;

	/*$nname = $_POST['nom'];
	$nsurname = $_POST['ape'];
	$ndirection = $_POST['dir'];
	$nphone = $_POST['tel'];
	$nmail = $_POST['mail'];
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
	 echo $nJSON;*/



			
			

?>