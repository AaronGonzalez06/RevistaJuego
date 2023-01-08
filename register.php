<?php
require_once "recaptchar/recaptchalib.php";
include_once './includes/conexion.php';
include_once './includes/funciones.php';
$nombre= isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']) : FALSE;
//$apellidos= isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion,$_POST['apellidos']) : FALSE;
$email= isset($_POST['email']) ? mysqli_real_escape_string($conexion,$_POST['email']) : FALSE;
$password= isset($_POST['password']) ? mysqli_real_escape_string($conexion,$_POST['password']) : FALSE;
$password2= isset($_POST['password2']) ? mysqli_real_escape_string($conexion,$_POST['password2']) : FALSE;
$errores = array();



/*NOMBRE*/
if (!empty($nombre) && !is_numeric($nombre)) {
    $nombre_valida=true;
    
} else {
   $nombre_valida=FALSE; 
    $errores['nombre'] ="nombre no es valida"; 
};


/*apellidos
if (!empty($apellidos) && !is_numeric($apellidos)) {
    $apellidos_valida=true;
    
} else {
   $apellidos_valida=FALSE; 
    $errores['apellidos'] ="apellidos no es valida"; 
};
*/

/*EMAIL*/
if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_valida=true;
    
}else{
    
    $email_valida=FALSE;
    $errores['email'] ="email no es valida";    
};

/*CONTRASEÑA*/
if (!empty($password)) {
    $password_valida=true;
} else{
    $password_valida=FALSE;
    $errores['password'] ="la contraseña no es valida";
    
};


/*COMPROBAR CONTRASEÑA*/
if ($password != $password2){
    $errores['noigual'] ="la contraseña no coinciden!!!";
    header('location: index.php');
    /*die();*/
};

$guardar_usuario = FALSE;





//validez del rechapchar

$secret = "6LcME8ocAAAAAGYYMe9WL03dWE6HUMBuahc-zAk3";
 $response = null;

 $reCaptcha = new ReCaptcha($secret);

 if ($_POST["g-recaptcha-response"]) {
     $response = $reCaptcha->verifyResponse(
     $_SERVER["REMOTE_ADDR"],
     $_POST["g-recaptcha-response"]
     );
  }
 

 if ($response != null && $response->success) {


    if(count($errores) == 0){
        $guardar_usuario = true;
        
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        
        
       
        //insertar datos.
        $sql = "insert into usuarios (id,nombre,email,password,fecha) values (null,'$nombre','$email','$password_segura',curdate());" ;
        
        $guardar = mysqli_query($conexion, $sql);
        if($guardar){
            $_SESSION['miembro'] = "<div class='bien'>"."bienvenido al blog ".$nombre."</div>";
            
        } else {
            
            $_SESSION['miembro'] = "error al realizar el registro. ";
           
        };
      /*fin insertar datos*/
    } else {
        
        $_SESSION['errores'] = $errores ;
        
    };
    
    header('location: index.php');

    
  } else {
    header('location: http://localhost/udemy/proyecto-blog-con-libreria/registrarse.php?inicio=unirse');
  }
//fin del rechapchar


