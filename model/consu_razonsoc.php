<?php

include 'conexion.php';

class RazonSocial
{
    private $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerRazonesSociales($zona)
    {
        $consulta = "SELECT * FROM tbl_razonsoc where Zona = '$zona' ";
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
$zona = $_SESSION["zona"];
$razonSocialClass = new RazonSocial($conexion);
$razonesSociales = $razonSocialClass->obtenerRazonesSociales($zona);
// Cerrar la conexión
(new Conexion())->cerrarConexion($conexion);

// Retornar los datos
return $razonesSociales;
