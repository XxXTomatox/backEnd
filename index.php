<?php
    require_once realpath('./vendor/autoload.php');
    // Rutes::vista();    
    // echo print_r(Productos::insertar_datos());
    // echo print_r("<br>");
    // echo print_r("<br>");
    // echo print_r(Productos::contar_datos());
    // echo print_r("<br>");
    // echo print_r("<br>");
    // echo print_r(Productos::limitar_datos());
    // echo print_r("<br>");
    // echo print_r("<br>");
    // echo print_r(Productos::registros_datos());
    // echo print_r("<br>");
    // echo print_r("<br>");
    // echo print_r(Productos::obtener_datos());
    // echo print_r("<br>");
    // echo print_r("<br>");
    // echo print_r(Productos::unproducto_datos());
    // echo print_r("<br>");
    // echo print_r("<br>");
    //  echo print_r(Productos::eliminar_datos());

    // echo print_r(Persona::avg_datos());
    // echo print_r("<br>");
    // echo print_r(Persona::sum_datos());
    // echo print_r("<br>");
    // echo print_r(Persona::min_datos());
    // echo print_r("<br>");
    // echo print_r(Persona::max_datos());
    // echo print_r("<br>");
    // echo print_r(Persona::like_datos());
    // echo print_r("<br>");
    //echo print_r(Persona::actualizar_datos());
    // echo print_r("<br>");
    //echo print_r(Persona::obtener_datos());
    // echo print_r("<br>");
    //echo print_r(Persona::limitar_datos());
    // echo print_r("<br>");
    //echo print_r(Persona::contar_datos());
    // echo print_r("<br>");
    //echo print_r(Persona::eliminar_datos());
    // echo print_r("<br>");
    //echo print_r(Persona::insertar_datos());
    // echo print_r("<br>");
    // Pedido::insertar_datos();
    //probar que todo funcione bien 
//bolber dinamico el select
//crar tres tablas mas y tres conroladores y sus funciones 

//hacer un conut 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php require_once './app/config/MyRutes.php';?>
    <a href="<?=$router->enlace("login");?>">login</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>