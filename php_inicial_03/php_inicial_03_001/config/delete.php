<?php
include ('funciones.php');
$campo_id = $_GET['var'];
$campo  = 'id_id';
$tabla = 'agenda';
delete($tabla,$campo,$campo_id);
header('location:../index.php');

?>