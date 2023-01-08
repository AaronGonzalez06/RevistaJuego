<?php
 include_once '../includes/conexion.php';
$nomcat= isset($_POST['nomcat']) ? $_POST['nomcat'] : FALSE;

$sql = "insert into categorias values (null,'$nomcat');" ;
$sql_mirar = "select * from categorias where nombre='$nomcat'" ;
/*mirar si esta repetida la categoria*/
$comprobar = mysqli_query($conexion, $sql_mirar);
if(mysqli_num_rows($comprobar) == 0){
    $guardar = mysqli_query($conexion, $sql);
if($guardar){  
    $_SESSION['categoria'] = "nueva categoria ". $nomcat;
} else{
     $_SESSION['categoria'] = "ERROR";
}
} else {
    
    $_SESSION['categoria'] = "ERROR";
}

header('location:../categoria.php');

