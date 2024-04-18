<?php 
require_once realpath('./vendor/autoload.php');
use controller\Login;

echo print_r(Login::obtener_datos());
// echo print_r(Login::insertar_datos());
// echo "estas el login";

?>