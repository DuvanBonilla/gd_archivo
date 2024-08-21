<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Fechaingreso']) && isset($_POST['carpetaBase'])) {
    $anio = $_POST['Fechaingreso']; // Leer el año directamente desde el campo
    $carpetaBase = $_POST['carpetaBase']; // Leer la carpeta base del campo oculto
    $dir = "carpetas/$carpetaBase/$anio"; // Construir la ruta completa

    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
        echo 'Carpeta creada exitosamente';
    } else {
        echo 'La carpeta ya existe';
    }
}
