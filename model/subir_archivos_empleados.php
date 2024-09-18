<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['cedula']) && isset($_POST['carpeta'])) {

        $idEmpresa = isset($_SESSION["idEmpresa"]) ? $_SESSION["idEmpresa"] : 0;
        $cedula = $_POST['cedula'];
        $carpeta = $_POST['carpeta'];
        $nombre = $_POST['nombre'];



        $rutasEmpresas = [
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
                            exit;
                    }

                    // Permite ciertos formatos de archivo
                    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                    if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg' && $fileType != 'pdf') {
                        echo "
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script language='JavaScript'>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Formato Diferente a PDF',
                                confirmButtonColor: '#2522E2',
                                confirmButtonText: 'OK',
                                timer: 5000
                            }).then(() => {
                                location.assign('../view/carpetas/carpetas_archivos/consultar_datos.php?carpeta=' + encodeURIComponent('$carpeta') + '&cedula=' + encodeURIComponent('$cedula') + '&nombre=' + encodeURIComponent('$nombre'));
                            });
                        });
                        </script>";
                        $uploadOk = 0;
                        exit;
                    }

                    // Verifica si $uploadOk está en 0 por algún error
                    if ($uploadOk == 0) {
                        echo "
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script language='JavaScript'>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'No se Subio el Archivo',
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
                        if (move_uploaded_file($fileTmpName, $targetFile)) {
                            // echo 'El archivo ' . htmlspecialchars(basename($fileName)) . "";
                        } else {
                            echo "
                            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script language='JavaScript'>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Hubo un error',
                                    confirmButtonColor: '#2522E2',
                                    confirmButtonText: 'OK',
                                    timer: 5000
                                }).then(() => {
                                    location.assign('../view/carpetas/carpetas_archivos/consultar_datos.php?carpeta=' + encodeURIComponent('$carpeta') + '&cedula=' + encodeURIComponent('$cedula') + '&nombre=' + encodeURIComponent('$nombre'));
                                });
                            });
                            </script>";
                            exit;
                        }
                    }
                   
                }
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
