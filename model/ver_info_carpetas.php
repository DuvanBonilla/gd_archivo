<?php

if (isset($_GET['carpeta']) && isset($_GET['subcarpeta'])) {
    $carpeta = $_GET['carpeta'];
    $subcarpeta = $_GET['subcarpeta'];

    if (isset($_GET['nombre'])) {
        $_SESSION['nombre'] = $_GET['nombre'];
    }

    $nombreArea = $_SESSION['nombre'];
    $idEmpresa = $_SESSION["idEmpresa"];

    // Define las rutas base para cada empresa
    $rutasEmpresas = [
        1 => 'R:\\Gestion_Docu\\Cargoban\\',
        2 => 'R:\\Gestion_Docu\\Oceanix\\',
        3 => 'R:\\Gestion_Docu\\Solutempo\\',
        4 => 'R:\\Gestion_Docu\\Cargoban_SAS\\',
        5 => 'R:\\Gestion_Docu\\Agencia_de_Aduanas\\',
        6 => 'R:\\Gestion_Docu\\Fundacion_Cargoban\\',
        7 => 'R:\\Gestion_Docu\\Tase\\',
        8 => 'R:\\Gestion_Docu\\Opyservis\\',
        9 => 'R:\\Gestion_Docu\\Tierra_Grata\\',
        10 => 'R:\\Gestion_Docu\\Bananova\\',
        11 => 'R:\\Gestion_Docu\\Gira\\',
        12 => 'R:\\Gestion_Docu\\Palmonte',
        13 => 'R:\\Gestion_Docu\\Principio_Comercial',
    ];

    // Verifica si el ID de la empresa es válido y obtiene la ruta base correspondiente
    if (isset($rutasEmpresas[$idEmpresa])) {
        $rutaBase = $rutasEmpresas[$idEmpresa];
    } else {
        $rutaBase = ''; // Si el ID de la empresa no es válido, define una ruta base vacía
    }

    // Agrega el área a la ruta base si $nombreArea está definido
    if (!empty($nombreArea)) {
        $rutaBase .= $nombreArea . '\\';
    }

    $rutaCompleta = $rutaBase . $carpeta . '\\' . $subcarpeta;

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

