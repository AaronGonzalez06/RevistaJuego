<?php require_once './includes/cabecera.php'; ?>
<?php require_once './includes/lateral.php'; ?>
        

        <!-- CAJA PRINCIPAL -->
        
        <div id="principal">
        <h1 class="h1_subcategoria">RESULTADO DE LA BUSQUEDA</h1>



                <?php $articulos = buscador_mejorado($conexion,$_POST['titulo']);
                    if($articulos):
                      echo "<div id='div_select'>";
                      echo "<button id='button_todo' type='button select_click'>todo</button>";

                      echo "<button id='button_noticias' type='button select_click'>Noticias</button>";

                      echo "<button id='button_analisis' type='button select_click'>Analisis</button>";

                      echo "<button id='button_reportajes' type='button select_click'>Reportajes</button>";

                      echo "<button id='button_guias' type='button select_click'>Guias</button>";
                      echo "</div>";

                 while ($articulo = mysqli_fetch_assoc($articulos)): ?>
            <article class="entrada action_<?=$articulo['subcategoria']?> ">
            <img class='seach_imagenPrin' src='./assets/img/<?=$articulo["image"]?>'/>
            <div class='boceto'>
<a href="individual.php?id=<?=$articulo['id']?>&categoria=<?=$articulo['nombre']?>">
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
                        <img src="./assets/img/joker.jpg"/>
            <h1>NINGUN RESULTADO.</h1>
                    <?php endif;?>         
        </div>
        </div>

        <?php require_once './includes/pie.php'; ?>