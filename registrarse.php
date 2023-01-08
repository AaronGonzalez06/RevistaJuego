<?php require_once './includes/cabecera.php'; ?>
<?php require_once './includes/lateral.php'; ?>

<div id="principal">

    <?php if($_GET['inicio'] == "sesion" ):?>

        <?php require_once './includes/sesion.php'; ?>

    <?php elseif($_GET['inicio'] == "unirse"): ?>

        <?php require_once './includes/unirse.php'; ?>

    <?php endif?>

        <?php require_once './includes/pie.php'; ?>