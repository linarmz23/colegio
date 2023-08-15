<?php
    session_start();
    include_once("../../config/DBConect.php");
    include_once("../../config/Config.php");    

    if(isset($_POST['nombre']))      $nombre = $_POST['nombre']; 

    $conexion = new Database;  
    $result = $conexion->CrearMateria($nombre);

    header("Location: materias.php?mensaje=".$result);

?>