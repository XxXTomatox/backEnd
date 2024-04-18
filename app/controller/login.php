<?php 
    namespace controller;
    use model\TablaCategorias;
    use config\Rutes;
    use model\TablaLogin;
    require_once realpath('./vendor/autoload.php');
    session_start();

class Login{
    // public static function insertar_datos(){
    //     $persona = new TablaLogin;
    //     echo json_encode($persona->insercion(['nombre'=>'yako','email'=>'yako@gmail.com','pass'=>'test45',]));
    // }
    // public static function obtener_datos() {
    //     $persona = new TablaLogin;
    //     return $persona->consulta()->where('email','axel@gmail.com')->where('pass','test45')->first();
    // }
        public function inisiarSesion() {
            $login = new TablaLogin();
            $rute = new Rutes();
            $usuarios = $login->consulta()->where('usuario',$_POST['usuario'])->first();
            if ($usuarios) {
                if ($usuarios['password']==$_POST['password']) {
                    $_SESSION['datos_usuario']=$usuarios;
                    $rute->redirigir('home');
                }else{
                    $rute ->redirigir(('login'));
                }
            }else{
                $rute->redirigir('login');
            }
        }
};
?>