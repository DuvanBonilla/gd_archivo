<?php
require_once 'conexion.php';

// Obtener la cédula del GET
$cedula = $_GET['cedula'] ?? '';

// Clase para manejar los permisos
class Permisos {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerPermisos($cedula) {
        // Consulta que une tbl_accesos y tbl_areas
        $consulta = "
            SELECT e.*, ra.Descripcion
            FROM tbl_per_empresa AS e
            JOIN tbl_razonsoc AS ra ON e.Empresa = ra.IdRazon
            WHERE e.Cedula = '$cedula'
        ";
        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            exit('Error en la consulta: ' . mysqli_error($this->conexion));
        }

        $permisos = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $permisos[] = $fila;
        }

        return $permisos;
    }

    public function obtenerEmpresas() {
        $consulta = "SELECT * FROM tbl_razonsoc";
        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            exit('Error en la consulta: ' . mysqli_error($this->conexion));
        }

        $empresas = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $empresas[] = $fila;
        }

        return $empresas;
    }
}

// Crear una instancia de la conexión
$conexion = (new Conexion())->conMysql();

// Crear una instancia de la clase Permisos y obtener los datos
$permisosClass = new Permisos($conexion);
$accesos = $permisosClass->obtenerPermisos($cedula);
$empresas = $permisosClass->obtenerEmpresas();

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Organizar los datos para la respuesta JSON
$response = [
    'cedula' => $cedula,
    'permisos' => $accesos,
    'empresas' => $empresas,
];

// Retornar los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
