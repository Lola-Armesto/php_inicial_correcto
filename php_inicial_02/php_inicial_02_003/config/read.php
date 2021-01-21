<?php
include_once("../../dB_conexion/conexion.php");

if(isset($_POST['rmail'])){
    $rmail=$_POST['rmail'];

    $reg=array();
    $regc="SELECT * FROM agenda WHERE id_id = '".$rmail."'";
    $regquery=mysqli_query($db_conn,$regc);
    $resquery=mysqli_fetch_array($regquery);

    while($resquery=mysqli_fetch_array($regquery)){
    $c1 = $resquery['nombre_id'];
    $c2 = $resquery['apellidos_id'];
    $c3 = $resquery['direccion_id'];
    $c4 = $resquery['telefono_id'];
    $c5 = $resquery['email_id'];

    $reg[]=array("name"=>$c1,"surname"=>$c2,"direction"=>$c3,"phone"=>$c4,"mail"=>$c5);
    }
    $regson = json_encode($reg);
    die ($regson);


}
if (isset($_POST[''])){
$archivo=array();
$consulta="SELECT * FROM agenda";
$cquery=mysqli_query($db_conn,$consulta);
$rquery=mysqli_fetch_array($cquery);

while($rquery=mysqli_fetch_array($cquery)){
    $name=$rquery['nombre_id'];
    $surname=$rquery['apellidos_id'];
    $dir=$rquery['direccion_id'];
    $phone=$rquery['telefono_id'];
    $mail=$rquery['email_id'];

    $archivo[]=array("name"=>$name,"surname"=>$surname,"direction"=>$dir,"phone"=>$phone,"mail"=>$mail);
}
$jsonObj = json_encode($archivo);
//echo $jsonObj;
die(json_encode($archivo));}
?>