<?php

$conexion = mysqli_connect('localhost', 'root','','blog_master');

/*
if (mysqli_connect_errno()){
    
    echo "error al conectarse a la BD ". mysqli_connect_errno();
}else {
 
    echo "todo correcto";
};*/

mysqli_query($conexion, "SET NAMEES 'utf8'");

session_start();