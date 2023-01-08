<?php
include_once './includes/conexion.php';
include_once './includes/funciones.php';



//$id_entrada = $_SESSION['id_cat'];
$id_usuario = $_SESSION['usuario']['id'];

$id = $_GET['id'];

    //delete datos.
$sql = "delete from comentarios where id= $id and usuario_id = $id_usuario;" ;
    
    $delete = mysqli_query($conexion, $sql);
    if($delete){
        header('location: index.php');
        
    } else {
        
        //header('location: index.php');
    };
  /*fin insertar datos*/