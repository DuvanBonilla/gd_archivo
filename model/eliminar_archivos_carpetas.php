<?php
session_start(); // Asegúrate de que la sesión esté iniciada
require_once("../model/conexion.php");
require_once("../model/eliminar_usuarios.php");

$idEmpresa = $_SESSION["idEmpresa"];
$nombreArea = $_GET["nombreArea"];
$archivo = $_GET["archivo"];
$carpeta = $_GET["carpeta"];
$subcarpeta = $_GET['subcarpeta'];

// Define la ruta completa del archivo
$rutasEmpresas = [
    1 => 'R:\\Gestion_Docu\\Cargoban',
    2 => 'R:\\Gestion_Docu\\Oceanix',
    3 => 'R:\\Gestion_Docu\\Solutempo',
    4 => 'R:\\Gestion_Docu\\Cargoban_SAS',
    5 => 'R:\\Gestion_Docu\\Agencia_de_Aduanas',
    6 => 'R:\\Gestion_Docu\\Fundacion_Cargoban',
    7 => 'R:\\Gestion_Docu\\Tase',
    8 => 'R:\\Gestion_Docu\\Opyservis',
    9 => 'R:\\Gestion_Docu\\Tierra_Grata',
    10 => 'R:\\Gestion_Docu\\Bananova',
    11 => 'R:\\Gestion_Docu\\Gira',
    12 => 'R:\\Gestion_Docu\\Palmonte',
    13 => 'R:\\Gestion_Docu\\Principio_Comercial'

];

if (isset($_SESSION["idEmpresa"])) {
    $idEmpresa = $_SESSION["idEmpresa"];
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'ID de la empresa no definido en la sesion',
                confirmButtonColor: '#D62912',
                confirmButtonText: 'OK',
                timer: 7000
            }).then(() => {
                 const carpeta = encodeURIComponent('$carpeta');
                 const subcarpeta = encodeURIComponent('$subcarpeta');
                location.assign('../view/ver_info_carpetas.php?carpeta=' + carpeta + '&subcarpeta=' + subcarpeta);
            });
        });
    </script>";
    exit; // Detén la ejecución si no hay empresa seleccionada
}

if (isset($rutasEmpresas[$idEmpresa])) {
    $rutaBase = $rutasEmpresas[$idEmpresa];
    $rutaArchivo = $rutaBase. "/".$nombreArea. "/". $carpeta . "/" . $subcarpeta . "/" . $archivo;
} else {
    $rutaArchivo = null; // Asegúrate de inicializarlo
}



// ----------------------------------------------
$conexion = new Conexion();
$conn = $conexion->conMysql();
// ----------------------------------------------
if (!empty($archivo) && $rutaArchivo !== null && file_exists($rutaArchivo)) {
    if (unlink($rutaArchivo)) {
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Archivo Eliminado correctamente',
                            confirmButtonColor: 'red',
                            confirmButtonText: 'OK',
                            timer: 8000
                     }).then(() => {
                            const carpeta = encodeURIComponent('$carpeta');
                            const subcarpeta = encodeURIComponent('$subcarpeta');
                            location.assign('../view/ver_info_carpetas.php?carpeta=' + carpeta + '&subcarpeta=' + subcarpeta);
                        });
                    });
                </script>";
        exit; 
    } else {
        echo "Hubo un error al intentar eliminar el archivo.";
    }
} else {
    var_dump($rutaArchivo);
    echo "El archivo no existe o la ruta es incorrecta.";
}
