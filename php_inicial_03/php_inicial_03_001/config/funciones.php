<?php

function insert($tabla,$form_data){
    include("../db_conexion/conexion.php");
    $fields = array_keys($form_data);
    $sql = "INSERT INTO ".$tabla."(".implode(',', $fields).")  VALUES('".implode("','",$form_data)."')";
   // $sql = "INSERT INTO ".$tblname."(".implode(',', $fields).")  VALUES('".implode("','",$form_data)."')";
    $ej= mysqli_query($db_conn,$sql);
  
    return ($ej);
 
}


function select($tabla,$campo,$campo_id){
    include("../../db_conexion/conexion.php");
    $sql = "SELECT * FROM ".$tabla." WHERE ".$campo."=".$campo_id."";
    $ej = mysqli_query($db_conn,$sql);
    $GLOBALS ['row'] = mysqli_fetch_object($ej);
    
 return $sql;
}

function actualizar($tabla,$updata,$campo,$campo_id){
    include("../../db_conexion/conexion.php");
    $sql = "UPDATE  ".$tabla." SET ";
    $data = array();
     foreach($updata as $column=>$value){

         $data[] = $column."="." '".$value."'";
     }
     echo var_dump($data);
     $sql .= implode(',',$data);
     $sql .= "WHERE ".$campo." = ".$campo_id."";
     //$sql = "UPDATE $tabla SET implode(',',$data) WHERE $campo = '.$campo_id.'";
     $ej = mysqli_query($db_conn,$sql);
    
   
   if($ej){
       echo "Registro actualizado";
       return $ej;
       
   }else{echo "No se ha podido actualizar el registro";}
   
}
function delete($tabla,$campo,$campo_id){
    include("../../db_conexion/conexion.php");
    $sql = "DELETE FROM $tabla WHERE ".$campo." = ".$campo_id."";
    $ej = mysqli_query($db_conn,$sql);
    if($ej){
        echo "Registro eliminado correctamente";
       
    }else {echo "No se ha podido eliminar el registro";}
}

?>