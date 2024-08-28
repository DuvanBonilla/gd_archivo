<?php
require_once("../model/conexion.php");
require_once("../model/eliminar_usuarios.php");

$archivo = $_GET["archivo"];
$cedula = $_GET["cedula"];
$carpeta = $_GET["carpeta"];
$nombre = $_GET["nombre"];
// ----------------------------------------------
$conexion = new Conexion();
$conn = $conexion->conMysql();
// ----------------------------------------------

// Verifica que la ruta no esté vacía y que el archivo exista
if (!empty($archivo) && file_exists($archivo)) {
    if (unlink($archivo)) {
        echo "El archivo ha sido eliminado exitosamente.";
        header("Location: ../view/carpetas/carpetas_archivos/consultar_datos.php?cedula=" . urlencode($cedula) . "&nombre=" .urlencode($nombre)  . "&carpeta=" . urlencode($carpeta) );
        exit; 
        } else {
        echo "Hubo un error al intentar eliminar el archivo.";
    }
} else {
    echo "El archivo no existe o la ruta es incorrecta.";
}
