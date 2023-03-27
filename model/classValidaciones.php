<?php 
class Validacion {
// Validaciones USUARIO
    public static function isCorreo ($correo) {
        $regExp = "/^\w+\@\w+\.\w+$/";
        preg_match($regExp, $correo) ? true : false;
    }

    public static function isDui($dui) {
        $regExp = "/^\d{8}-\d$/";
        preg_match($regExp, $dui) ? true : false;
    }

    public static function isTexto($text) {
        $regExp = "/^\w+$/";
        preg_match($regExp, $text) ? true : false;
    }

    public static function isNumber($number) {
        $regExp = "/^\d+$/";
        preg_match($regExp, $number) ? true : false;
    }

    public static function isTelefono($telefono) {
        $regExp = "/^\d{4}-\d{4}$/";
        preg_match($regExp, $telefono) ? true : false;
    }

    public static function isCodEmpresa($codEmpresa) {
        $regExp = "/^\w{3}\d{3}$/";
        preg_match($regExp, $codEmpresa) ? true : false;
    }
    
}

?>
