<?php

function getCarpetas($dir)
{
    $carpetas = [];
    $items = glob($dir . '/*', GLOB_ONLYDIR);

    foreach ($items as $item) {
        $carpetas[] = basename($item);
    }
    return $carpetas;
}

if (isset($_GET['nombre'])) {
    $_SESSION['nombre'] = $_GET['nombre'];
}

// Verifica que 'Razonsoc' esté definido en la sesión
if (isset($_SESSION['Razonsoc'])) {
    $nombreArea = $_SESSION['nombre'];
    $idEmpresa = $_SESSION["idEmpresa"];

    $rutasEmpresas = [
        1 => 'D:\\Gestion Docu\\Cargoban',
        2 => 'D:\\Gestion Docu\\Oceanix',
        3 => 'D:\\Gestion Docu\\Solutempo',
        4 => 'D:\\Gestion Docu\\Cargoban SAS',
        5 => 'D:\\Gestion Docu\\Agencia de Aduanas',
        6 => 'D:\\Gestion Docu\\Fundacion Cargoban',
        7 => 'D:\\Gestion Docu\\Tase',
        8 => 'D:\\Gestion Docu\\Opyservis',
        9 => 'D:\\Gestion Docu\\Tierra Grata',
        10 => 'D:\\Gestion Docu\\Bananova',
        11 => 'D:\\Gestion Docu\\Gira',
    ];

    if (isset($rutasEmpresas[$idEmpresa])) {
        $rutaBase = $rutasEmpresas[$idEmpresa];
        $_SESSION['rutaCompleta'] = $rutaBase . '\\' . $nombreArea;
    } else {
        $_SESSION['rutaCompleta'] = ''; 
    }

    $carpetas = getCarpetas($_SESSION['rutaCompleta']);

   rsort($carpetas);

    return $carpetas;

} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'ID de la empresa no definido en la sesion',
                confirmButtonColor: '#D62912',
                confirmButtonText: 'OK',
                timer: 7000
            }).then(() => {
                const area = encodeURIComponent('$area');
                location.assign('../view/carpetas.php?area=' + area);
            });
        });
    </script>";  }
