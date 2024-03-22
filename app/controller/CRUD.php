<?php 

    namespace controller;
    use config\Conexion;
    use PDO;
    
    require_once realpath('./vendor/autoload.php');
    
    class CRUD{
        
         public static function Create($datos) {
            $consulta= Conexion::obtener_conexion()->prepare("INSERT INTO `T_usuarios` (nombre, apellido_p, apellido_m) VALUES (:nombre, :apellido_p, :apellido_m)");
            if ($consulta->execute($datos)) {
                echo json_encode([1,"insercion correcta"]);
            }else{
                echo json_encode([0,"error al insertar datos"]);
            }
        }
        public static function Read() {
            $consulta = Conexion::obtener_conexion()->prepare("SELECT * FROM T_usuarios") ;
            if ($consulta->execute()) {
                $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
                echo print_r($data);
                echo "consulta completada";
            }else{
                echo "error al conectar";
            }       
        }
        private static function consulta_id($id) {
            $consulta = Conexion::obtener_conexion()->prepare("SELECT * FROM T_usuarios WHERE id=:id");
            if ($consulta->execute($id)) {
                $data = $consulta->fetch(PDO::FETCH_ASSOC);
            }else{
                $data = [];
            }   
            return $data;    
        }
        public static function Update($datos) {
            print_r($datos);
            $datos_actuales=self::consulta_id(['id'=>$datos['id']]);
            $datos_actuales['nombre']=array_key_exists('nombre',$datos)?$datos['nombre']:$datos_actuales['nombre'];
            $datos_actuales['apellido_p']=array_key_exists('apellido_p',$datos)?$datos['apellido_p']:$datos_actuales['apellido_p'];
            $datos_actuales['apellido_m']=array_key_exists('apellido_m',$datos)?$datos['apellido_m']:$datos_actuales['apellido_m'];
            echo printf($datos_actuales);
            $consulta= Conexion::obtener_conexion()->prepare("UPDATE T_usuarios SET nombre = :nombre, apellido_p = :apellido_p, apellido_m = :apellido_m WHERE `T_usuarios`.id = :id)");
            if ($consulta->execute($datos)) {
                echo json_encode([1,"actualizado correctamente"]);
            }else{
                echo json_encode([0,"error al actualizar datos"]);
            }
        }
        public static function Delete($id) {
            $consulta= Conexion::obtener_conexion()->prepare("DELETE FROM T_usuarios WHERE id = :id");
            if ($consulta->execute($id)) {
                echo json_encode([1,"Eliminado correcta"]);
            }else{
                echo json_encode([0,"error al eliminar datos"]);
            }
        }
    }

?>