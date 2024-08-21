<?php
include 'conexion.php';

class Users
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerUsers($Razonsoc)
    {
        $consulta = "SELECT * FROM tbl_login WHERE Razonsoc = '$Razonsoc' ";
        
        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            exit('Error en la consulta: '.mysqli_error($this->conexion));
        }

        $users = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $users[] = $fila;
        }

        return $users;
    }
}

// Crear una instancia de la conexión
$conexion = (new Conexion())->conMysql();

// Crear una instancia de la clase Empleados y obtener los datos
$usersClass = new Users($conexion);
$Razonsoc = $_SESSION["Razonsoc"];
$users = $usersClass->obtenerUsers($Razonsoc);

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $users;
