<?php 
    namespace config;
    use config\Routes;
    require_once realpath('./vendor/autoload.php');

    $router = new Routes();

    
    $router ->get("/login",['login','iniciarSesion']);
    $router ->get("/home",['home','index']);
    
    $router ->run();
?>