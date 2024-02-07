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
        public static function consutlta() {
            $consulta = Conexion::obtener_conexion()->prepare("SELECT * FROM T_usuarios") ;
            if ($consulta->execute()) {
                $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
                echo print_r($data);
                echo "consulta completada";
            }else{
                echo "error al conectar";
            }       
        }
    }
    CRUD::consutlta();

?>