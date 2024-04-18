<?php

    use controller\Persona;
    use controller\Productos;
    require_once realpath('./vendor/autoload.php');
    
    use config\Rutes;
    // Rutes::vista();    
    // echo print_r(Productos::insertar_datos());
    echo print_r(Productos::contar_datos());
    echo print_r("<br>");
    echo print_r("<br>");
    echo print_r(Productos::limitar_datos());
    echo print_r("<br>");
    echo print_r("<br>");
    echo print_r(Productos::registros_datos());
    echo print_r("<br>");
    echo print_r("<br>");
    echo print_r(Productos::obtener_datos());
    echo print_r("<br>");
    echo print_r("<br>");
    // echo print_r(Productos::eliminar_datos());

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
