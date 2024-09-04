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

if (isset($_GET['idEmpresa'])) {
    $_SESSION['idEmpresa'] = $_GET['idEmpresa'];
}

// Verifica que 'Razonsoc' esté definido en la sesión
if (isset($_SESSION['idEmpresa'])) {
    $nombreArea = $_SESSION['nombre'];
    $idEmpresa = $_SESSION["idEmpresa"];

    $rutasEmpresas = [
        1 => 'R:\\Gestion_Docu\\Cargoban',
        2 => 'R:\\Gestion_Docu\\Oceanix',
        3 => 'R:\\Gestion_Docu\\Solutempo',
        4 => 'R:\\Gestion_Docu\\Cargoban_SAS',
        5 => 'R:\\Gestion_Docu\\Agencia_de_Aduanas',
        6 => 'R:\\Gestion_Docu\\Fundacion_Cargoban',
        7 => 'R:\\Gestion_Docu\\Tase',
        8 => 'R:\\Gestion_Docu\\Opyservis',
        9 => 'R:\\Gestion_Docu\\Tierra_Grata',
        10 => 'R:\\Gestion_Docu\\Bananova',
        11 => 'R:\\Gestion_Docu\\Gira',
        12 => 'R:\\Gestion_Docu\\Palmonte',
        13 => 'R:\\Gestion_Docu\\Principio_Comercial'

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
