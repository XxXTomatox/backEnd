<?php 
namespace controller;
use model\TablaLogin;
require_once realpath('./vendor/autoload.php');
session_start();
class usuarios{
    public static function obtener_datos() {
        $persona = new TablaLogin;
        return $persona->consulta()->all();
    }
    public static function eliminar_datos(){
        $productos = new TablaLogin;
        return $productos->eliminar()->where('id_persona','')->get();
    }
    public static function insertar_datos(){
        $productos = new TablaLogin;
        echo json_encode($productos->insercion(['nombre'=>'', 'email'=>'', 'pass'=>'']));
    }
    public static function actualizar_datos(){
        $persona = new TablaLogin();
        return $persona->actualizar(['nombre'=>'','email'=>'','pass'=>''])->where('id_persona','')->get();
    }
}


?>