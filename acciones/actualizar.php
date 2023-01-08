<?php
include_once '../includes/conexion.php';
$apellidos= isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion,$_POST['apellidos']) : FALSE;
$nombre= isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']) : FALSE;
$email= isset($_POST['email']) ? mysqli_real_escape_string($conexion,$_POST['email']) : FALSE;
$id= $_SESSION['usuario']['id'];


/*comparar si estan vacios los campos.*/
if (empty($apellidos) || empty($nombre) || empty($email)){
    
    $_SESSION['errores_datos']=  " rellene los campos, por favor.";
}
/*fin*/
/*comprobar si existe el email*/
$comprobar = "select * from usuarios where email='$email'";
$consultar = mysqli_query($conexion, $comprobar);
if (mysqli_num_rows($consultar) != 0){
    
    $_SESSION['errores_datos']=  " email ya usandose, vuelva a poner otro.";
    goto a;
}



/*actualizar los datos.*/
    $sql = "update usuarios set "
            . "nombre='$nombre', apellidos='$apellidos', email='$email'"
            . "where id=$id" ;
    
    $guardar = mysqli_query($conexion, $sql);
    if($guardar){
        
        $_SESSION['usuario']['nombre']=$nombre;
        $_SESSION['usuario']['apellidos']=$apellidos;
        $_SESSION['usuario']['email']=$email;
        $_SESSION['todo_bien'] = "actualizado correctamente. ";
        header('location:../datos.php');
       
    } else {
        
        $_SESSION['errores_datos'] = "error al realizar la actualizacion. ";
       
    };
/*fin*/
a:
header('location:../datos.php');