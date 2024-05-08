<?php 

namespace config;

class view{
    public function vista($mi_vista){
        if (file_exists('./view/'.$mi_vista.'.view.php')) {
            $mi_vista = './view/'.$mi_vista.'.view.php';
        }else {
            $mi_vista = './view/error.view.php';
        }
        // $datos;
        require_once $mi_vista;
    }
}
?>

