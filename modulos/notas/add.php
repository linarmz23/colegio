<?php 

    session_start();
    include_once("../../config/DBConect.php");
    include_once("../../config/Config.php");  

    $contador       = $_POST['identificador'];
    $estudiante     = $_POST['identificacion'];
    $idestudiante   = $_POST['idestudiante'];
    
    $conexion = new Database;  

    if(isset($_POST['BtnDelete'])){
        $eliminar = $conexion->EliminarNotas($estudiante);

        header("Location: notas.php?id=".$_POST['idestud']."&action=2");
    }else{

        $eliminar = $conexion->EliminarNotas($estudiante);

        for ($i=0; $i < $contador ; $i++) { 
            $nommateria        = $_POST['materia'.$i];
            $materia      = $_POST['idmateria'.$i];
            $nota1          = $_POST['nota1'.$i]; 
            $nota2          = $_POST['nota2'.$i]; 
            $nota3          = $_POST['nota3'.$i]; 
            $observacion    = $_POST['observacion'.$i]; 

            $conexion = new Database;  
            $result = $conexion->CrearNotas($estudiante,$materia,$nota1,$nota2,$nota3,$observacion);
        }


        header("Location: notas.php?id=".$_POST['idestud']."&action=1");
    }




?>