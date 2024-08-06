<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../view/consultar_datos.php');
    exit;
}

$archivo = $_GET['archivo'];
$rutaArchivo = realpath($archivo);

if (file_exists($rutaArchivo)) {
    // Abre el archivo info para obtener el tipo MIME
    $finfo = finfo_open(FILEINFO_MIME_TYPE);

    // Obtiene el tipo MIME del archivo
    $mime = finfo_file($finfo, $rutaArchivo);

    // Cierra el archivo info
    finfo_close($finfo);

    // Establece el tipo de contenido en el encabezado de la respuesta
    header('Content-Type: '.$mime);

    // Lee y envía el contenido del archivo al navegador
    readfile($rutaArchivo);
} else {
    echo 'El archivo no existe.';
}
