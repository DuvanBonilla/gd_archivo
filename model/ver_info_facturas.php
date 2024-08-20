<?php

// Verifica si los parámetros 'carpeta' e 'subcarpeta' están presentes en la URL
if (isset($_GET['carpeta']) && isset($_GET['subcarpeta'])) {
    $carpeta = $_GET['carpeta'];
    $subcarpeta = $_GET['subcarpeta'];
    $rutaBase = 'C:\\xampp\\htdocs\\gd_archivo\\model\\carpetas\\';
    $rutaCompleta = $rutaBase.$carpeta.'\\'.$subcarpeta;

    // Verifica si la ruta completa existe y es un directorio
    if (is_dir($rutaCompleta)) {
        $archivos = scandir($rutaCompleta);
        $archivos = array_diff($archivos, ['.', '..']); // Excluye . y ..
    } else {
        $archivos = []; // Si la ruta no es válida, devuelve un array vacío
    }
} else {
    $archivos = []; // Si faltan parámetros, devuelve un array vacío
}
