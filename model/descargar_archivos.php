<?php
// Verificar si se proporcionó el nombre del archivo en la URL
if (isset($_GET['archivo'])) {
    // Obtener la ruta del archivo de la URL
    $rutaArchivo = $_GET['archivo'];

    // Verificar que el archivo exista en la ruta especificada
    if (file_exists($rutaArchivo)) {
        // Configurar las cabeceras HTTP para la descarga
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($rutaArchivo) . '"');
        header('Content-Length: ' . filesize($rutaArchivo));

        // Leer el archivo y enviarlo al cliente
        readfile($rutaArchivo);
        exit;
    } else {
        // El archivo no existe en la ruta especificada
        echo "El archivo no existe.";
    }
} else {
    // No se proporcionó el nombre del archivo en la URL
    echo "Archivo no especificado.";
}
