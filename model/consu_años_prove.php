<?php

if (isset($_GET['carpeta'])) {
    $carpeta = $_GET['carpeta'];
    $rutaBase = 'C:\\xampp\\htdocs\\gd_archivo\\model\\carpetas\\';
    $rutaCompleta = $rutaBase.$carpeta;

    // Verifica si la carpeta existe
    if (is_dir($rutaCompleta)) {
        $contenido = scandir($rutaCompleta);
        $contenido = array_diff($contenido, ['.', '..']);
    } else {
        echo 'La carpeta no existe o no es un directorio válido.';
    }
} else {
    echo 'No se especificó la carpeta.';
}
