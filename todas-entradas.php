<?php require_once './includes/cabecera.php'; ?>
<?php require_once './includes/lateral.php'; ?>

<div id="principal">
                <?php $articulos = todosarticulos($conexion);
                 while ($articulo = mysqli_fetch_assoc($articulos)): ?>
            <article class="entrada">
                <a href="">
                <h2><?=$articulo['titulo']?></h2>
                
                <span><?=$articulo['categoria']. " | ".$articulo['fecha']?></span>
                <p><?=substr($articulo['descripcion'],0,250) . " ..."?></p>
                </a>
            </article>
                    
                <?php endwhile; ?>         
           
        </div>

        <?php require_once './includes/pie.php'; ?>