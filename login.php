<?php
include_once './includes/conexion.php';
include_once './includes/funciones.php';
/*variables que llegan por post*/
$email= isset($_POST['email']) ? mysqli_real_escape_string($conexion,$_POST['email']) : FALSE;
$password= isset($_POST['password']) ? mysqli_real_escape_string($conexion,$_POST['password']) : FALSE;

/*consulta bd*/
$contra_sql="select * from usuarios where email = '$email';";
$consulta_2= mysqli_query($conexion, $contra_sql);

if ($consulta_2 && mysqli_num_rows($consulta_2) == 1 ){
  
    $datusu = mysqli_fetch_assoc($consulta_2);
    
    /*comprobar la contraseña*/
    if(password_verify($password, $datusu['password'])){
        
        $_SESSION['usuario']= $datusu;
        
        if (isset($_SESSION['error_login'])){
            unset($_SESSION['error_login']);
            
        };
        
    } else {
        
       $_SESSION['error_login'] = "<div class ='alerta'>"."contraseña o usuario incorrecto"."</div>";
        
    }
    
} else {   
        $_SESSION['error_login'] = "<div class ='alerta'>"."contraseña o usuario incorrecto"."</div>";
    
}
header('location: index.php');