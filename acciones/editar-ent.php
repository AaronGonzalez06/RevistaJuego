<?php
include_once '../includes/conexion.php';

$titulo= isset($_POST['titulo']) ? $_POST['titulo'] : FALSE;
$menu= isset($_POST['menu']) ? $_POST['menu'] : FALSE;
$descripcion= isset($_POST['descripcion']) ? $_POST['descripcion'] : FALSE;
$titulo_viejo = $_SESSION['titulo_viejo'];
$sql = "update entradas set titulo='$titulo', descripcion='$descripcion',categoria_id=$menu where titulo='$titulo_viejo'" ;


    $guardar = mysqli_query($conexion, $sql);
if($guardar){  
    $_SESSION['editar'] = "entrada actualizada. ";

} else{
     $_SESSION['editar'] = "ERROR";
}


header('location:../mis_entradas.php');