<?php
session_start();
$_SESSION['usuario'] = null;
use UsuarioController as GlobalUsuarioController;

use function PHPSTORM_META\map;

include_once($_SERVER['DOCUMENT_ROOT'] . '/DSS_LaCuponera/config.php');
require_once(MODEL_PATH . 'classUsuario.php');
require_once(MODEL_PATH . 'classValidaciones.php');



class UsuarioController
{

    private $usuario;
    public $num_errores;
    public $errores;
    

    public function __construct()
    {
        $this->usuario = new Usuario();
        $this->errores = "";
        $this->num_errores = 0;
        $accion = isset($_REQUEST['accion']) ? $_REQUEST['accion'] : '';
        $redireccion = isset($_REQUEST['redireccion']) ? $_REQUEST['redireccion'] : '';
        if ($redireccion == "register") {
            //var_dump($redireccion);
            require_once(VIEW_PATH . "viewRegister.php");
        } else if ($redireccion == "login") {
            require_once(VIEW_PATH . "viewLogin.php");
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

    public function index()
    {
        require_once(VIEW_PATH . "viewLogin.php");
    }




    public function login () {
        $correo = isset($_POST['correo'])?$_POST['correo']:'';
        $password = isset($_POST['password'])?$_POST['password']:'';
        $valCorreo = Validacion::isCorreo($correo);

        if ($correo == '' || $password == '') {
            require_once(VIEW_PATH.'viewLogin.php');
            $this->errores .= "<p>Ningun campo puede quedar vacio</p>";
            return $this->errores;
        }

        if($valCorreo == "OK"){
            $this->usuario->setCorreo($correo);
        } else {
            require_once(VIEW_PATH.'viewLogin.php');
            // var_dump($valCorreo);
            $this->errores .= "<p>$valCorreo</p>";
            return $this->errores;
        }



        $hashed = $this->usuario->getHashedPassword($correo);
        // var_dump($hashed);
        if ($hashed == false) {
            require_once(VIEW_PATH.'viewLogin.php');
            $this->errores .= "<p>El correo no está asociado a ninguna cuenta</p>";
            return $this->errores;
        } else {
            if (password_verify($password, $hashed['password'])) {
                $usuarioActual = $this->usuario->getUsuario($this->usuario->getCorreo(), $this->usuario->getPassword());
                $_SESSION['usuario'] = $usuarioActual;
                require_once(VIEW_PATH.'viewOfertas.php');
            } else {
                require_once(VIEW_PATH.'viewLogin.php');
                $this->errores .= "<p>Usuario o Contraseña incorrectas</p>";
                return $this->errores;
            }
        }
        //echo password_hash($password, PASSWORD_DEFAULT) . "<br>" . $hashed;
        

        
    }


    public function register()
    {
        $this->errores = "";
        $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $passwordConf = isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '';
        $dui = isset($_POST['dui']) ? $_POST['dui'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $codEmpresa = isset($_POST['codEmpresa']) ? $_POST['codEmpresa'] : '';
        $codRol = isset($_POST['codRol']) ? $_POST['codRol'] : '';

        $valCorreo = Validacion::isCorreo($correo);
        $valDui = Validacion::isDui($dui);
        $valTelefono = Validacion::isTelefono($telefono);
        //Token del correo, a saber si sirve bro xd
        //$token = 'VERIFY_' . uniqid();
        //$to = $correo;
        //$titulo = 'Verificación de cuenta';
        //$mensaje = 'Su token de verificación es: ' . $token;
        //$url = 'Desde: http://localhost/DSS_LaCuponera/index.php' . "\r\n" . phpversion();

        //mail($to, $titulo, $mensaje, $url);

        //$query = "SELECT * FROM usuarios WHERE token_verificacion = '$token'";
        //$result = mysqli_query($conexion, $query);

        //if (mysqli_num_rows($result) == 1) {
            // Token válido, activar cuenta y redirigir al usuario
        //} else {
            // Token inválido, mostrar mensaje de error
        //}

            if ($correo == "" || $password == "" || $dui == "" || $nombre == "" || $apellido == "" || $telefono == "") {
                $this->num_errores++;
                $this->errores .= "<p>Ningun campo puede quedar vacio</p>";
            }

            if ($dui != "" && $valDui == "OK") {
                $this->usuario->setDui($dui);
            } else {
                $this->num_errores++;
                $this->errores .= "<p>$valDui</p>";
            }
    
            if ($telefono != "" && $valTelefono == "OK") {
                $this->usuario->setTelefono($telefono);
            } else {
                $this->num_errores++;
                $this->errores .= "<p>$valTelefono</p>";
            }
    
            if ($correo != "" && $valCorreo == "OK") {
                $this->usuario->setCorreo($correo);
            } else {
                $this->num_errores++;
                $this->errores .= "<p>$valCorreo</p>";
            }
    
            if ($password == $passwordConf) {
                $this->usuario->setPassword(password_hash($password, PASSWORD_BCRYPT));
            } else {
                $this->num_errores++;
                $this->errores .= "<p>Las contraseñas ingresadas son diferentes</p>";
            }
        
            $this->usuario->setNombres($nombre);
            $this->usuario->setApellidos($apellido);
            $this->usuario->setCodRol($codRol);
            // $this->usuario->setCodEmpresa($codEmpresa);

        

        if ($this->num_errores > 0) {
            require_once(VIEW_PATH.'viewRegister.php');
            return $this->errores;
        }

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
        } catch (Exception $e) {
            echo "
                <script>
                    alert(" . $e->getMessage() . ")
                </script>
            ";
        }


        if ($result == "OK") {
            // Redireccion a Pagina Index
            require_once(VIEW_PATH . 'viewLogin.php');
        } else {
            // Mostrar mensaje de error de autentificación   
            require_once(VIEW_PATH . 'viewRegister.php');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        require_once(VIEW_PATH . 'viewLogin.php');
    }
}
