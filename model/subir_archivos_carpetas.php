<?php
session_start(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['carpeta']) && isset($_POST['subcarpeta'])) {

        $nombreArea = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
        $idEmpresa = isset($_SESSION["idEmpresa"]) ? $_SESSION["idEmpresa"] : 0;   
        echo $idEmpresa;
        $carpeta = $_POST['carpeta'];
        $subcarpeta = $_POST['subcarpeta'];

  
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

        // Obtener la ruta base según el ID de empresa
        if (isset($rutasEmpresas[$idEmpresa])) {
            $rutaBase = $rutasEmpresas[$idEmpresa];
            $rutaCompleta = $rutaBase . '\\' . $nombreArea . '\\' . $carpeta . '\\' . $subcarpeta . '\\';

            // Verifica si la ruta completa existe y es un directorio
            if (is_dir($rutaCompleta)) {
                $uploadOk = 1;

                foreach ($_FILES['archivo']['name'] as $index => $fileName) {
                    $fileTmpName = $_FILES['archivo']['tmp_name'][$index];
                    $targetFile = $rutaCompleta . basename($fileName);

                    // Verifica si el archivo ya existe
                    if (file_exists($targetFile)) {
                        echo 'El archivo ' . htmlspecialchars(basename($fileName)) . ' ya existe.<br>';
                        $uploadOk = 0;
                    }

                    // Verifica el tamaño del archivo (límite de 5MB)
                    if ($_FILES['archivo']['size'][$index] > 5000000) {
                        echo 'El archivo ' . htmlspecialchars(basename($fileName)) . ' es demasiado grande.<br>';
                        $uploadOk = 0;
                    }

                    // Permite ciertos formatos de archivo
                    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                    if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg' && $fileType != 'pdf') {
                        echo 'Solo se permiten archivos JPG, JPEG, PNG y PDF para el archivo ' . htmlspecialchars(basename($fileName)) . '.<br>';
                        $uploadOk = 0;
                    }

                    // Verifica si $uploadOk está en 0 por algún error
                    if ($uploadOk == 0) {
                        echo 'El archivo ' . htmlspecialchars(basename($fileName)) . ' no fue subido.<br>';
                    } else {
                        if (move_uploaded_file($fileTmpName, $targetFile)) {
                            echo 'El archivo ' . htmlspecialchars(basename($fileName)) . " ha sido subido a la carpeta $subcarpeta.<br>";
                        } else {
                            echo 'Hubo un error al subir el archivo ' . htmlspecialchars(basename($fileName)) . '.<br>';
                        }
                    }
                }
            } else {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'La ruta especificada no es valida',
                        confirmButtonColor: '#D63030',
                        confirmButtonText: 'OK',
                        timer: 5000
                    }).then(() => {
                    location.assign('../view/carpetas.php?area=' + area);
                    });
                });
                </script>";
                exit;            }
        } else {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Id de la empresa no valido',
                    confirmButtonColor: '#D63030',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    location.assign('../view/carpetas.php?area=' + area);
                });
            });
            </script>";
            exit;        }
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Faltan parametros 'carpetas' y 'subcarpetas'',
                    confirmButtonColor: '#D62912',
                    confirmButtonText: 'OK',
                    timer: 7000
                }).then(() => {
                    const area = encodeURIComponent('$area');
                    location.assign('../view/carpetas.php?area=' + area);
                });
            });
        </script>"; 
                exit;    }
}
