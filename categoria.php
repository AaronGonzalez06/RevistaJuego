<?php require_once './includes/cabecera.php'; ?>
<?php require_once './includes/seguridad.php'; ?>
<?php require_once './includes/lateral.php';?>

<div id="principal">
    <h1>CREAR CATEGORIAS</h1>
    
    <form action="./acciones/guardar-cat.php" method="POST">
        <label for="nomcat">NUEVA CATEGORIA</label>
        <input type="text" name="nomcat" />        
        <input type="submit" value="crear">
    </form>
    <?php  if(isset($_SESSION['categoria'])) : ?>
   <strong>  <?php echo $_SESSION['categoria']?> </strong>
    <?php endif;?>
</div>
<?php unset($_SESSION['categoria'])?>


<!--si se borra la web quita esto-->
 <?php  require_once './includes/pie.php'; ?>  