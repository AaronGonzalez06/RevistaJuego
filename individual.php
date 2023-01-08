<?php require_once 'includes/cabecera.php'; ?>
        <!-- BARRA LATERAL -->
        <?php require_once './includes/lateral.php'; ?>
        <!-- CAJA PRINCIPAL -->
        
        <div id="principal">
            <!--<h1><?php echo $_GET['categoria'];?></h1> -->

            <article class="entrada">


            <?php $id_ent = $_GET['id'];
             $_SESSION['id_cat'] =$id_ent  ;
             $usuario_id = $_SESSION['usuario']['id'];
             $_SESSION['categoria_fav'] = $_GET['categoria'];

                  //para el if
                  $comprobar = favorito_change($conexion,$id_ent,$usuario_id);

                  if( $comprobar){
                    $prueba = mysqli_fetch_assoc($comprobar);
                    $titulo = $prueba['titulo'];
                  } else {
                      $titulo = 0;
                  };

                  //$prueba = mysqli_fetch_assoc($comprobar);
                  //echo $prueba['titulo'];
                  
                  //fin if




             $images = images($conexion,$id_ent);
            while ($img = mysqli_fetch_assoc($images)): ?>

            <h2><?=$img['titulo']?>

                <?php if( $titulo !== $img['titulo']):?>
                <spam class="icon negro"><a class="a_fav" href="fav_add.php"><spam class="text_icon">añadir fav.</spam></a> <img class="img_icon" src="img/negro.png"></spam>  

                <?php else:?>
                    <spam class="icon negro"><a class="a_fav" href="fav_delete.php"><spam class="text_icon">delete fav.</spam></a> <img class="img_icon" src="img/rojo.png"></spam> 
                <?php endif;?>
            </h2>
                
                <img class="img_notice" src='./assets/img/<?=$img['image_2']?>'/>
                <span><p><?=$img['fecha']?></p></span>
                <p><?=$img['descripcion']?></p>
                    
             <?php endwhile;?>
            </article>


            <div id="comentarios">
            <h4 class="h1_subcategoria">Comentarios</h4>
                <p id="button">Ocultar comentarios.</p>
            <?php $cometarios = comentarios($conexion,$_GET['id']);
            if($cometarios):
            while ($comentario = mysqli_fetch_assoc($cometarios)): ?>
                <div class="comentario">
                <p class="user_coment"><?=$comentario['nombre']?></p>
                <p><?=$comentario['comentario']?></p>
                </div>
             <?php endwhile;?>
                <?php else:?>
                    <p>sin comentarios</p>
                    <?php endif;?>



            <div id="add_coment">
            
            <form action="./acciones/guardar_comentario.php" method="post">
            <textarea name="comentario"></textarea>
            <?php if(isset($_SESSION['usuario']['id'])):?>
            <input name="id_user" type="hidden" value="<?=$_SESSION['usuario']['id']?>">
            <?php endif;?>
            <input name="id_entrada" type="hidden" value="<?=$_GET['id']?>">
            <input name="categoria" type="hidden" value="<?=$_GET['categoria']?>">
            <?php if(isset($_SESSION['usuario']['id'])):?>
                <input type="submit" value="Enviar">
            <?php else :?>
            <input id="aviso" type="submit" value="Enviar"  disabled="disabled">
            <?php endif;?>
            </form>
            </div>
            </div>
            <div id="dialog" title="Aviso">
  <p>Debes estar registrado para poder comentar en los articulos</p>
</div> 
           
        </div>

        <?php require_once 'includes/pie.php'; ?>