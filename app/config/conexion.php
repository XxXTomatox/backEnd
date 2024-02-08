<?php 

    // que es pdo en php
    require_once realpath('../../vendor/autoload.php');
        $dotenv = Dotenv\Dotenv::createImmutable('../../');
        $dotenv->load();

        define('SERVIDOR',$_ENV['DB_HOST']);
        define('USER',$_ENV['DB_USERNAME']);
        define('PASS',$_ENV['DB_PASSWORD']);
        define('DB',$_ENV['DB_DATABASE']);
        define('PORT',$_ENV['DB_PORT']);
        
    class   Conexion{
        private static $conexion;

        public static function abrir_conexion(){
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

    echo print_r(Conexion::obtener_conexion());

    class CRUD{
        
        public static function Create() {
            $create= Conexion::obtener_conexion()->prepare("INSERT INTO `T_usuarios` (`id`, `nombre`, `apellido_p`, `apellido_m`) VALUES (NULL, 'pedro', 'perez', 'sanchez')");
            if ($create->execute()) {
                echo "se a insertado corectamente";
            }else{
                echo "error al insertar";
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
        public static function Update() {
            $update= Conexion::obtener_conexion()->prepare("UPDATE `T_usuarios` SET `nombre` = 'axelfewfasd', `apellido_p` = 'fw', `apellido_m` = 'fwa' WHERE `T_usuarios`.`id` = 1");
            if ($update->execute()) {
                echo "actualizado con exito";
            }else{
                echo "error al actualizar";
            }
        }
        public static function Delete() {
            $delete= Conexion::obtener_conexion()->prepare("DELETE FROM T_usuarios WHERE `T_usuarios`.`id` = 3");
            if ($delete->execute()) {
                echo "eliminado con exito";
            }else{
                echo "error al eliminar";
            }
        }
    }
    
    CRUD::Read();
    CRUD::Create();
    
?>