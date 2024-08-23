<?php
if (isset($_GET['nombre'])) {
    $_SESSION['nombre'] = $_GET['nombre'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Fechaingreso']) && isset($_POST['carpetaBase'])) {
    $anio = $_POST['Fechaingreso']; // Leer el año directamente desde el campo
    $carpetaBase = $_POST['carpetaBase']; // Leer la carpeta base del campo oculto
    $nombreArea = $_SESSION['nombre']; // Nombre del área almacenado en la sesión
    $idEmpresa = $_SESSION["idEmpresa"]; // ID de la empresa almacenado en la sesión

    // Definir rutas para las empresas
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

    // Verificar si existe la ID de la empresa en el arreglo
    if (isset($rutasEmpresas[$idEmpresa])) {
        // Combinar la ruta base de la empresa, el área, la carpeta base, y el año
        $dir = $rutasEmpresas[$idEmpresa] . '\\' . $nombreArea . '\\' . $carpetaBase . '\\' . $anio;

        // Verificar si la carpeta ya existe
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Carpeta creada con exito: $dir',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 7000
                    }).then(() => {
                        const area = encodeURIComponent('$area');
                        location.assign('../view/carpetas.php?area=' + area);
                    });
                });
            </script>";          } else {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Carpeta ya creada: $dir',
                        confirmButtonColor: '#D62912',
                        confirmButtonText: 'OK',
                        timer: 7000
                    }).then(() => {
                        const area = encodeURIComponent('$area');
                        location.assign('../view/carpetas.php?area=' + area);
                    });
                });
            </script>";        }
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Empresa no valida',
                    confirmButtonColor: '#D62912',
                    confirmButtonText: 'OK',
                    timer: 7000
                }).then(() => {
                    const area = encodeURIComponent('$area');
                    location.assign('../view/carpetas.php?area=' + area);
                });
            });
        </script>";    }
}
?> <?php

session_start();
$area = $_SESSION["area"];
if (isset($_GET['nombre'])) {
    $_SESSION['nombre'] = $_GET['nombre'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nuevonombre'])) {
    $anio = $_POST['Nuevonombre']; // Leer el año directamente desde el campo
    $nombreArea = $_SESSION['nombre'];
    $idEmpresa = $_SESSION["idEmpresa"];

    // Definir rutas para las empresas
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

    // Verificar si existe la ID de la empresa en el arreglo
    if (isset($rutasEmpresas[$idEmpresa])) {
        // Combinar la ruta base de la empresa con el nombre del área y el año
        $dir = $rutasEmpresas[$idEmpresa] . '\\' . $nombreArea . '\\' . $anio;

        // Verificar si la carpeta ya existe
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Carpeta creada con exito: $dir',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 7000
                    }).then(() => {
                        const area = encodeURIComponent('$area');
                        location.assign('../view/carpetas.php?area=' + area);
                    });
                });
            </script>";         } else {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Carpeta ya creada: $dir',
                        confirmButtonColor: '#D62912',
                        confirmButtonText: 'OK',
                        timer: 7000
                    }).then(() => {
                        const area = encodeURIComponent('$area');
                        location.assign('../view/carpetas.php?area=' + area);
                    });
                });
            </script>";   }
    } else {
        echo 'ID de empresa no válida';
    }
}
?>