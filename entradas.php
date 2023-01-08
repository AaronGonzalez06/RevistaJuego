<?php require_once './includes/cabecera.php'; ?>
<?php require_once './includes/seguridad2.php'; ?>
<?php require_once './includes/lateral.php';?>

<div id="principal">
    <h1>CREAR ENTRADAS.</h1>
    
    <form action="./acciones/guardar-ent.php" method="POST">
        <label for="titulo">TITULO.</label>
        <input type="text" name="titulo" />
        <label for="descripcion">DESCRIPCIÓN.</label>
        <textarea name="descripcion" rows="8" cols="74"></textarea><br/><br/>
        <strong>Selecciona categoria.</strong>
        <select name="menu">
         <?php $categorias = categoria($conexion);
         while ($categoria = mysqli_fetch_assoc($categorias)): ?>
        <option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>
        <?php endwhile; ?>
        </select>
        <input type="submit" value="crear">
    </form>
   <?php  if(isset($_SESSION['nueva'])) : ?>
   <strong>  <?php echo $_SESSION['nueva']?> </strong>
    <?php endif;?>
</div>
<?php unset($_SESSION['nueva'])?>

<!--si se borra la web quita esto-->
 <?php  require_once './includes/pie.php'; ?>  