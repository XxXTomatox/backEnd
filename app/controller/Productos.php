<?php 

    namespace controller;
    use model\TablaProductos;
    require_once realpath('./vendor/autoload.php');

    class Productos{
        public static function contar_datos() {
            $productos = new TablaProductos;
            return $productos->cont('nombre')->all();
        }
        public static function insertar_datos(){
            $productos = new TablaProductos;
            echo json_encode($productos->insercion(['nombre'=>'papas', 'descripcion'=>'bolsa con aire', 'precio'=>15,] ));
        }
        public static function limitar_datos(){
            $productos = new TablaProductos;
            return $productos->limit('3')->all();
        }
        public static function registros_datos(){
            $productos = new TablaProductos;
            return $productos->limit(20)->all();
        }
        public static function obtener_datos() {
            $productos = new TablaProductos;
            return $productos->consulta()->where('nombre','papas')->first();
        }
        public static function eliminar_datos(){
            $productos = new TablaProductos;
            return $productos->eliminar()->where('id_productos','1')->get();
        }
    };


?>