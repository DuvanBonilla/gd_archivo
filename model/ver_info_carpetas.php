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
        1 => 'D:\\Gestion Docu\\Cargoban\\',
        2 => 'D:\\Gestion Docu\\Oceanix\\',
        3 => 'D:\\Gestion Docu\\Solutempo\\',
        4 => 'D:\\Gestion Docu\\Cargoban SAS\\',
        5 => 'D:\\Gestion Docu\\Agencia de Aduanas\\',
        6 => 'D:\\Gestion Docu\\Fundacion Cargoban\\',
        7 => 'D:\\Gestion Docu\\Tase\\',
        8 => 'D:\\Gestion Docu\\Opyservis\\',
        9 => 'D:\\Gestion Docu\\Tierra Grata\\',
        10 => 'D:\\Gestion Docu\\Bananova\\',
        11 => 'D:\\Gestion Docu\\Gira\\',
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

