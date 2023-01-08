<?php
include_once './includes/conexion.php';
include_once './includes/funciones.php';



$id_entrada = $_SESSION['id_cat'];
$id_usuario = $_SESSION['usuario']['id'];
$categoria = $_SESSION['categoria_fav'];
//echo $categoria;
$fav_sabe = images($conexion,$id_entrada);


$fav_arry = mysqli_fetch_assoc($fav_sabe);

//echo $fav_arry['image'];
//echo $id_usuario;

$titulo = $fav_arry['titulo'];
$descripcion = $fav_arry['descripcion']; 
$fecha = $fav_arry['fecha']; 
$image = $fav_arry['image']; 
$image_2 = $fav_arry['image_2']; 

    //insertar datos.
$sql = "insert into favoritos (id,id_entrada,id_usuario,titulo,descripcion,fecha,image,image_2,categoria) values (null,'$id_entrada','$id_usuario','$titulo','$descripcion','$fecha','$image','$image_2','$categoria');" ;
    
    $guardar = mysqli_query($conexion, $sql);
    if($guardar){
        header('location: index.php');
        
    } else {
        
        //header('location: index.php');
    };
  /*fin insertar datos*/













