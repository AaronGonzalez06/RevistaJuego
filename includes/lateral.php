<?php require_once 'funciones.php'; ?>

<aside id="sidebar">
<div id="lo_mas_comentado">
<h3 id="titulo_coment">entradas mas comentadas.</h3>
<?php $articulos = entradas_mas_comentadas($conexion);
                 while ($articulo = mysqli_fetch_assoc($articulos)): ?>
            <article class="entrada">
            <img class='image_index' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>           
<a href="individual.php?id=<?=$articulo['entrada_id']?>&categoria=<?=$articulo['categoria']?>">
<h2 class="titulo_destacado"><?=$articulo['titulo']?></h2>
                </a>
                </div>
                <div class='clearfix'></div>
            </article>
                    
                <?php endwhile; ?>         


</div>

<div id="lo_ultimo">
<h3 id="titulo_coment_2">Lo ultimo.</h3>
<?php $articulos = lo_ultimo($conexion);
                 while ($articulo = mysqli_fetch_assoc($articulos)): ?>
            <article class="entrada">
            <img class='image_index' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>           
<a href="individual.php?id=<?=$articulo['id']?>&categoria=<?=$articulo['categoria_id']?>">
<h2 class="titulo_destacado"><?=$articulo['titulo']?></h2>
                </a>
                </div>
                <div class='clearfix'></div>
            </article>
                    
                <?php endwhile; ?>         


</div>

        </aside>