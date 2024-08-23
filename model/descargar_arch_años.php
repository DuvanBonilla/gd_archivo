<?php

// Verifica si se han pasado los parámetros necesarios
if (!isset($_GET['archivo']) || !isset($_GET['carpeta']) || !isset($_GET['subcarpeta'])) {
    echo 'Archivo, carpeta o subcarpeta no especificados.';
    exit;
}

// Obtiene los parámetros de la URL
$archivo = basename($_GET['archivo']); // Utiliza basename para evitar problemas con rutas
$carpeta = basename($_GET['carpeta']);
$subcarpeta = basename($_GET['subcarpeta']);

// Construye la ruta completa del archivo
$rutaArchivo = "C:/xampp/htdocs/gd_archivo/model/carpetas/$carpeta/$subcarpeta/$archivo";

// Verifica que el archivo exista y que esté dentro del directorio permitido
if (file_exists($rutaArchivo)) {
    // Configura las cabeceras HTTP para la descarga
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($rutaArchivo).'"');
    header('Content-Length: '.filesize($rutaArchivo));
    header('Pragma: no-cache');
    header('Expires: 0');

    // Lee el archivo y envíalo al cliente
    if (readfile($rutaArchivo) === false) {
        echo 'Error al leer el archivo.';
    }
    exit;
} else {
    // El archivo no existe en la ruta especificada
    echo 'El archivo no existe o no se puede acceder a él.';
}
