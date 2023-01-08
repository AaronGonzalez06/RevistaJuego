<?php require_once './includes/cabecera.php'; ?>
        
        
        <!-- BARRA LATERAL -->
<?php require_once './includes/lateral.php'; ?>
        <!-- CAJA PRINCIPAL -->
        
        <div id="principal">
            <h1>Comentarios de <?=$_SESSION['usuario']['nombre']?></h1>
            <div id="accordion">
                <?php $articulos = mis_comentarios($conexion,$_SESSION['usuario']['id']);

                 while ($articulo = mysqli_fetch_assoc($articulos)): ?>
  <h3><?=$articulo['titulo']?></h3>
  <div>
    <p><?=$articulo['comentario']?>  <span><a href="coment_delete.php?id=<?=$articulo['id']?>">borrar</a></span></p>
  </div>
                  
                <?php endwhile; ?>        
                </div>

</div>     
        <?php require_once './includes/pie.php'; ?>