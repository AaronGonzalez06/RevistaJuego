<?php require_once './includes/cabecera.php'; ?>
        <!-- BARRA LATERAL -->
        <?php require_once './includes/lateral.php'; ?>
        <!-- CAJA PRINCIPAL -->
        
        <div id="principal">
                <?php $id_usuario = $_SESSION['usuario']['id']; $articulos = ver_favoritos($conexion,$id_usuario);
                if($articulos) :
                 while ($articulo = mysqli_fetch_assoc($articulos)): ?>
            <article class="entrada">
            <img class='imagenPrin' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>
<a href="individual.php?id=<?=$articulo['id_entrada']?>&categoria=<?=$articulo['categoria']?>">
                <h2><?=$articulo['titulo']?></h2>
                <span><?=$articulo['categoria']. " | ".$articulo['fecha']?></span>
                <!--<p><?=$articulo['descripcion']?></p>-->
               <p><?=substr($articulo['descripcion'],0,460) . " ... LEER MAS"?></p>
                </a>
                </div>
                <div class='clearfix'></div>
            </article>
                    
                <?php endwhile; ?>
            <?php else :?>
            <h2>NADA NUEVO AUN.</h2>
            <?php endif;?>
          
           
        </div>






























        <?php require_once './includes/pie.php'; ?>

