<?php 

    // que es pdo en php
        namespace config;
        use Dotenv\Dotenv;
        use PDO;
        use PDOException;
        $dotenv = Dotenv::createImmutable('./');
        $dotenv->load();

        define('SERVIDOR',$_ENV['DB_HOST']);
        define('USER',$_ENV['DB_USERNAME']);
        define('PASS',$_ENV['DB_PASSWORD']);
        define('DB',$_ENV['DB_DATABASE']);
        define('PORT',$_ENV['DB_PORT']);
        
    class Conexion{

        private static $conexion;

        private static function abrir_conexion(){
            if (!isset(self::$conexion)) {
                try{
                    self::$conexion= new PDO('mysql:host='.SERVIDOR.';dbname='.DB,USER,PASS);
                    self::$conexion->exec('SET CHARACTER SET uft8');
                    return self::$conexion;
                }catch(PDOException $e){
                    echo "Error en la conexion".$e;
                    die();
                }
            }else{
                return self::$conexion;
            }
        }
        public static function obtener_conexion(){
            $conexion = self::abrir_conexion();
            return $conexion;
        }
        public static function Cerrar_conexion(){
            self::$conexion=null;
        }
    };

    // echo print_r(Conexion::obtener_conexion());

    // class CRUD{
        
    //      public static function Create($datos) {
    //     //     $create= Conexion::obtener_conexion()->prepare("INSERT INTO `T_usuarios` (`id`, `nombre`, `apellido_p`, `apellido_m`) VALUES (NULL, 'pedro', 'perez', 'sanchez')");
    //     //     if ($create->execute()) {
    //     //         echo "se a insertado corectamente";
    //     //     }else{
    //     //         echo "error al insertar";
    //     //     }
    //         $consulta= Conexion::obtener_conexion()->prepare("INSERT INTO `T_usuarios` (nombre, apellido_p, apellido_m) VALUES (:nombre, :apellido_p, :apellido_m)");
    //         if ($consulta->execute($datos)) {
    //             echo json_encode([1,"insercion correcta"]);
    //         }else{
    //             echo json_encode([0,"error al insertar datos"]);
    //         }
    //     }
    //     public static function Read() {
    //         $consulta = Conexion::obtener_conexion()->prepare("SELECT * FROM T_usuarios") ;
    //         if ($consulta->execute()) {
    //             $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
    //             echo print_r($data);
    //             echo "consulta completada";
    //         }else{
    //             echo "error al conectar";
    //         }       
    //     }
    //     private static function consulta_id($id) {
    //         $consulta = Conexion::obtener_conexion()->prepare("SELECT * FROM T_usuarios WHERE id=:id");
    //         if ($consulta->execute($id)) {
    //             $data = $consulta->fetch(PDO::FETCH_ASSOC);
    //         }else{
    //             $data = [];
    //         }   
    //         return $data;    
    //     }
    //     public static function Update($datos) {
    //     //     $update= Conexion::obtener_conexion()->prepare("UPDATE `T_usuarios` SET `nombre` = 'axelfewfasd', `apellido_p` = 'fw', `apellido_m` = 'fwa' WHERE `T_usuarios`.`id` = 1");
    //     //     if ($update->execute()) {
    //     //         echo "actualizado con exito";
    //     //     }else{
    //     //         echo "error al actualizar";
    //     //     }
    //     print_r($datos);
    //         $datos_actuales=self::consulta_id(['id'=>$datos['id']]);
    //         $datos_actuales['nombre']=array_key_exists('nombre',$datos)?$datos['nombre']:$datos_actuales['nombre'];
    //         $datos_actuales['apellido_p']=array_key_exists('apellido_p',$datos)?$datos['apellido_p']:$datos_actuales['apellido_p'];
    //         $datos_actuales['apellido_m']=array_key_exists('apellido_m',$datos)?$datos['apellido_m']:$datos_actuales['apellido_m'];
    //         echo printf($datos_actuales);
    //         $consulta= Conexion::obtener_conexion()->prepare("UPDATE T_usuarios SET nombre = :nombre, apellido_p = :apellido_p, apellido_m = :apellido_m WHERE `T_usuarios`.id = :id)");
    //         if ($consulta->execute($datos)) {
    //             echo json_encode([1,"actualizado correctamente"]);
    //         }else{
    //             echo json_encode([0,"error al actualizar datos"]);
    //         }
    //     }
    //     public static function Delete($id) {
    //     //     $delete= Conexion::obtener_conexion()->prepare("DELETE FROM T_usuarios WHERE `T_usuarios`.`id` = 3");
    //     //     if ($delete->execute()) {
    //     //         echo "eliminado con exito";
    //     //     }else{
    //     //         echo "error al eliminar";
    //     //     }
    //     $consulta= Conexion::obtener_conexion()->prepare("DELETE FROM T_usuarios WHERE id = :id");
    //     if ($consulta->execute($id)) {
    //         echo json_encode([1,"Eliminado correcta"]);
    //     }else{
    //         echo json_encode([0,"error al eliminar datos"]);
    //     }
    //     }
    // }
    
    // // CRUD::Read();

    // echo "<br>";
    // //CRUD::Create(['nombre'=>'axel','apellido_p'=>'Martinez','apellido_m'=>'Veriz']);
    // CRUD::Delete(['id'=>2])

?>