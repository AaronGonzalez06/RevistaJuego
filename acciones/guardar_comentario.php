<?php
include_once '../includes/conexion.php';
/*
$titulo= isset($_POST['titulo']) ? $_POST['titulo'] : FALSE;
$menu= isset($_POST['menu']) ? $_POST['menu'] : FALSE;
$descripcion= isset($_POST['descripcion']) ? $_POST['descripcion'] : FALSE;*/

$comentario = $_POST['comentario'];
$id_user = $_POST['id_user'];
$id_entrada = $_POST['id_entrada'];
$categoria = $_POST['categoria'];

echo $comentario;
echo $id_user;
echo $id_entrada;
echo $categoria;


$sql = "insert into "
        . "comentarios values"
        . " (null,$id_user,$id_entrada,'$comentario');" ;


    $guardar = mysqli_query($conexion, $sql);
if($guardar){  
    $_SESSION['nueva'] = "nuevo comentario";
    echo "bine";
} else{
     $_SESSION['nueva'] = "ERROR";
     echo "mal";
}


header('location: http://localhost/udemy/proyecto-blog-con-libreria/individual.php?id='.$id_entrada.'&categoria=' . $categoria);