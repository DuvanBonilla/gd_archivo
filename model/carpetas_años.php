<?php

function getCarpetas($dir)
{
    $carpetas = [];
    $items = glob($dir.'/*', GLOB_ONLYDIR);

    foreach ($items as $item) {
        $carpetas[] = basename($item); // Solo agregamos el nombre de la carpeta
    }

    return $carpetas;
}

// Ruta correcta desde el archivo PHP
$carpetas = getCarpetas(__DIR__.'/carpetas');

// Ordenar las carpetas en orden descendente
rsort($carpetas);

// Devolver las carpetas
return $carpetas;
