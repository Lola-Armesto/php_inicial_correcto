
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
	
		$cod = $_GET['var'];
		$sqlup = "SELECT * FROM agenda WHERE id_id = '".$cod."'";
		$ejup = mysqli_query($db_conn,$sqlup);
		$resup = mysqli_fetch_array($ejup);
		
		$cod = $resup['id_id'];
		$nom = $resup['nombre_id'];
		$ape = $resup['apellidos_id'];
		$dir = $resup['direccion_id'];
		$phone = $resup['telefono_id'];
		$mail = $resup['email_id'];

	

?>
		<div id = "update">
			<form method ="post" id="formulario"  >
			<p>Nombre : 	<input type = "text" name = "nom" id = "nom" value="<?php echo "$nom"; ?>" required="required"></p>
			<p>Apellidos :  <input type = "text" name = "ape" id = "ape" value="<?php echo "$ape"; ?>" required="required"></p>
			<p>Direccion :  <input type = "text" name = "dir" id = "dir" value="<?php echo "$dir"; ?>" required="required"></p>
			<p>Telefono : 	<input type = "text" name = "tel" id = "tel" value="<?php echo "$phone"; ?>" required="required"></p>
			<p>Email : 		<input type = "text" name = "mail" id = "mail" value="<?php echo "$mail"; ?>" required="required"></p>
			<p><input type = "submit" name = "ndatos" value = "MODIFICA DATOS" ></p>
			</form> 			
		</div>

		<?php
		if(isset($_POST['ndatos'])){
			if(empty($_POST['nom'])){echo "<p>El campo nombre no puede estar vacio</p>";}
			if(empty($_POST['ape'])){echo "<p>El campo apellidos no puede estar vacio</p>";}
			if(empty($_POST['dir'])){echo "<p>El campo direccion no puede estar vacio</p>";}
			if(empty($_POST['tel'])){echo "<p>El campo teléfono no puede estar vacio</p>";}
			if(empty($_POST['mail'])){echo "<p>El campo email no puede estar vacio</p>";}
			$nnom = $_POST['nom'];
			$nape = $_POST['ape'];
			$ndir = $_POST['dir'];
			$nphone = $_POST['tel'];
			$nmail = $_POST['mail'];
			
		$sqlupdate = "UPDATE agenda SET nombre_id = '".$nnom."',apellidos_id = '".$nape."',direccion_id = '".$ndir."', telefono_id = '".$nphone."' , email_id = '".$nmail."' WHERE id_id = '".$cod."'";
		$ejupdate = mysqli_query($db_conn,$sqlupdate);
		header("Location: ../index_crud.php"); 
		}

		?>
		<p id="resultado"></p>

	</body>

</html>