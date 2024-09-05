<?php
function obtenerCarpetaPorId($id, $nombreCarpeta) {
    // Definir las rutas según el ID de empresa
    $rutasEmpresas = [
        1 => 'R:/Gestion_Docu/Cargoban/Empleados',
        2 => 'R:/Gestion_Docu/Oceanix/Empleados',
        3 => 'R:/Gestion_Docu/Solutempo/Empleados',
        4 => 'R:/Gestion_Docu/Cargoban_SAS/Empleados',
        5 => 'R:/Gestion_Docu/Agencia_de_Aduanas/Empleados',
        6 => 'R:/Gestion_Docu/Fundacion_Cargoban/Empleados',
        7 => 'R:/Gestion_Docu/Tase/Empleados',
        8 => 'R:/Gestion_Docu/Opyservis/Empleados',
        9 => 'R:/Gestion_Docu/Tierra_Grata/Empleados',
        10 => 'R:/Gestion_Docu/Bananova/Empleados',
        11 => 'R:/Gestion_Docu/Gira/Empleados',
        12 => 'R:/Gestion_Docu/Palmonte/Empleados',
        13 => 'R:/Gestion_Docu/Principio_Comercial/Empleados'
    ];

    // Verificar que el ID de empresa exista en el arreglo
    $idEmpresa = $_SESSION["idEmpresa"];
    if (!isset($rutasEmpresas[$idEmpresa])) {
        echo "ID de empresa no válido.<br>";
        return [];
    }

    // Obtener la ruta base de la empresa seleccionada
    $directorioRaiz = $rutasEmpresas[$idEmpresa];
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


