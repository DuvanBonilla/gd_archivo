<?php

// Define las rutas de origen y destino
$rutaOrigen = 'D:\\Prueba de archivos'; // Cambia esto a tu ruta 1
$rutaDestino = 'D:\\zestino'; // Cambia esto a tu ruta 2

// Verifica que las rutas existan
// Verifica que las rutas existan
if (!is_dir($rutaOrigen) || !is_dir($rutaDestino)) {
    exit('Una de las rutas no es válida.');
}

// Obtiene todas las carpetas en la ruta de origen
$carpetas = scandir($rutaOrigen);

foreach ($carpetas as $carpeta) {
    // Ignora las carpetas especiales "." y ".."
    if ($carpeta != '.' && $carpeta != '..') {
        $rutaCarpetaOrigen = $rutaOrigen . '\\' . $carpeta;
        $rutaCarpetaDestino = $rutaDestino . '\\' . $carpeta;

        // Verifica si la carpeta de destino existe
        if (!is_dir($rutaCarpetaDestino)) {
            // Crea la carpeta de destino si no existe
            if (!mkdir($rutaCarpetaDestino, 0755, true)) {
                exit('No se pudo crear la carpeta de destino: ' . $rutaCarpetaDestino);
            }
        }

        // Depuración: Mostrar la ruta de la carpeta de origen
        echo 'Explorando carpeta de origen: ' . $rutaCarpetaOrigen . '<br>';

        // Copia los archivos dentro de las subcarpetas de la carpeta de origen a la de destino
        $subcarpetas = scandir($rutaCarpetaOrigen);
        foreach ($subcarpetas as $subcarpeta) {
            if ($subcarpeta != '.' && $subcarpeta != '..') {
                $rutaSubcarpetaOrigen = $rutaCarpetaOrigen . '\\' . $subcarpeta;
                $rutaSubcarpetaDestino = $rutaCarpetaDestino . '\\' . $subcarpeta;

                // Depuración: Mostrar cada subcarpeta explorada
                echo 'Explorando subcarpeta de origen: ' . $rutaSubcarpetaOrigen . '<br>';

                // Verifica si la subcarpeta de destino existe
                if (!is_dir($rutaSubcarpetaDestino)) {
                    if (!mkdir($rutaSubcarpetaDestino, 0755, true)) {
                        exit('No se pudo crear la subcarpeta de destino: ' . $rutaSubcarpetaDestino);
                    }
                }

                // Copia los archivos de la subcarpeta de origen a la de destino
                $archivos = scandir($rutaSubcarpetaOrigen);
                foreach ($archivos as $archivo) {
                    if ($archivo != '.' && $archivo != '..') {
                        $origen = $rutaSubcarpetaOrigen . '\\' . $archivo;
                        $destino = $rutaSubcarpetaDestino . '\\' . $archivo;

                        // Depuración: Mostrar cada archivo encontrado
                        echo 'Encontrado: ' . $origen . '<br>';
                        if (is_file($origen)) {
                            // Depuración: Mostrar cada archivo que se intenta copiar
                            echo 'Copiando archivo: ' . $origen . ' a ' . $destino . '<br>';
                            if (copy($origen, $destino)) {
                                // Elimina el archivo en la ruta de origen si la copia fue exitosa
                                if (unlink($origen)) {
                                    echo 'Archivo eliminado: ' . $origen . '<br>';
                                } else {
                                    echo 'Error eliminando archivo: ' . $origen . '<br>';
                                }
                            } else {
                                echo 'Error copiando ' . $origen . ' a ' . $destino . ': ' . error_get_last()['message'] . '<br>';
                            }
                        }
                    }
                }
            }
        }
    }
}

// Redirige a la página de índice
header('Location: ../view/index.php');
exit;
