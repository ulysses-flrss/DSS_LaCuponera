<?php

use UsuarioController as GlobalUsuarioController;

use function PHPSTORM_META\map;

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
            var_dump($result);  
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
        $correo = isset($_POST['correo'])?$_POST['correo']:'';
        $password = isset($_POST['password'])?$_POST['password']:'';
        $passwordConf = isset($_POST['passwordConfirm'])?$_POST['passwordConfirm']:'';
        $dui = isset($_POST['dui'])?$_POST['dui']:'';
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:'';
        $apellido = isset($_POST['apellido'])?$_POST['apellido']:'';
        $telefono = isset($_POST['telefono'])?$_POST['telefono']:'';
        $codEmpresa = isset($_POST['codEmpresa'])?$_POST['codEmpresa']:'';
        $codRol = isset($_POST['codRol'])?$_POST['codRol']:'';
 

        $this->usuario->setCorreo($correo);

        if ($password === $passwordConf) {
            //Aqui pone el codigo para encriptar la contraseña
            $this->usuario->setPassword($password);
        } else {
            return "CONTRASEÑAS DIFERENTES";
        }

        $this->usuario->setDui($dui);
        $this->usuario->setNombres($nombre);
        $this->usuario->setApellidos($apellido);
        $this->usuario->setTelefono($telefono);
        $this->usuario->setCodEmpresa($codEmpresa);
        $this->usuario->setCodRol($codRol);

        try {
            $result = $this->usuario->validarRegistro(
                null,
                $this->usuario->getCorreo(),
                $this->usuario->getPassword(),
                $this->usuario->getDui(),
                $this->usuario->getNombres(),
                $this->usuario->getApellidos(),
                $this->usuario->getTelefono(),
                null,
                $this->usuario->getCodRol()
            );
        } catch(Exception $e) {
            echo "
                <script>
                    alert(".$e->getMessage().")
                </script>
            ";
        }


        if ($result == "OK") {
            // Redireccion a Pagina Index
            require_once(VIEW_PATH.'viewLogin.php');
        } else {
            // Mostrar mensaje de error de autentificación   
            var_dump($result);  
            require_once(VIEW_PATH.'viewRegister.php');
        }  
    }

    public function logout () {
        session_start();
        session_destroy();
        require_once(VIEW_PATH.'viewLogin.php');
    }

}

    
    
    

?>