<?php 

namespace config;
require_once './app/config/Config.php';
use config\Dependencia;

class Rutes{
    static function vista() {
        Dependencia::Rutas_home();
        $vista = isset($_REQUEST['view']) ? $_REQUEST['view'] : 'home';
        if (array_key_exists($vista,DIRECTORIO)) {
            require_once DIRECTORIO[$vista].'.view.php';
        }else{
            require_once DIRECTORIO['error'].'.view.php';
        }
    }
}

?>