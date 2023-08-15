<?php
    class Database { 
        public $db;   // handle of the db connexion    
        private static $dns = "mysql:host=localhost;dbname=colegio"; 
        private static $user = "root"; 
        private static $pass = "hm_pbeach*";     
        private static $instance;

        public function __construct ()  
        {        
            $this->db = new PDO(self::$dns,self::$user,self::$pass);       
        } 

        // Se crea la instancia de la clase Database.
        // Se instancia la clase para iniciarla y poder acceder a las propiedades.
        public static function getInstance()
        { 
            if(!isset(self::$instance)) 
            { 
                $object= __CLASS__; 
                self::$instance=new $object; 
            } 
            return self::$instance; 
        } 


        public function DatosEstudiantes() { 
            $conexion = Database::getInstance(); 
            $sql  ="SELECT id,identificacion,nombres,apellidos,email,telefono, acudiente, direccion, fecha_update from estudiantes ";
            $result = $conexion->db->prepare($sql);    
            $result->execute(); 
            return $result; 
        } 

        public function CrearEstudiante($identificacion,$nombres,$apellidos,$email,$telefono,$acudiente,$direccion) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("INSERT INTO estudiantes (identificacion,nombres,apellidos,email,telefono,acudiente,direccion) VALUES (:identificacion,:nombres,:apellidos,:email,:telefono,:acudiente,:direccion)");
                $result->execute(
                                    array(
                                        ':identificacion'=>$identificacion,
                                        ':nombres'=>$nombres,
                                        ':apellidos'=>$apellidos,
                                        ':email'=>$email,
                                        ':telefono'=>$telefono,
                                        ':acudiente'=>$acudiente,
                                        ':direccion'=>$direccion
                                    )
                                );
                return "2";
            } catch(PDOException $e) {
                return "0";
            }
        }

        public function editEstudiante($id) { 
            $conexion = Database::getInstance(); 
            $sql="SELECT id,identificacion,nombres,apellidos,email,telefono, acudiente, direccion, fecha_update  from estudiantes where id=:id"; 
            $result = $conexion->db->prepare($sql);     
            $params = array("id" => $id); 
            $result->execute($params);
            return $result; 
        } 

        public function updateEstudiante($id,$nombres,$apellidos,$email,$telefono,$identificacion, $direccion, $acudiente, $fecha_update) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("UPDATE estudiantes set nombres=:nombres,apellidos=:apellidos,email=:email,telefono=:telefono,identificacion=:identificacion, direccion=:direccion, acudiente=:acudiente ,fecha_update=:fecha_update where id=:id ");
                $result->execute(
                                    array(
                                        ':nombres'=>$nombres,
                                        ':apellidos'=>$apellidos,
                                        ':email'=>$email,
                                        ':telefono'=>$telefono,
                                        ':identificacion'=>$identificacion,
                                        ':acudiente'=>$acudiente,
                                        ':direccion'=>$direccion,
                                        ':fecha_update'=>$fecha_update,
                                        ':id'=>$id
                                    )
                                );
                return "3";
            } catch(PDOException $e) {
                return "0";
            }
        }
        
        public function EliminarEstudiante($id){
            try{
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("DELETE FROM estudiantes WHERE id=$id");
                $result->execute(array($id));

                return "1";
            }catch (PDOException $e) {
                return "0";
            }
        }


        public function DatosMaterias() { 
            $conexion = Database::getInstance(); 
            $sql="SELECT id,nombre from materias"; 
            $result = $conexion->db->prepare($sql);    
            $result->execute(); 
            return $result; 
        } 

        public function EliminarMateria($id){
            try{
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("DELETE FROM materias WHERE id=?");
                $result->execute(array($id));

                return "1";
            }catch (PDOException $e) {
                return "0";
            }
        }

        public function CrearMateria($nombre) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("INSERT INTO materias (nombre) VALUES (:nombre)");
                $result->execute(
                                    array(
                                        ':nombre'=>$nombre
                                    )
                                );
                return "2";
            } catch(PDOException $e) {
                return "0";
            }
        } 

        public function editMateria($id) { 
            $conexion = Database::getInstance(); 
            $sql="SELECT id,nombre from materias where id=:id"; 
            $result = $conexion->db->prepare($sql);     
            $params = array("id" => $id); 
            $result->execute($params);
            return $result; 
        } 

        public function updateMateria($nombre,$id) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("UPDATE materias set nombre=:nombre where id=:id ");
                $result->execute(
                                    array(
                                        ':nombre'=>$nombre,
                                        ':id'=>$id
                                    )
                                );
                return "3";
            } catch(PDOException $e) {
                return "0";
            }
        }

        public function EliminarNotas($estudiante) { 
            try{
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("DELETE FROM notas WHERE estudiante=?");
                $result->execute(array($estudiante));

                return "1";
            }catch (PDOException $e) {
                return "0";
            }
        } 

        public function CrearNotas($estudiante,$materia,$nota1,$nota2,$nota3,$observacion) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("INSERT INTO notas (estudiante,materia,nota1,nota2,nota3,observacion) VALUES (:estudiante,:materia,:nota1,:nota2,:nota3,:observacion)");
                $result->execute(
                                    array(
                                        ':estudiante'=>$estudiante,
                                        ':materia'=>$materia,
                                        ':nota1'=>$nota1,
                                        ':nota2'=>$nota2,
                                        ':nota3'=>$nota3,
                                        ':observacion'=>$observacion
                                    )
                                );
                return "4";
            } catch(PDOException $e) {
                return "0";
            }
        } 


        public function ConsultarCantidadNotas($estudiante) { 
            $conexion = Database::getInstance(); 
            $sql  ="SELECT id, estudiante from notas where estudiante=:estudiante";
            $result = $conexion->db->prepare($sql);     
            $params = array("estudiante" => $estudiante); 
            $result->execute($params);
            return $result; 
        } 

        public function ConsultarNotas($estudiante,$materia) { 
            $conexion = Database::getInstance(); 
            $sql  ="SELECT nota1,nota2,nota3,observacion from notas where estudiante=:estudiante and materia=:materia";
            $result = $conexion->db->prepare($sql);     
            $params = array("estudiante" => $estudiante,"materia" => $materia); 
            $result->execute($params);
            return $result; 
        } 


        public function ConsultarNotasEstudiante($estudiante,$email) { 
            $conexion = Database::getInstance(); 
            $sql   ="SELECT m.nombre as materia,nota1,nota2,nota3,observacion from notas n ";
            $sql  .="LEFT JOIN estudiantes e on (n.estudiante=e.identificacion)";
            $sql  .="LEFT JOIN materias m on (n.materia=m.id)";
            $sql  .="where estudiante=:estudiante and e.email=:email";
            $result = $conexion->db->prepare($sql);     
            $params = array("estudiante" => $estudiante,"email" => $email); 
            $result->execute($params);
            return $result; 
        }
        

    }

?>