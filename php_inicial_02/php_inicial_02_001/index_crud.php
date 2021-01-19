<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen">
		<script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		
	</head>
	<body>
	
		<nav id = "menu" >
			 	<button><a href="../../index.html">Volver a inicio</a>
				<button><a href="#create"  id="btn1">Alta Usuarios</a></button>
				<button><a href="#read" id="btn2">Operaciones en Registros</a></button>
		
		</nav>
	
		<div id = "create" >
			<p><u><h3 style = "color:green;">Alta Usuarios</h3></u></p>
			
			<form method ="post" id="formulario" action="config/create.php">
					<p>Nombre : 	<input type = "text" name = "nom" id = "nom" required="required"></p>
					<p>Apellidos :  <input type = "text" name = "ape" id = "ape" required="required"></p>
					<p>Direccion :  <input type = "text" name = "dir" id = "dir" required="required"></p>
					<p>Telefono : 	<input type = "text" name = "tel" id = "tel" required="required"></p>
					<p>Email : 		<input type = "text" name = "mail" id = "mail" required="required"></p>
					<p><input type = "submit" value = "INTRODUCE DATOS"></p>
			
			</form> 

			
		</div>
		
		
		<div id = "read" >

			<p><u><h3 style = "color:green;">Operaciones</h3></u></p>

			<p><h4 style = "color:blue;">Tabla general</h4></p>


		<table style ='border:2px solid black'>
				<thead >
							<tr style = 'border:1px solid black'>
								
								<th >Nombre</th>
								<th>Apellidos</th>
								<th>Direccion</th>
								<th>Telefono</th>
								<th>Email</th>
								<th></th>
								<th></th>

						</tr>
				</thead>
				<tbody style = 'border:1px solid black'>

				<?php
					include_once("../dB_conexion/conexion.php");
					include_once("../utilities/tabla.php");

					$sqlcom = "SELECT * FROM agenda ";
					$sqlej = mysqli_query($db_conn,$sqlcom);
					$sqlres = mysqli_fetch_array($sqlej);

					if($sqlres){
							
						
						
						while($sqlres = mysqli_fetch_array($sqlej)){
							
							$cod = $sqlres['id_id'];
							$nom = $sqlres['nombre_id'];
							$ape = $sqlres['apellidos_id'];
							$dir = $sqlres['direccion_id'];
							$phone = $sqlres['telefono_id'];
							$mail = $sqlres['email_id'];
					
								echo" <tr style = 'border:1px solid black'>

											<td style = 'border:1px solid black'>".$nom." </td>
											<td style = 'border:1px solid black'>".$ape." </td>
											<td style = 'border:1px solid black'>".$dir." </td>
											<td style = 'border:1px solid black'>".$phone." </td>
											<td style = 'border:1px solid black'>".$mail."</td>
											<td><a href ='config/update.php?var=$cod'>Modificar</a></td>
											<td><a href ='config/delete.php?var=$cod'>Eliminar</a></td>
										</tr>"; 
							
						}
								
								
						}else{ echo "No hay registros";}

									
				?>	
				</tbody>

		</table>


		</div>	
		
			
			<p id="resultado"></p>
		
		<script type="text/javascript">
		
				function ver(read){
					var btn1 = document.getElementById['read'];
					var xnodoEnlace = document.getElementById['xread'].click;
						if (btn1.style.display = 'none'){
							btn1.style.display = 'block';
						}else{btn1.style.display = 'none' }
					
				}
				
		
			

		</script>	
		
			
	
	</body>
	



</html>