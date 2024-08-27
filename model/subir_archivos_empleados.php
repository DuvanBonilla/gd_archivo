<?php
session_start(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['cedula']) && isset($_POST['carpeta'])) {

        $idEmpresa = isset($_SESSION["idEmpresa"]) ? $_SESSION["idEmpresa"] : 0;   
        $cedula = $_POST['cedula'];
        $carpeta = $_POST['carpeta'];
        $nombre = $_POST['nombre'];


  
        $rutasEmpresas = [
            1 => 'D:\\Gestion Docu\\Cargoban\\empleado',
            2 => 'D:\\Gestion Docu\\Oceanix\\empleado',
            3 => 'D:\\Gestion Docu\\Solutempo\\empleado',
            4 => 'D:\\Gestion Docu\\Cargoban SAS\\empleado',
            5 => 'D:\\Gestion Docu\\Agencia de Aduanas\\empleado',
            6 => 'D:\\Gestion Docu\\Fundacion Cargoban\\empleado',
            7 => 'D:\\Gestion Docu\\Tase\\empleado',
            8 => 'D:\\Gestion Docu\\Opyservis\\empleado',
            9 => 'D:\\Gestion Docu\\Tierra Grata\\empleado',
            10 => 'D:\\Gestion Docu\\Bananova\\empleado',
            11 => 'D:\\Gestion Docu\\Gira\\empleado',
        ];

        // Obtener la ruta base según el ID de empresa
        if (isset($rutasEmpresas[$idEmpresa])) {
            $rutaBase = $rutasEmpresas[$idEmpresa];
            $rutaCompleta = $rutaBase . '\\' . $cedula . '\\' . $carpeta . '\\';

            // Verifica si la ruta completa existe y es un directorio
            if (is_dir($rutaCompleta)) {
                $uploadOk = 1;

                foreach ($_FILES['archivo']['name'] as $index => $fileName) {
                    $fileTmpName = $_FILES['archivo']['tmp_name'][$index];
                    $targetFile = $rutaCompleta . basename($fileName);

                    // Verifica si el archivo ya existe
                    if (file_exists($targetFile)) {
                        $uploadOk = 0;
                        echo "
                            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script language='JavaScript'>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'El archivo ya existe',
                                    confirmButtonColor: '#D63030',
                                    confirmButtonText: 'OK',
                                    timer: 5000
                                }).then(() => {
                                location.assign('../view/carpetas/carpetas_archivos/consultar_datos.php?carpeta=' + encodeURIComponent('$carpeta') + '&cedula=' + encodeURIComponent('$cedula') + '&nombre=' + encodeURIComponent('$nombre'));
                                });
                            });
                            </script>";
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
                            // echo 'El archivo ' . htmlspecialchars(basename($fileName)) . "";
                            echo "
                            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script language='JavaScript'>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Archivo subido con éxito',
                                    confirmButtonColor: '#2522E2',
                                    confirmButtonText: 'OK',
                                    timer: 5000
                                }).then(() => {
                                    location.assign('../view/carpetas/carpetas_archivos/consultar_datos.php?carpeta=' + encodeURIComponent('$carpeta') + '&cedula=' + encodeURIComponent('$cedula') + '&nombre=' + encodeURIComponent('$nombre'));
                                });
                            });
                            </script>";
                            exit;   

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
                                    location.assign('../view/carpetas/carpetas_archivos/consultar_datos.php?carpeta=' + encodeURIComponent('$carpeta') + '&cedula=' + encodeURIComponent('$cedula') + '&nombre=' + encodeURIComponent('$nombre'));
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
                                    location.assign('../view/carpetas/carpetas_archivos/consultar_datos.php?carpeta=' + encodeURIComponent('$carpeta') + '&cedula=' + encodeURIComponent('$cedula') + '&nombre=' + encodeURIComponent('$nombre'));
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
                                    location.assign('../view/carpetas/carpetas_archivos/consultar_datos.php?carpeta=' + encodeURIComponent('$carpeta') + '&cedula=' + encodeURIComponent('$cedula') + '&nombre=' + encodeURIComponent('$nombre'));
                });
            });
        </script>"; 
                exit;    }
}
