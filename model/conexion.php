<?php

class Conexion
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'gd_archivo';

    public function conMysql()
    {
        $connection = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($connection->connect_error) {
            exit('conexión fallida: '.$connection->connect_error);
        }

        return $connection;
    }

    public function cerrarConexion($connection)
    {
        $connection->close();
    }
}
