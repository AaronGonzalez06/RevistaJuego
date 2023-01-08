<?php require_once './includes/cabecera.php'; ?>
        <!-- BARRA LATERAL -->
        <?php require_once './includes/lateral.php'; ?>
        <!-- CAJA PRINCIPAL -->
        
        <div id="principal">
        <h1 class="h1_subcategoria"><?=$_GET['subcategoria']?></h1>
                <?php $cate=$_GET['categoria']; $subcategoria= $_GET['subcategoria']; $articulos = subcategoria($conexion,$_GET['categoria'],$_GET['subcategoria']);
                if($articulos) :
                 while ($articulo = mysqli_fetch_assoc($articulos)): ?>
            <article class="entrada">
            <img class='imagenPrin' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>
<a href="individual.php?id=<?=$articulo['id']?>&categoria=<?=$articulo['categoria']?>">
                <h2><?=$articulo['titulo']?></h2>
                <span><?=$articulo['subcategoria']. " | ".$articulo['fecha']?></span>
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

