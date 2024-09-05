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
                        echo "
                            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script language='JavaScript'>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Archivo Ya Existe',
                                    confirmButtonColor: 'red',
                                    confirmButtonText: 'OK',
                                    timer: 6000
                                }).then(() => {
                                    const carpeta = encodeURIComponent('$carpeta');
                                    const subcarpeta = encodeURIComponent('$subcarpeta');
                                    location.assign('../view/ver_info_carpetas.php?carpeta=' + carpeta + '&subcarpeta=' + subcarpeta);
                                });
                            });
                            </script>";
                        $uploadOk = 0;
                        exit;
                    }

                    // Verifica el tamaño del archivo (límite de 5MB)
                    if ($_FILES['archivo']['size'][$index] > 5000000) {
                        echo "
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script language='JavaScript'>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Archivo Es Demasiado Grande',
                                confirmButtonColor: 'red',
                                confirmButtonText: 'OK',
                                timer: 8000
                            }).then(() => {
                                const carpeta = encodeURIComponent('$carpeta');
                                const subcarpeta = encodeURIComponent('$subcarpeta');
                                location.assign('../view/ver_info_carpetas.php?carpeta=' + carpeta + '&subcarpeta=' + subcarpeta);
                            });
                        });
                        </script>";
                        $uploadOk = 0;
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
                                title: 'Solo se permiten archivos JPG, JPEG, PNG y PDF',
                                confirmButtonColor: 'red',
                                confirmButtonText: 'OK',
                                timer: 10000
                            }).then(() => {
                                const carpeta = encodeURIComponent('$carpeta');
                                const subcarpeta = encodeURIComponent('$subcarpeta');
                                location.assign('../view/ver_info_carpetas.php?carpeta=' + carpeta + '&subcarpeta=' + subcarpeta);
                            });
                        });
                        </script>";
                        $uploadOk = 0;
                        exit;
                    }

                    // Verifica si $uploadOk está en 0 por algún error
                    if ($uploadOk == 0) {
                        echo " <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script language='JavaScript'>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'El archivo no fue subido',
                                confirmButtonColor: 'red',
                                confirmButtonText: 'OK',
                                timer: 8000
                            }).then(() => {
                                const carpeta = encodeURIComponent('$carpeta');
                                const subcarpeta = encodeURIComponent('$subcarpeta');
                                location.assign('../view/ver_info_carpetas.php?carpeta=' + carpeta + '&subcarpeta=' + subcarpeta);
                            });
                        });
                        </script>";
                        exit;
                    } else {
                        if (move_uploaded_file($fileTmpName, $targetFile)) {
                            echo "
                            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script language='JavaScript'>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Archivo Subido Exitosamente',
                                    confirmButtonColor: 'red',
                                    confirmButtonText: 'OK',
                                    timer: 8000
                                }).then(() => {
                                    const carpeta = encodeURIComponent('$carpeta');
                                    const subcarpeta = encodeURIComponent('$subcarpeta');
                                    location.assign('../view/ver_info_carpetas.php?carpeta=' + carpeta + '&subcarpeta=' + subcarpeta);
                                });
                            });
                            </script>";
                        } else {
                            echo " <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script language='JavaScript'>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error al subir el archivo',
                                confirmButtonColor: 'red',
                                confirmButtonText: 'OK',
                                timer: 8000
                            }).then(() => {
                                const carpeta = encodeURIComponent('$carpeta');
                                const subcarpeta = encodeURIComponent('$subcarpeta');
                                location.assign('../view/ver_info_carpetas.php?carpeta=' + carpeta + '&subcarpeta=' + subcarpeta);
                            });
                        });
                        </script>";
                        exit;
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
                        timer: 8000
                    }).then(() => {
                        const carpeta = encodeURIComponent('$carpeta');
                        const subcarpeta = encodeURIComponent('$subcarpeta');
                        location.assign('../view/ver_info_carpetas.php?carpeta=' + carpeta + '&subcarpeta=' + subcarpeta);
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
                    timer: 6000
                }).then(() => {
                    const carpeta = encodeURIComponent('$carpeta');
                    const subcarpeta = encodeURIComponent('$subcarpeta');
                    location.assign('../view/ver_info_carpetas.php?carpeta=' + carpeta + '&subcarpeta=' + subcarpeta);
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
                    const carpeta = encodeURIComponent('$carpeta');
                    const subcarpeta = encodeURIComponent('$subcarpeta');
                    location.assign('../view/ver_info_carpetas.php?carpeta=' + carpeta + '&subcarpeta=' + subcarpeta);
                });
            });
        </script>"; 
                exit;    }
}
