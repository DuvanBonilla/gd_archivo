<?php

if (!isset($_SESSION['usuario'])) {
    header('location: ../view/login.php');
    exit;
}

$nombreArea = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$idEmpresa = isset($_SESSION["idEmpresa"]) ? $_SESSION["idEmpresa"] : 0;


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


if (array_key_exists($idEmpresa, $rutasEmpresas)) {
    $rutaBase = $rutasEmpresas[$idEmpresa];
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Id de la empresa no valido',
                confirmButtonColor: '#D62912',
                confirmButtonText: 'OK',
                timer: 7000
            }).then(() => {
                const area = encodeURIComponent('$nombreArea');
                location.assign('../view/carpetas.php?area=' + area);
            });
        });
    </script>";      exit;
}


$contenido = [];
if (isset($_GET['carpeta'])) {
    $carpeta = $_GET['carpeta'];

    $rutaCompleta = $rutaBase . '\\' . $nombreArea . '\\' . $carpeta;

    // Verifica si la carpeta existe
    if (is_dir($rutaCompleta)) {
        $contenido = scandir($rutaCompleta);
        $contenido = array_diff($contenido, ['.', '..']);
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'La carpeta no existe o directorio no valido',
                    confirmButtonColor: '#D62912',
                    confirmButtonText: 'OK',
                    timer: 7000
                }).then(() => {
                    const area = encodeURIComponent('$nombreArea');
                    location.assign('../view/carpetas.php?area=' + area);
                });
            });
        </script>";      }
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'No se especifico la carpeta',
                confirmButtonColor: '#D62912',
                confirmButtonText: 'OK',
                timer: 7000
            }).then(() => {
                const area = encodeURIComponent('$nombreArea');
                location.assign('../view/carpetas.php?area=' + area);
            });
        });
    </script>";  }

