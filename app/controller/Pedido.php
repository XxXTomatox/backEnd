<?php 

    namespace controller;
    use model\TablaPedido;
    require_once realpath('./vendor/autoload.php');

    class Pedido{
        public static function obtener_datos() {
            $persona = new TablaPedido();
            echo json_encode($persona->consulta());
        }
        public static function insertar_datos(){
            $persona = new TablaPedido();
            echo json_encode($persona->insercion(['nombre'=>'papas', 'precio'=>20, 'categoria'=>'comestible',] ));
        }
        public static function actualizar_datos(){
            $persona = new TablaPedido();
            echo json_encode($persona->actualizar(['precio'=>18, 'id'=>1]));
        }
        public static function eliminar_datos(){
            $persona = new TablaPedido();
            echo json_encode($persona->eliminar(['id'=>1]));
        }
    };


?>