<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php');
require_once(MODEL_PATH.'classConexion.php');
class Usuario
{
// Atributos
    private $cod_usuario;
    private $usuario;
    private $correo;
    private $password;
    private $dui;
    private $nombres;
    private $apellidos;
    private $telefono;
    private $cod_empresa;
    private $cod_rol;

//Getters y Setters
    public function getCodUsuario() {
        return $this->cod_usuario;
    }

    public function setCodUsuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;

        return $this;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getdui()
    {
        return $this->dui;
    }

    public function setdui($dui)
    {
        $this->dui = $dui;

        return $this;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCodEmpresa()
    {
        return $this->cod_empresa;
    }

    public function setCodEmpresa($cod_empresa)
    {
        $this->cod_empresa = $cod_empresa;

        return $this;
    }

    public function getCodRol()
    {
        return $this->cod_rol;
    }

    public function setCodRol($cod_rol)
    {
        $this->cod_rol = $cod_rol;

        return $this;
    }

// Metodos
    public function validarCorreoPassword($_correo, $_password) {
        $sql = "SELECT correo, password FROM usuarios WHERE correo=? AND password=?";
        $conn = new Conexion();
        $dbh = $conn->getConexion();
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(1, $_correo);
            $stmt->bindParam(2, $_password);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                return "OK";                
            } else {
                return "Error al iniciar la cuenta";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function validarRegistro () { // pasale por parametros todos los campos que va llenar el usuario CLIENTE
        // Basate en la función validarCorreoPassword para INSERTar los nuevos datos en la DB
        $sql = ""; //Tu sentencia SQL
        $conn = new Conexion();
        $dbh = $conn->getConexion();
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(1, $_correo); //con la funcion bindParam le vas pasando los parametros (asi como en POO con el PreparedStatement)
            $stmt->bindParam(2, $_password);
            ($stmt->execute()) ? true : false;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
