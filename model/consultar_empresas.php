<?php

include 'conexion.php';

class Empresas
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerEmpresas()
    {
        $consulta = 'SELECT Idrazon,Descripcion FROM tbl_razonsoc';
        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            exit('Error en la consulta: '.mysqli_error($this->conexion));
        }

        $empresa = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $empresa[] = $fila;
        }

        return $empresa;
    }
}

// Crear una instancia de la conexión
$conexion = (new Conexion())->conMysql();

// Crear una instancia de la clase proveedores y obtener los datos
$result = new Empresas($conexion);
$empresa = $result->obtenerEmpresas();

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $empresa;
