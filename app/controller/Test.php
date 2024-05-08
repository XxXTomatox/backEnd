<?php 
namespace controller;
use model\TablaLogin;
use config\view;
require_once realpath('./vendor/autoload.php');

class Test extends View{
    public function index(){
        $datos = ["1","respuesta"];
        return parent::vista('home');
    }
    public function prueba() {
        echo "desde prueba";
    }
}
$controlador = new Test();
?>