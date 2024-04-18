<?php 

    namespace config;

    class Dependencia{
        public static function Rutas_home(){
            define('SERVER','backend.local');
            define('DEP_IMG',SERVER."public/img/");
            define('DEP_JS',SERVER."public/js/");
            define('DEP_CSS',SERVER."public/css/");

            define('DIRECTORIO',array(
                'home'=>'view/home',
                'login'=>'view/login',
                'error'=>'view/error'
            ));
        }
    }

?>