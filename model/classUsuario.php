<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php');
require_once(MODEL_PATH.'classConexion.php');
class Usuario
{
// Atributos
    private $cod_usuario;
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

    public function getDui()
    {
        return $this->dui;
    }

    public function setDui($dui)
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

    public function getHashedPassword ($correo) {
        $sql = "SELECT password FROM usuarios WHERE correo=?";
        $conn = new Conexion();
        $dbh = $conn->getConexion();
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(1, $correo);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario['password'];
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }

        return $usuario['password'];
    }

    

    public function getUsuario ($correo, $password) {
        $sql = "SELECT * FROM usuarios WHERE correo=? AND password=?";
        $conn = new Conexion();
        $dbh = $conn->getConexion();
        $miUsuario = null;
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(1, $correo);
            $stmt->bindParam(2, $password);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    
                    $miUsuario = new self();
                    $miUsuario->setCodUsuario($row['cod_usuario']);
                    $miUsuario->setCorreo($row['correo']);
                    $miUsuario->setPassword($row['password']);
                    $miUsuario->setDui($row['dui']);
                    $miUsuario->setNombres($row['nombres']);
                    $miUsuario->setApellidos($row['apellidos']);
                    $miUsuario->setTelefono($row['telefono']);
                    $miUsuario->setCodEmpresa($row['cod_empresa']);
                    $miUsuario->setCodRol($row['cod_rol']);

                }
            }
            return array_values((array)$miUsuario);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

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

    public function validarRegistro ($cod_usuario, $correo, $password, $dui, $nombres, $apellidos, $telefono, $cod_empresa, $cod_rol) {       
        $sql = "INSERT INTO usuarios 
        (cod_usuario, correo, password, dui, nombres, apellidos, telefono, cod_empresa, cod_rol) 
        VALUES (:cod_usuario, :correo, :password, :dui, :nombres, :apellidos, :telefono, :cod_empresa, :cod_rol)";
        $conn = new Conexion();
        $dbh = $conn->getConexion();
        //echo $cod_usuario, $correo;
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':cod_usuario', $cod_usuario);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':dui', $dui);           
            $stmt->bindParam(':nombres', $nombres);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':cod_empresa', $cod_empresa);
            $stmt->bindParam(':cod_rol', $cod_rol);
            if ($stmt->execute()) {
                return "OK";
            } else {
                // error de autenticación
                return "Fallo de Autenticación";
            }
        } catch (Exception $e) {
             return "Error: " . $e->getMessage();
            //return var_dump($usuario);
        }
    }
}
