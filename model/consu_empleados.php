<?php
include 'conexion.php';

class Empleados
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerEmpleados($Razonsoc)
    {
        $consulta = "SELECT Cedula, Nombre, Empresa, Ubicacion, Fechaingreso, Estado, Carpetas FROM tbl_personas WHERE Empresa = '$Razonsoc'";
        
        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            exit('Error en la consulta: '.mysqli_error($this->conexion));
        }

        $empleados = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $empleados[] = $fila;
        }

        return $empleados;
    }
}

// Crear una instancia de la conexión
$conexion = (new Conexion())->conMysql();

// Crear una instancia de la clase Empleados y obtener los datos
$Razonsoc = $_SESSION["Razonsoc"];
$empleadosClass = new Empleados($conexion);
$empleados = $empleadosClass->obtenerEmpleados($Razonsoc);

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $empleados;
