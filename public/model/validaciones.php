<?php 
class Validacion {
// Validaciones USUARIO
    public static function isCorreo ($correo) {
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
            return "OK";
        } else {
            return "El email ingresado, tiene un formato incorrecto";
        }

    }

    public static function isDui($dui) {
        $regExp = "/^\d{8}-\d$/";
        if(preg_match($regExp, $dui)) {
            return "OK";
        } else {
            return "El DUI ingresado, tiene un formato incorrecto";
        }
    }

    public static function isTexto($text) {
        $regExp = "/^\w\s+$/";
        if (preg_match($regExp, $text)) {
            return "OK";
        } else {
            return "El campo debe incluir unicamente texto";
        }
    }

    public static function isNombres($text) {
        $regExp = "/^\w+$/";
        if (preg_match($regExp, $text)) {
            return "OK";
        } else {
            return "El campo Nombres debe incluir unicamente texto";
        }
    }

    public static function isApellidos($text) {
        $regExp = "/^\w+$/";
        if (preg_match($regExp, $text)) {
            return "OK";
        } else {
            return "El campo Apellidos debe incluir unicamente texto";
        }
    }

    public static function isNumber($number) {
        $regExp = "/^\d+$/";
        if (preg_match($regExp, $number)) {
            return "OK";
        } else {
            return "El campo debe incluir unicamente números";
        }
    }

    public static function isTelefono($telefono) {
        $regExp = "/^\d{4}-\d{4}$/";
        if (preg_match($regExp, $telefono)) {
            return "OK";
        } else {
            return "El telefono ingresado, tiene un formato incorrecto";
        }
    }

    public static function isCodEmpresa($codEmpresa) {
        $regExp = "/^\w{3}\d{3}$/";
        if (preg_match($regExp, $codEmpresa)) {
            return "OK";
        } else {
            "El formato del codigo de empresa es incorrecto";
        }
    }

    public static function isNumTarjeta($numTarjeta) {
        $regExp = "/^(4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13})$/";
        if (preg_match($regExp, $numTarjeta)) {
            return "OK";
        } else {
            "El formato del numero de tarjeta es incorrecto";
        }
    }
    
    public static function isFechaExpi($fecha) {
        $regExp = "/^(0[1-9]|1[0-2])\/\d{2}$/";
        if (preg_match($regExp, $fecha)) {
            return "OK";
        } else {
            "El formato de fecha es incorrecto";
        }
    }
    public static function isCVV($cvv) {
        $regExp = "/^\d{3}$/";
        if (preg_match($regExp, $cvv)) {
            return "OK";
        } else {
            "El formato del numero de tarjeta es incorrecto";
        }
    }
    
}

?>
