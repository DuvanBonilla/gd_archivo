<?php

session_start(); 

if (!isset($_GET['archivo']) || !isset($_GET['carpeta']) || !isset($_GET['subcarpeta'])) {
    echo 'Archivo, carpeta o subcarpeta no especificados.';
    exit;
}

if (isset($_GET['nombre'])) {
    $_SESSION['nombre'] = $_GET['nombre'];
}

$nombreArea = $_SESSION['nombre'];
$idEmpresa = $_SESSION["idEmpresa"];

$Empresas = [
    1 => 'Cargoban',
    2 => 'Oceanix',
    3 => 'Solutempo',
    4 => 'Cargoban_SAS',
    5 => 'Agencia_de_Aduanas',
    6 => 'Fundacion_Cargoban',
    7 => 'Tase',
    8 => 'Opyservis',
    9 => 'Tierra_Grata',
    10 => 'Bananova',
    11 => 'Gira',
    12 => 'Palmonte',
    13 => 'Principio_Comercial'
];

// Verifica que el ID de la empresa sea válido
if (!isset($Empresas[$idEmpresa])) {
    echo 'ID de empresa no válido.';
    exit;
}

$nombreEmpresa = $Empresas[$idEmpresa];

// Filtra los parámetros de entrada
$archivo = basename($_GET['archivo']); 
$carpeta = basename($_GET['carpeta']);
$subcarpeta = basename($_GET['subcarpeta']);

// Define la ruta base de acuerdo con la empresa seleccionada
$rutaBase = "R:\\Gestion_Docu\\$nombreEmpresa\\$nombreArea\\";

// Construye la ruta completa del archivo
$rutaArchivo = realpath("$rutaBase/$carpeta/$subcarpeta/$archivo");

// Verifica que el archivo exista y que esté dentro del directorio permitido
if ($rutaArchivo && file_exists($rutaArchivo) && strpos($rutaArchivo, realpath($rutaBase)) === 0) {
    // Obtiene el tipo MIME del archivo
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $rutaArchivo);
    finfo_close($finfo);

    // Establece el tipo de contenido y envía el archivo al navegador
    header('Content-Type: '.$mime);
    header('Content-Disposition: inline; filename="'.basename($archivo).'"');
    readfile($rutaArchivo);
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El archivo no existe o no se puede acceder',
                confirmButtonColor: '#D62912',
                confirmButtonText: 'OK',
                timer: 7000
            }).then(() => {
                const area = encodeURIComponent('$area');
                location.assign('../view/carpetas.php?area=' + area);
            });
        });
    </script>";;
    exit;}
