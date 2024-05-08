<?php
namespace config;
require_once realpath('./vendor/autoload.php');

class Routes{
    private const SERVER = "http://localhost:8888/";
    private const DEP_IMG = self::SERVER . "public/img/";
    private const DEP_JS = self::SERVER . "public/js/";
    private const DEP_CSS = self::SERVER . "public/css/";
    private const ERROR = ['Error','index'];

    private $controller;
    private $methdo;
    private $routers=[];
    private $directorio =[];
    private $importacion;

    public function __construct(){
        $this->importacion;
    } 
    function enlace($ruta){
        return self::SERVER.$ruta;
    }

    function dep_js($archivo){
        return self::DEP_JS.$archivo.'.js';
    }
    function dep_css($archivo){
        return self::DEP_CSS.$archivo.'.css';
    }
    function dep_img($archivo){
        return self::DEP_IMG.$archivo.'.css';
    }
    function redirigir($ruta){
        echo '<script> window.location="/'.$ruta.'"; </script>' ;
    }
        
    public function get($ruta,$metodo) {
        $ruta_final = trim($ruta,'/');
        $this->directorio['$_GET'][$ruta_final]=$metodo;
    }

    public function post($ruta,$metodo) {
        $ruta_final = trim($ruta,'/');
        $this->directorio['$_POST'][$ruta_final]=$metodo;
    }
    public function delete($ruta,$metodo) {
        $ruta_final = trim($ruta,'/');
        $this->directorio['$_DELETE'][$ruta_final]=$metodo;
    }

    public function match_route($ruta,$methdo) {
        if (preg_match('/[a-zA-Z0-9_-]\/[a-zA-Z0-9_-]/',$ruta)) {
            $this->directorio=explode('/',$ruta);
            $this->controller= array_key_exists($this->directorio[0],$this->routers[$methdo])?
            $this->routers[$methdo][$this->directorio[0]]:self::ERROR;
        }else{
            $this->controller=array_key_exists($ruta,$this->routers[$methdo])?$this->routers[$methdo][$ruta]:self::ERROR;
        }
        $this->methdo=$this->controller[1];
        require_once './app/controller/'.$this->controller[0].'.php';
        $this->importacion=$controlador;
    }

    function run(){   
        $ruta = $_SERVER['REQUEST_URI'];
        $ruta = trim($ruta,'/');
        $this->match_route($ruta,$_SERVER['REQUEST_METHOD']);
        $metodo = $this->methdo;
        
        $this->importacion->$metodo();
    }   
}

?>