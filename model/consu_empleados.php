<?php
include 'conexion.php';

// Verificar si las variables de sesión están definidas
if (!isset($_SESSION["zona"]) || !isset($_SESSION["idEmpresa"])) {
    exit('Error: Sesión no iniciada correctamente.');
}

$zona = $_SESSION["zona"];
$Razonsoc = $_SESSION["idEmpresa"];

class Empleados
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerEmpleados($Razonsoc, $zona)
    {
        if ($zona == 2) {
            // Consulta para la zona 2
            $consulta = "SELECT Cedula, Nombre, Empresa, Ubicacion, Fechaingreso, Fecharetiro, Estado, Carpetas 
                         FROM tbl_personas 
                         WHERE Empresa = ? AND Zona = ?";
            
            $stmt = mysqli_prepare($this->conexion, $consulta);
            if ($stmt === false) {
                exit('Error en la preparación de la consulta: '.mysqli_error($this->conexion));
            }

            mysqli_stmt_bind_param($stmt, 'si', $Razonsoc, $zona); // 'si' indica string e integer
        } else {
            // Consulta para otras zonas
            $consulta = "SELECT Cedula, Nombre, Empresa, Ubicacion, Fechaingreso, Fecharetiro, Estado, Carpetas 
            FROM tbl_personas 
            WHERE Empresa = ?";

            $stmt = mysqli_prepare($this->conexion, $consulta);
            if ($stmt === false) {
                exit('Error en la preparación de la consulta: '.mysqli_error($this->conexion));
            }

            mysqli_stmt_bind_param($stmt, 's', $Razonsoc); // 's' indica string
        }

        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if (!$resultado) {
            exit('Error en la ejecución de la consulta: '.mysqli_error($this->conexion));
        }

        $empleados = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $empleados[] = $fila;
        }

        mysqli_stmt_close($stmt); // Cierra el statement para liberar recursos
        return $empleados;
    }
}

// Crear una instancia de la conexión
$conexion = (new Conexion())->conMysql();

// Crear una instancia de la clase Empleados y obtener los datos
$empleadosClass = new Empleados($conexion);
$empleados = $empleadosClass->obtenerEmpleados($Razonsoc, $zona);

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $empleados;
