


        <?php if(isset($_GET['nombre'])  ):?>

<div class="slider">
<?php $sliders = cadaseccion($conexion,$_GET['nombre']);
     while ($slider = mysqli_fetch_assoc($sliders)): ?>
        
        <div>
            <img class="img_slider" src='./assets/img/<?=$slider['image']?>'/>
            <h3 class="titulo_slider" ><?=$slider['titulo']?></h3>
    </div>               
        
    <?php endwhile; ?>
</div>

<?php else: ?>

<div class="slider">
<?php $sliders = slider($conexion);
     while ($slider = mysqli_fetch_assoc($sliders)): ?>
        
        <div>
        <a href="individual.php?id=<?=$slider['id']?>&categoria=<?=$slider['categoria']?>">
            <img class="img_slider" src='./assets/img/<?=$slider['image']?>'/>
        </a>
            <h3 class="titulo_slider" ><?=$slider['titulo']?></h3>
    </div>               
        
    <?php endwhile; ?>
</div>

<?php endif;?>


