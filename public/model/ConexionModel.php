<?php

class Conexion {
    public function getConexion()
    {
        $host = "localhost";
        $database = "la_cuponera";
        $user = "root";
        $password = "";
        try {
            $dsn = "mysql:host=$host;dbname=$database";
            $dbh = new PDO($dsn, $user, $password);
            return $dbh;
        } catch (PDOException $e) {
            return "Error al conectar con la base de datos: " . $e->getMessage();
        }
    }

}

?>