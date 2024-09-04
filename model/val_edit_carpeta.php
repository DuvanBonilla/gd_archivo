<?php
session_start();

// Verifica que el usuario esté autenticado
if (!isset($_SESSION['usuario'])) {
    header('location: ../view/carpetas.php');
    exit;
}

$carpetaAntigua = $_POST['carpeta'];
$carpetaNueva = htmlspecialchars($_POST['Nombre']); // Sanitiza el nuevo nombre de la carpeta

// Obtén el ID de la empresa y el nombre del área desde la sesión
$idEmpresa = $_SESSION["idEmpresa"];
$nombreArea = $_SESSION['nombre'];
$area = $_SESSION["area"];

// Define la ruta base según el ID de la empresa
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
];

// Verifica si el ID de empresa es válido
if (!array_key_exists($idEmpresa, $rutasEmpresas)) {
    die("Ruta de empresa no válida.");
}

// Construye la ruta completa para la carpeta a renombrar
$rutaBase = $rutasEmpresas[$idEmpresa];
$rutaArea = $rutaBase . '\\' . $nombreArea;
$rutaCarpetaAntigua = $rutaArea . '\\' . $carpetaAntigua;
$rutaCarpetaNueva = $rutaArea . '\\' . $carpetaNueva;

// Renombra la carpeta
if (file_exists($rutaCarpetaAntigua)) {
    if (!file_exists($rutaCarpetaNueva)) {
        rename($rutaCarpetaAntigua, $rutaCarpetaNueva);
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Carpeta Editada Exitosamente',
                confirmButtonColor: 'red',
                confirmButtonText: 'OK',
                timer: 6000
            }).then(() => {
                const area = encodeURIComponent('$area');
                const nombre = encodeURIComponent('$nombreArea');
                location.assign('../view/carpetas.php?area=' + area + '&nombre=' + nombre);
            });
        });
        </script>";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Ya Existe Una Carpeta Con Ese Nombre',
                confirmButtonColor: 'red',
                confirmButtonText: 'OK',
                timer: 6000
            }).then(() => {
                const area = encodeURIComponent('$area');
                const nombre = encodeURIComponent('$nombreArea');
                location.assign('../view/carpetas.php?area=' + area + '&nombre=' + nombre);
            });
        });
        </script>";
    }
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Carpeta Original No Existe',
            confirmButtonColor: 'red',
            confirmButtonText: 'OK',
            timer: 6000
        }).then(() => {
            const area = encodeURIComponent('$area');
            const nombre = encodeURIComponent('$nombreArea');
            location.assign('../view/carpetas.php?area=' + area + '&nombre=' + nombre);
        });
    });
    </script>";
}

