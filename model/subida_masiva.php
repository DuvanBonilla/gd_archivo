<?php

session_start();
$idEmpresa = $_SESSION['idEmpresa'];

// Definir las rutas de destino según la id de la empresa
$rutasDestino = [
    1 => 'R:\\Gestion_Docu\\Cargoban\\Empleados',
    2 => 'R:\\Gestion_Docu\\Oceanix\\Empleados',
    3 => 'R:\\Gestion_Docu\\Solutempo\\Empleados',
    4 => 'R:\\Gestion_Docu\\Cargoban_SAS\\Empleados',
    5 => 'R:\\Gestion_Docu\\Agencia_de_Aduanas\\Empleados',
    6 => 'R:\\Gestion_Docu\\Fundacion_Cargoban\\Empleados',
    7 => 'R:\\Gestion_Docu\\Tase\\Empleados',
    8 => 'R:\\Gestion_Docu\\Opyservis\\Empleados',
    9 => 'R:\\Gestion_Docu\\Tierra_Grata\\Empleados',
    10 => 'R:\\Gestion_Docu\\Bananova\\Empleados',
    11 => 'R:\\Gestion_Docu\\Gira\\Empleados',
    12 => 'R:\\Gestion_Docu\\Palmonte\\Empleados',
    13 => 'R:\\Gestion_Docu\\Principio_Comercial\\Empleados',
];

// Definir las rutas de origen según la id de la empresa
$rutasOrigen = [
    1 => 'D:\\Subida_Masiva\\Cargoban\\Empleados',
    2 => 'D:\\Subida_Masiva\\Oceanix\\Empleados',
    3 => 'D:\\Subida_Masiva\\Solutempo\\Empleados',
    4 => 'D:\\Subida_Masiva\\Cargoban_SAS\\Empleados',
    5 => 'D:\\Subida_Masiva\\Agencia_de_Aduanas\\Empleados',
    6 => 'D:\\Subida_Masiva\\Fundacion_Cargoban\\Empleados',
    7 => 'D:\\Subida_Masiva\\Tase\\Empleados',
    8 => 'D:\\Subida_Masiva\\Opyservis\\Empleados',
    9 => 'D:\\Subida_Masiva\\Tierra_Grata\\Empleados',
    10 => 'D:\\Subida_Masiva\\Bananova\\Empleados',
    11 => 'D:\\Subida_Masiva\\Gira\\Empleados',
    12 => 'D:\\Subida_Masiva\\Palmonte\\Empleados',
    13 => 'D:\\Subida_Masiva\\Principio_Comercial\\Empleados',
];

if (!isset($rutasDestino[$idEmpresa]) || !isset($rutasOrigen[$idEmpresa])) {
    exit('La idEmpresa no es válida o no tiene una ruta de destino u origen asignada.');
}

// Asignar las rutas de destino y origen correspondientes a la empresa seleccionada
$rutaDestino = $rutasDestino[$idEmpresa];
$rutaOrigen = $rutasOrigen[$idEmpresa];

// Verifica que las rutas existan
if (!is_dir($rutaOrigen) || !is_dir($rutaDestino)) {
    exit('Una de las rutas no es válida.');
}

// Obtiene todas las carpetas en la ruta de origen
$carpetas = scandir($rutaOrigen);

foreach ($carpetas as $carpeta) {
    if ($carpeta != '.' && $carpeta != '..') {
        $rutaCarpetaOrigen = $rutaOrigen . '\\' . $carpeta;
        $rutaCarpetaDestino = $rutaDestino . '\\' . $carpeta;

        // Verifica si la carpeta de destino existe
        if (!is_dir($rutaCarpetaDestino)) {
            if (!mkdir($rutaCarpetaDestino, 0755, true)) {
                exit('No se pudo crear la carpeta de destino: ' . $rutaCarpetaDestino);
            }
        }

        // Copia los archivos dentro de las subcarpetas de la carpeta de origen a la de destino
        $subcarpetas = scandir($rutaCarpetaOrigen);
        foreach ($subcarpetas as $subcarpeta) {
            if ($subcarpeta != '.' && $subcarpeta != '..') {
                $rutaSubcarpetaOrigen = $rutaCarpetaOrigen . '\\' . $subcarpeta;
                $rutaSubcarpetaDestino = $rutaCarpetaDestino . '\\' . $subcarpeta;

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
 
echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Todos los archivos fueron procesados exitosamente',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 5000
          }).then(() => {
          const idEmpresa = encodeURIComponent('$idEmpresa');
          location.assign('../view/index.php?idEmpresa=' + idEmpresa);
          });
    });
    </script>";
exit;
