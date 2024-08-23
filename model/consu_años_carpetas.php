<?php

if (!isset($_SESSION['usuario'])) {
    header('location: ../view/login.php');
    exit;
}

$nombreArea = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$idEmpresa = isset($_SESSION["idEmpresa"]) ? $_SESSION["idEmpresa"] : 0;


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
                const area = encodeURIComponent('$area');
                location.assign('../view/carpetas.php?area=' + area);
            });
        });
    </script>";      exit;
}


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
                    const area = encodeURIComponent('$area');
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
                const area = encodeURIComponent('$area');
                location.assign('../view/carpetas.php?area=' + area);
            });
        });
    </script>";  }

