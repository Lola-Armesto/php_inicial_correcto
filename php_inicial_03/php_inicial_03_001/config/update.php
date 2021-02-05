<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
<title>Actualizar</title>
<link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="screen">
</head>
<body>
<?php
 include_once("funciones.php");
 $tabla = "agenda";
 $campo = "id_id";
 $campo_id = $_GET['var'];
 select($tabla,$campo,$campo_id);
 
?>
<label >Datos a actualizar</label>
    <form action = "" method= "POST">
    <input type = 'text' name = 'name' value ='<?php echo $row->nombre_id;?>' >
    <input type = 'text' name = 'surname' value = '<?php echo $row->apellidos_id;?>'>
    <input type = 'text' name = 'dir' value = '<?php echo $row->direccion_id;?>'>
    <input type = 'text' name = 'tel' value = '<?php echo $row->telefono_id;?>'>
    <input type = 'text' name = 'correo' value = '<?php echo $row->email_id;?>'>
	  <input type="submit" name="nsub"  value="Actualizar">
    </form>
    
    <?php
    if(isset($_POST['nsub'])){
        $updata = array("nombre_id"=>$_POST['name'],"apellidos_id"=>$_POST['surname'],"direccion_id"=>$_POST['dir'],"telefono_id"=>$_POST['tel'],"email_id"=>$_POST['correo']);
        $tabla = "agenda";
        $campo = "id_id";
        $campo_id = $_GET['var'];
       // echo $campo_id;
        actualizar($tabla,$updata,$campo,$campo_id);
        header("location:../index.php");
    }   
    ?>
    </body>
    </html>