<?php 

namespace controller;
use config\view;

class Error extends View{
    public function index() {
        return parent::vista('error');
    }
}
$controlador = new Error();
?>