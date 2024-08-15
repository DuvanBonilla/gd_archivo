<?php

include 'conexion.php';

class RazonSocial
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerRazonesSociales()
    {
        $consulta = 'SELECT Idrazon, Descripcion FROM tbl_razonsoc';
        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            exit('Error en la consulta: '.mysqli_error($this->conexion));
        }

        $razonesSociales = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $razonesSociales[] = $fila;
        }

        return $razonesSociales;
    }
}

// Crear una instancia de la conexión
$conexion = (new Conexion())->conMysql();

// Crear una instancia de la clase RazonSocial y obtener los datos
$razonSocialClass = new RazonSocial($conexion);
$razonesSociales = $razonSocialClass->obtenerRazonesSociales();

// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $razonesSociales;
