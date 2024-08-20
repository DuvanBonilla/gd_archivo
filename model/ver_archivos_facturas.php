<?php

// Verifica si se han pasado los parámetros necesarios
if (!isset($_GET['archivo']) || !isset($_GET['carpeta']) || !isset($_GET['subcarpeta'])) {
    echo 'Archivo, carpeta o subcarpeta no especificados.';
    exit;
}

$archivo = basename($_GET['archivo']); // Protege contra traversals
$carpeta = basename($_GET['carpeta']);
$subcarpeta = basename($_GET['subcarpeta']);

// Construye la ruta completa del archivo
$rutaBase = realpath('C:/xampp/htdocs/gd_archivo/model/carpetas/');
$rutaArchivo = realpath("$rutaBase/$carpeta/$subcarpeta/$archivo");

// Verifica que el archivo exista y que esté dentro del directorio permitido
if ($rutaArchivo && file_exists($rutaArchivo) && strpos($rutaArchivo, $rutaBase) === 0) {
    // Obtiene el tipo MIME del archivo
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $rutaArchivo);
    finfo_close($finfo);

    // Establece el tipo de contenido y envía el archivo al navegador
    header('Content-Type: '.$mime);
    header('Content-Disposition: inline; filename="'.basename($archivo).'"');
    readfile($rutaArchivo);
} else {
    echo 'El archivo no existe o no se puede acceder a él.';
}
