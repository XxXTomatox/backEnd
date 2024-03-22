<?php 

    namespace controller;
    use model\TablaCategorias;
    require_once realpath('./vendor/autoload.php');

    class Pedido{
        public static function obtener_datos() {
            $persona = new TablaCategorias();
            echo json_encode($persona->consulta());
        }
        public static function insertar_datos(){
            $persona = new TablaCategorias();
            echo json_encode($persona->insercion(['nombre'=>'comestible', 'descripcion'=>'Es un producto el cual es puede consumir y tiene periodo de caducidad',] ));
        }
        public static function actualizar_datos(){
            $persona = new TablaCategorias();
            echo json_encode($persona->actualizar(['descripcion'=>'Es un producto el cual es puede consumir', 'id'=>1]));
        }
        public static function eliminar_datos(){
            $persona = new TablaCategorias();
            echo json_encode($persona->eliminar(['id'=>1]));
        }
    };


?>