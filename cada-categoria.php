<?php require_once './includes/cabecera.php'; ?>
        <!-- BARRA LATERAL -->
        <?php require_once './includes/lateral.php'; ?>
        <!-- CAJA PRINCIPAL -->
        
        <div id="principal">
                <?php $seccion = $_GET['nombre']; $articulos = cadaseccion($conexion,$seccion);
                if($articulos) :
                 while ($articulo = mysqli_fetch_assoc($articulos)): ?>
            <article class="entrada">
            <img class='imagenPrin' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>
<a href="individual.php?id=<?=$articulo['id']?>&categoria=<?=$articulo['categoria']?>">
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


















        <div class="principal">

<h3  class="h1_subcategoria">Noticias</h3>

<?php  $subcategorias = contenido($conexion,'Noticias',$_GET['nombre']);
 
                 while ($articulo = mysqli_fetch_assoc($subcategorias)): ?>
            <article class="entrada">
            <img class='imagenPrin' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>
<a href="individual.php?id=<?=$articulo['id']?>&categoria=<?=$articulo['categoria_id']?>">
                <h2><?=$articulo['titulo']?></h2>
                <span><?=$articulo['categoria']. " | ".$articulo['fecha']?></span>
                <!--<p><?=$articulo['descripcion']?></p>-->
               <p><?=substr($articulo['descripcion'],0,460) . " ... LEER MAS"?></p>
                </a>
                </div>
                <div class='clearfix'></div>
            </article>
                    <?php endwhile;?>
</div>


<div class="principal">

<h3 class="h1_subcategoria">Analisis</h3>

<?php  $subcategorias = contenido($conexion,'Analisis',$_GET['nombre']);
 
                 while ($articulo = mysqli_fetch_assoc($subcategorias)): ?>
            <article class="entrada">
            <img class='imagenPrin' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>
<a href="individual.php?id=<?=$articulo['id']?>&categoria=<?=$articulo['categoria_id']?>">
                <h2><?=$articulo['titulo']?></h2>
                <span><?=$articulo['categoria']. " | ".$articulo['fecha']?></span>
                <!--<p><?=$articulo['descripcion']?></p>-->
               <p><?=substr($articulo['descripcion'],0,460) . " ... LEER MAS"?></p>
                </a>
                </div>
                <div class='clearfix'></div>
            </article>
                    <?php endwhile;?>
</div>


<div class="principal">

<h3 class="h1_subcategoria">Reportajes</h3>

<?php  $subcategorias = contenido($conexion,'Reportajes',$_GET['nombre']);
 
                 while ($articulo = mysqli_fetch_assoc($subcategorias)): ?>
            <article class="entrada">
            <img class='imagenPrin' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>
<a href="individual.php?id=<?=$articulo['id']?>&categoria=<?=$articulo['categoria_id']?>">
                <h2><?=$articulo['titulo']?></h2>
                <span><?=$articulo['categoria']. " | ".$articulo['fecha']?></span>
                <!--<p><?=$articulo['descripcion']?></p>-->
               <p><?=substr($articulo['descripcion'],0,460) . " ... LEER MAS"?></p>
                </a>
                </div>
                <div class='clearfix'></div>
            </article>
                    <?php endwhile;?>
</div>






























        <?php require_once './includes/pie.php'; ?>

