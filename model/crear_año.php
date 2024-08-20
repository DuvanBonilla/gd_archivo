<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Fechaingreso'])) {
    $anio = $_POST['Fechaingreso']; // Leer el año directamente desde el campo
    $dir = "carpetas/$anio";

    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
        echo 'Carpeta creada exitosamente';
    } else {
        echo 'La carpeta ya existe';
    }
}
