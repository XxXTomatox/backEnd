<?php
namespace config;
use controller\Usuario;

require_once realpath('./vendor/autoload.php');
class Route
{
    private const SERVER = "http://localhost:8888/";
    private const DEP_IMG = self::SERVER . "public/img/";
    private const DEP_JS = self::SERVER . "public/js/";
    private const DEP_CSS = self::SERVER . "public/css/";

    public function __construct()
    {
        define('DIRECTORIO', array(
            'home' => 'view/home.view',
            'error' => 'view/error.view',
            'login' => 'view/login/login.view',
            'registre' => 'view/login/registre.view',
            'comprobar'=> 'view/login/registre.comprobar.view',
            'logincomprobar'=> ['controller' => 'Usuarios', 'method' => 'comprobarUsuario'],
            'logout' => 'view/login/logout.view',
        ));
    } 
        


    function vista()
    {   
        session_start();
        $sesiones = new Usuario();
        $vista = isset($_REQUEST['view']) ? $_REQUEST['view'] : 'login';

        if($vista === 'home'){
            $sesiones->verificar_session();
        }elseif($vista === 'login'){
            $sesiones->inicioSession();
        }elseif($vista === 'registre'){
            $sesiones->inicioSession();
        }
        if (array_key_exists($vista, DIRECTORIO)) {
            if(is_array(DIRECTORIO[$vista])){
                require_once DIRECTORIO[$vista] . '.php';
            }else{
                $controlador = DIRECTORIO[$vista];
                $controlador = new $controlador['controller']();
                DIRECTORIO[$vista]['method']();
            }
        } else {
            require_once DIRECTORIO['error'] . '.php';
        }
    }
    function redireccion($ruta){
        $ruta_completa = self::SERVER . $ruta;
        return $ruta_completa;
    }

    function dep_js($archivo){
        return self::DEP_JS.$archivo.'.js';
    }
    function dep_css($archivo){
        return self::DEP_CSS.$archivo.'.css';
    }
    
}

?>