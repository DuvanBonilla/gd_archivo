<?php
include 'conexion.php';

class Users
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerUsers($zona)
    {
        $consulta = "SELECT u.Cedula, u.Nombre, r.Descripcion AS Rol, z.Descripcion AS Zona, u.Usuario
            FROM tbl_login u
            JOIN tbl_rol r ON u.Rol = r.Idrol
            JOIN tbl_zona z ON u.Zona = z.Idzona
            WHERE u.Zona = '$zona' ";
        
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
$zona = $_SESSION["zona"];
$users = $usersClass->obtenerUsers($zona);

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $users;
