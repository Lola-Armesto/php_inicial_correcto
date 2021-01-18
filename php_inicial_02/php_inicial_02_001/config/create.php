<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" href="../../../css/estilo.css" type="text/css" media="screen">
		<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		
	</head>
	<body>
					<?php
						include_once("../../../dB_conexion/conexion.php");
				
							if(isset($_POST)){

								$name = $_POST['nom'];
								$ape = $_POST['ape'];
								$dir = $_POST['dir'];
								$phone = $_POST['tel'];
								$mail = $_POST['mail'];

								$sqlcom = "SELECT * FROM agenda WHERE email_id = '".$mail."'";
								$sqlej = mysqli_query($db_conn,$sqlcom);
								$sqlres = mysqli_fetch_array($sqlej);

								if($sqlres){

									$name = $sqlres['nombre_id'];

									echo "
												<script language='javascript'>
									alert('Este contacto ya existe')
									window.location.href='../index_crud.php'
									</script>";

									}else{

										$sqlins = "INSERT into agenda (nombre_id,apellidos_id,direccion_id,telefono_id,email_id) VALUES ('".$name."','".$ape."','".$dir."','".$phone."','".$mail."')";
										$sqlinsej = mysqli_query($db_conn,$sqlins);
										echo "<p><h3>Datos introducidos correctamente<a href = ../index_crud.php>Volver</a></h3></p>";
										//header("Location: index_crud.php"); 

									}

								



							}

					?>
</body>
	



</html>