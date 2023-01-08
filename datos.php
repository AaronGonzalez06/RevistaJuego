<?php require_once './includes/cabecera.php'; ?>
<?php require_once './includes/seguridad2.php'; ?>
<?php require_once './includes/lateral.php';?>

<div id="principal">
    <h1>MIS DATOS.</h1>
            <br/>
            <?php $id=$_SESSION['usuario']['nombre']; $usuarios = usuario($conexion,$id);
            while ($usuario = mysqli_fetch_assoc($usuarios)): ?>
  <span> <strong>nombre:</strong> <?=$usuario['nombre']?> <strong>apellidos:</strong> <?=$usuario['apellidos']?> <strong>email:</strong> <?=$usuario['email']?> <strong>fecha de alta:</strong> <?=$usuario['fecha']?></span>
            <?php endwhile; ?>
    <br/><br/>
    <strong>actualizar datos.</strong>
    <form action="./acciones/actualizar.php" method="POST">
         <label for="nombre">nombre</label>
        <input type="text" name="nombre" />
         <label for="apellidos">apellidos</label>
        <input type="text" name="apellidos" />
        <label for="email">email</label>
        <input type="email" name="email" />      
        <input type="submit" value="actualizar">
    </form>
    <?php if(isset($_SESSION['errores_datos'])) :?>
    <span><?=$_SESSION['errores_datos']?></span>     
      <?php endif;?>
    <?php unset($_SESSION['errores_datos']);?>
    
        <?php if(isset($_SESSION['todo_bien'])) :?>
    <span><?=$_SESSION['todo_bien']?></span>     
      <?php endif;?>
    <?php unset($_SESSION['todo_bien']);?>
    <?php unset($_SESSION['errores_datos']);?>
</div>

<!--si se borra la web quita esto-->
 <?php  require_once './includes/pie.php'; ?>  

