<?php

include_once 'conexion.php';
$zona = $_SESSION['cedula'];

class Empresas
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerEmpresas($zona)
    {
        $stmt = $this->conexion->prepare("
        SELECT e.Empresa as empresa, E.estado as estado, r.Descripcion as Descripcion, r.Idrazon
        FROM tbl_per_empresa e 
        JOIN tbl_razonsoc r ON e.Empresa = r.Idrazon
        WHERE Cedula = ?
        ");

        $stmt->bind_param('i', $zona);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if (!$resultado) {
            exit('Error en la consulta: '.mysqli_error($this->conexion));
        }

        $empresa = [];
        while ($fila = $resultado->fetch_assoc()) {
            $empresa[] = $fila;
        }

        return $empresa;
    }
}

// Crear una instancia de la conexión
$conexion = (new Conexion())->conMysql();

// Crear una instancia de la clase proveedores y obtener los datos
$result = new Empresas($conexion);
$empresa = $result->obtenerEmpresas($zona);

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $empresa;
