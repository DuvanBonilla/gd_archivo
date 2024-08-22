<?php
require_once 'conexion.php';

$cedula = $_SESSION["cedula"];
class Permisos
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerPermisos($cedula)
    {
        $consulta = "SELECT * FROM tbl_accesos WHERE Cedula = '$cedula'";
        
        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            exit('Error en la consulta: '.mysqli_error($this->conexion));
        }

        $cedula = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $cedula[] = $fila;
        }

        return $cedula;
    }
}

// Crear una instancia de la conexión
$conexion = (new Conexion())->conMysql();
// Crear una instancia de la clase Permisos y obtener los datos
$empleadosClass = new Permisos($conexion);
$permiso = $empleadosClass->obtenerPermisos($cedula);

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $permiso;
