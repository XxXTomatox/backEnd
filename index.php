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


$host = $_ENV['DB_HOST'];
$database = $_ENV['DB_DATABASE'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

$conexion = mysqli_connect($host, $username, $password, $database);

if ($conexion) {
    echo "Conexión exitosa";   
}else{
    die("Error de conexión");
}
?>