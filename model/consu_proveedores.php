<?php

include 'conexion.php';

class Proveedores
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerProveedores()
    {
        $consulta = 'SELECT Nit, Nombre, Fechaingreso, Carpetas FROM tbl_proveedores';
        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            exit('Error en la consulta: '.mysqli_error($this->conexion));
        }

        $proveedores = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $proveedores[] = $fila;
        }

        return $proveedores;
    }
}

// Crear una instancia de la conexión
$conexion = (new Conexion())->conMysql();

// Crear una instancia de la clase proveedores y obtener los datos
$proveedoresClass = new Proveedores($conexion);
$proveedores = $proveedoresClass->obtenerProveedores();

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $proveedores;
