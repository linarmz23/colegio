<?php 
    include_once("../../config/DBConect.php");
    include_once("../../config/Config.php");

    session_start();
    @$role = $_SESSION['sess_userrole'];

    $id = $_GET['id'];

    $conexion = new Database;  
    $result = $conexion->editEstudiante($id);

    $estud_fecha_update = $estud_acudiente = $estud_direccion = $estud_id = $estud_identificacion = $estud_nombres = $estud_apellidos = $estud_email = $estud_telefono = "";


    foreach($result->fetchAll(PDO::FETCH_OBJ) as $r){
        $estud_id = $r->id;
        $estud_identificacion = $r->identificacion;
        $estud_nombres = $r->nombres;
        $estud_apellidos = $r->apellidos;
        $estud_email  = $r->email;
        $estud_telefono = $r->telefono;
        $estud_direccion = $r->direccion;
        $estud_acudiente  = $r->acudiente;
        $estud_fecha_update = $r->fecha_update;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-xl-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Modificar Estudiante
                        <a href="estudiantes.php" class="btn btn-primary">Regresar</a>
                    </div>
                    <div class="card-body">
                        <form action="update.php" method="POST" name="forrol">

                            <div class="form-group">
                                <label for="identificacion">Identificacion</label>
                                <input type="text" class="form-control" id="identificacion" name="identificacion" value="<?= $estud_identificacion ?>" required>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $estud_id ?>">
                            </div>

                            <div class="form-group">
                                <label for="nombres">Nombres</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" value="<?= $estud_nombres ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $estud_apellidos ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $estud_email ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $estud_telefono ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value='<?= $estud_direccion ?>' required>
                            </div>

                            <div class="form-group">
                                <label for="acudiente">Acudiente</label>
                                <input type="text" class="form-control" id="acudiente" name="acudiente" value='<?= $estud_acudiente ?>' required>
                            </div>

                            <div class="form-group">
                                <label for="fecha_update">Última actualización</label>
                                <input type="text" class="form-control" id="fecha_update" name="fecha_update" value='<?= $estud_fecha_update ?>' required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    <div>

    <script src="../../js/javascript.js" ></script>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js" ></script>
</body>
</html>