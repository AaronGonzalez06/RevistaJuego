<?php require_once './includes/cabecera.php'; ?>
<?php require_once './includes/seguridad2.php'; ?>
<?php require_once './includes/lateral.php';?>
<?php $_SESSION['titulo_viejo']=$_GET['titulo'];?>
<div id="principal">
    <h1>editar entrada con titulo:<?php if(isset($_GET['titulo'])){echo $_GET['titulo'];}?> </h1>
    
    <form action="./acciones/editar-ent.php" method="POST">
        <label for="titulo">TITULO.</label>
        <input type="text" name="titulo" placeholder="<?php if(isset($_GET['titulo'])){echo $_GET['titulo'];}?>" />
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
   <?php  if(isset($_SESSION['editar'])) : ?>
   <strong>  <?php echo $_SESSION['editar']?> </strong>
    <?php endif;?>
</div>
<?php unset($_SESSION['editar'])?>

<!--si se borra la web quita esto-->
 <?php  require_once './includes/pie.php'; ?>  