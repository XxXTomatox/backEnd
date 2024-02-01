<?php

require_once realpath('./vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable('./');
$dotenv->load();

echo $_ENV['mi_variable_de_entorno'];

?>