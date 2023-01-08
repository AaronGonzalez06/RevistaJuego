<?php require_once "recaptchar/recaptchalib.php";?>
<?php require_once 'conexion.php'; ?>
<?php require_once 'funciones.php'; ?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>blog.</title> 
        <link rel="stylesheet" type="text/css" href="./assets/css/estilos.css"/>

        <link id="cambio" rel="stylesheet" type="text/css" href="" />

        <link id="cambio2" rel="stylesheet" type="text/css" href="" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!-- tabls -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <!-- tabls -->
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- BXSLIDER -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>




        <!-- JSCROL-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
        




        <!--JS GENERAL -->
        <script src="./js/main.js"></script>

        <!-- GOOGLE -->
        <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>

        <!-- libreria para scroll infinito -->
        <script src="https://unpkg.com/jscroll@2.4.1/jquery.jscroll.js"></script>

    </head>
    <body>
        
        <!-- CABECERA -->
      
        <header id="cabecera">
            <div id="logo">
                <a href="index.php">NEWSGAME</a>      
            </div>
            <div id="buscador">

            <form class="example" method="post" action="buscador.php">
            <input type="text"  name="titulo">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            
            </div>
            <div class="clearfix"></div>
            <div id="usuario">
                <img src="./assets/img/anonimo.gif" />
                <div id="info">
                <p id="user">


                <?php if (isset($_SESSION['usuario']['nombre'])):?>
                    <?=$_SESSION['usuario']['nombre']?></br>
                    <?php else:?>
                        Usuario anonimo<br/>
                        <?php endif;?>

                        <?php if (isset($_SESSION['usuario']['nombre'])):?>
                        <ul>
                        <li><a href="datos.php">mis comentarios.</a></li>
                        <a href="datos.php">Mis datos.</a>
                        <li><a href="cerrar.php">Cerrar sesión.</a></li>
                        </ul>
                            
                <?php else:?>
                    <a href="registrarse.php?inicio=sesion">iniciar sesión.</a>
                <a  href="registrarse.php?inicio=unirse">Unirse.</a>
                    <?php endif;?>
                </p>

                <div class="clearfix"></div>
                </div>
            </div>

            <div class="clearfix"></div>
            
        <!-- MENU -->  
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php $categorias = categoria($conexion);


                 while ($categoria = mysqli_fetch_assoc($categorias)): ?>
                 <li class="sub">
                     <a id="<?=$categoria['nombre']?>" href="cada-categoria.php?nombre=<?=$categoria['nombre']?>"><?=$categoria['nombre']?></a>

                     <ul class="prueba_sub">


                     <li class="_<?=$categoria['id']?>"><a href="cada-subcategoria.php?subcategoria=Noticias&categoria=<?=$categoria['nombre']?>">Noticias</a></li>
                     <li class="_<?=$categoria['id']?>"><a href="cada-subcategoria.php?subcategoria=Analisis&categoria=<?=$categoria['nombre']?>">Analisis</a></li>
                    <li class="_<?=$categoria['id']?>"><a href="cada-subcategoria.php?subcategoria=Reportajes&categoria=<?=$categoria['nombre']?>">Reportajes</a></li>
                    <li class="_<?=$categoria['id']?>"><a href="cada-subcategoria.php?subcategoria=Guias&categoria=<?=$categoria['nombre']?>">Guias</a></li>


            <!-- comentado

             -->
                    
                    </ul> <!-- final del subnivel -->
                    
                    
                </li>               
                    
                <?php endwhile; ?>
                <li>
                    <a href="favoritos.php">favoritos</a>
                </li>
                <?php if(isset($_SESSION['usuario'])):?>
                <li>
                    <a href="mis_entradas.php">Comentarios.</a>
                </li>                 
                <?php endif;?>
            </ul>
            
        </nav>
        <div class="clearfix"></div>
        </header>

        <?php require_once 'includes/slider.php'; ?>

       <!-- <div class="slider">
        <div>I am a slide.</div>
        <div>I am another slide.</div>
        </div> -->



<!--
        <nav>
        <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Quiénes somos</a>
            <ul><li><a href="">Historia</a></li>
            <li><a href="">Prensa</a></li></ul>
            </li>
        <li><a href="#">Servicios</a>
            <ul><li><a href="">Servicio 1</a></li>
            <li><a href="">Servicio 2</a></li>
            <li><a href="">Servicio 3</a></li>
            <li><a href="">Servicio 4</a></li></ul>
            </li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Contacto</a></li>
        </ul>
        </nav>-->



        <div id="contenedor">

