<?php
require_once 'conexion.php';

$cedula = $_SESSION["cedula"];
class PermisosE
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerPermisosE($cedula)
    {
        $consulta = "SELECT * FROM tbl_per_empresa WHERE Cedula = '$cedula'";
        
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
// Crear una instancia de la clase PermisosE y obtener los datos
$empleadosClass = new PermisosE($conexion);
$permiso = $empleadosClass->obtenerPermisosE($cedula);

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $permiso;
