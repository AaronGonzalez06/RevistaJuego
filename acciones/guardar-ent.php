<?php
include_once '../includes/conexion.php';

$titulo= isset($_POST['titulo']) ? $_POST['titulo'] : FALSE;
$menu= isset($_POST['menu']) ? $_POST['menu'] : FALSE;
$descripcion= isset($_POST['descripcion']) ? $_POST['descripcion'] : FALSE;
$id= $_SESSION['usuario']['id'];
echo $id;

$sql = "insert into "
        . "entradas values"
        . " (null,$id,'$menu','$titulo','$descripcion',curdate());" ;


    $guardar = mysqli_query($conexion, $sql);
if($guardar){  
    $_SESSION['nueva'] = "nueva publicación ";
} else{
     $_SESSION['nueva'] = "ERROR";
}


header('location:../entradas.php');