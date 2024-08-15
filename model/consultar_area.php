<?php

require_once 'conexion.php';

class Areas
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerAreas()
    {
        $consulta = 'SELECT *  FROM tbl_areas';
        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            exit('Error en la consulta: '.mysqli_error($this->conexion));
        }

        $areas = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $areas[] = $fila;
        }

        return $areas;
    }
}

// Crear una instancia de la conexión
$conexion = (new Conexion())->conMysql();

// Crear una instancia de la clase proveedores y obtener los datos
$result = new Areas($conexion);
$areas = $result->obtenerAreas();

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $areas;
