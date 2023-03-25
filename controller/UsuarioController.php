<?php

use UsuarioController as GlobalUsuarioController;

include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php');
require_once(MODEL_PATH.'classUsuario.php');

if ($_POST['login']) {
    $controller = new UsuarioController();
} else {
    echo VIEW_PATH . 'viewLogin.php';
    header("location:" . VIEW_PATH . 'viewLogin.php');
}

class UsuarioController {

    private $model;

    public function __construct()
    {
        $this->model = new Usuario();
    }

    public function login () {
        $correo = isset($_POST['correo'])?$_POST['correo']:'';
        $password = isset($_POST['password'])?$_POST['password']:'';
        $result = $this->model->validarCorreoPassword($correo, $password);

        if ($result) {
            // Redireccion a vista
        } else if (!$result) {
            // Mostrar mensaje de fallo de autenticación
        } else {
            // Mostrar mensaje de error de PDO
        }
        
    }

    public function register() {
        //Debes setear lo que te mandara el usuario
        //$correo = isset($_POST['correo'])?$_POST['correo']:''; ASI
        
    }

    public function listCupones () {

    }




}

    
    
    

?>