<?php
function obtenerCarpetaPorId($id, $nombreCarpeta) {
    $directorioRaiz = 'D:/Gestion Docu/Cargoban/empleado'; 
    $carpetaUsuario = $directorioRaiz . '/' . $id;
    $archivos = [];

    // Verificar si la carpeta del usuario existe
    if (file_exists($carpetaUsuario) && is_dir($carpetaUsuario)) {

        // Obtener la lista de subcarpetas y archivos dentro de la carpeta del usuario
        $subcarpetas = scandir($carpetaUsuario);
        
        foreach ($subcarpetas as $subcarpeta) {
            // Ignorar las carpetas '.' y '..'
            if ($subcarpeta === '.' || $subcarpeta === '..') {
                continue;
            }

            if ($subcarpeta === $nombreCarpeta) {
                $rutaSubcarpeta = $carpetaUsuario . '/' . $subcarpeta;

                // Listar los archivos dentro de la subcarpeta encontrada
                $archivosSubcarpeta = scandir($rutaSubcarpeta);

                foreach ($archivosSubcarpeta as $archivo) {
                    if ($archivo === '.' || $archivo === '..') {
                        continue;
                    }

                    // Obtener la ruta completa del archivo
                    $rutaArchivo = $rutaSubcarpeta . '/' . $archivo;
                    // Obtener solo el nombre del archivo
                    $nombreArchivo = basename($archivo);

                    // Añadir ambos datos al array
                    $archivos[] = [
                        'ruta' => $rutaArchivo,
                        'nombre' => $nombreArchivo
                    ];
                }
                // Solo necesitamos la primera carpeta que coincida
                break;
            }
        }
    } else {
        echo "La carpeta con el directorio $carpetaUsuario no existe.<br>";
    }

    return $archivos;
}
