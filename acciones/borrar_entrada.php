<?php
include_once '../includes/conexion.php';
$id = $_GET['id'];

$consulta = "delete from entradas where id=$id";
$guardar = mysqli_query($conexion, $consulta);
    if($guardar){
        
        $_SESSION['eliminar'] = "entrada eliminada";
        
    } else{
        
        $_SESSION['eliminar'] = "error al eliminar la entrada";
        
    }
    
    header('location:../mis_entradas.php');