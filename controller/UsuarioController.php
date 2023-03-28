<?php

use UsuarioController as GlobalUsuarioController;

include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php');
require_once(MODEL_PATH.'classUsuario.php');
require_once(MODEL_PATH.'classValidaciones.php');



class UsuarioController {

    private $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
        $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:'';
        $redireccion = isset($_REQUEST['redireccion'])?$_REQUEST['redireccion']:'';
        if($redireccion == "register") {
            //var_dump($redireccion);
            require_once(VIEW_PATH."viewRegister.php");
        } else if($redireccion == "login") {
            require_once(VIEW_PATH."viewLogin.php");
        } else {
            if ($accion == '' || $accion == "logout") {
                $this->index();
            } else if ($accion == 'login') { 
                $this->login();
            } else if ($accion == 'register') {
                $this->register();
            }
        }
    }

    public function index() {
        require_once(VIEW_PATH."viewLogin.php");
    }

    public function login () {
        $correo = isset($_POST['correo'])?$_POST['correo']:'';
        $password = isset($_POST['password'])?$_POST['password']:'';
        
        $this->usuario->setCorreo($correo);
        $this->usuario->setPassword($password);
        
        $result = $this->usuario->validarCorreoPassword($this->usuario->getCorreo(), $this->usuario->getPassword());
        if ($result == "OK") {
            // Redireccion a Pagina Index
            require_once(VIEW_PATH.'viewOfertas.php');
        } else {
            // Mostrar mensaje de error de autentificación   
            require_once(VIEW_PATH.'viewLogin.php');

            // echo "<script>
            // Swal.fire({
            //     icon: 'error',
            //     title: 'Oops...',
            //     text: 'Something went wrong!',  
            //   })
            // </script>";
        }        
    }

    public function register() {
        
        //Debes setear lo que te mandara el usuario
        //$correo = isset($_POST['correo'])?$_POST['correo']:''; ASI
                
    }

    public function logout () {
        session_start();
        session_destroy();
        require_once(VIEW_PATH.'viewLogin.php');
    }
}

    
    
    

?>