<?php

    namespace controller;
    use model\TablaPersona;
    require_once realpath('./vendor/autoload.php');

    class Persona{
        public static function avg_datos(){
            $persona = new TablaPersona();
            return $persona->avg('id')->all(); 
        }
        public static function sum_datos(){
            $persona = new TablaPersona();
            return $persona->sum('id')->all(); 
        }
        public static function min_datos(){
            $persona = new TablaPersona();
            return $persona->min('id')->all(); 
        }
        public static function max_datos(){
            $persona = new TablaPersona();
            return $persona->max('id')->all(); 
        }
        public static function like_datos() {
            $persona = new TablaPersona();
            return $persona->like('nombre','y')->all();
        }
        public static function limitar_datos(){
            $persona = new TablaPersona();
            return $persona->limit('3')->offset('3')->all();
        }
        public static function contar_datos() {
            $persona = new TablaPersona();
            return $persona->cont('nombre')->all();
        }
        public static function obtener_datos() {
            $persona = new TablaPersona();
            return $persona->consulta()->where('nombre','yako')->where('apellido','bollas')->first();
            // echo json_encode($persona->consulta()->where('nombre','yako'));
        }
        public static function insertar_datos(){
            $persona = new TablaPersona();
            echo json_encode($persona->insercion(['nombre'=>'pollo','apellido'=>'code','email'=>'pollo_code@gmail.com']));
        }
        public static function actualizar_datos(){
            $persona = new TablaPersona();
            return $persona->actualizar(['nombre'=>'testActual','apellido'=>'testActual','email'=>'testActual@email.com'])->where('id','3')->get();
        }
        public static function eliminar_datos(){
            $persona = new TablaPersona();
            return $persona->eliminar()->where('id','5')->get();
        }

    };
?>