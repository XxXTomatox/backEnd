<?php

require_once realpath('./vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable('./');
$dotenv->load();

echo $_ENV['mi_variable_de_entorno'];
echo "<br>";
echo $_ENV['DB_CONNECTION'];
echo "<br>";
echo $_ENV['DB_HOST'];
echo "<br>";
echo $_ENV['DB_DATABASE'];
echo "<br>";
echo $_ENV['DB_USERNAME'];
echo "<br>";
echo $_ENV['DB_PASSWORD'];
?>