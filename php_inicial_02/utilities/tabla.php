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
			 //Mostramos mensaje si la tabla ha sido creado correctamente!
				//echo "Tabla Agenda created successfully";
			} else {
				// Mostramos mensaje si hubo algún error en el proceso de creación
				echo "Error al crear la tabla:  o la tabla ya existe" . mysqli_error($db_conn);
			}

?>