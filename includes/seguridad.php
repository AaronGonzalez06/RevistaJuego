<?php
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['nombre'] !== 'aaron' ){
    header('location: index.php');
}
?>