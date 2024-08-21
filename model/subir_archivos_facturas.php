<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si los parámetros 'carpeta' y 'subcarpeta' están presentes en los datos POST
    if (isset($_POST['carpeta']) && isset($_POST['subcarpeta'])) {
        $carpeta = $_POST['carpeta'];
        $subcarpeta = $_POST['subcarpeta'];
        $rutaBase = 'C:\\xampp\\htdocs\\gd_archivo\\model\\carpetas\\';
        $rutaCompleta = $rutaBase.$carpeta.'\\'.$subcarpeta.'\\';

        // Verifica si la ruta completa existe y es un directorio
        if (is_dir($rutaCompleta)) {
            $targetFile = $rutaCompleta.basename($_FILES['archivo']['name']);
            $uploadOk = 1;

            // Check if file already exists
            if (file_exists($targetFile)) {
                echo 'El archivo ya existe.';
                $uploadOk = 0;
            }

            // Check file size (límite de 5MB)
            if ($_FILES['archivo']['size'] > 5000000) {
                echo 'El archivo es demasiado grande.';
                $uploadOk = 0;
            }

            // Allow certain file formats
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg' && $fileType != 'pdf') {
                echo 'Solo se permiten archivos JPG, JPEG, PNG y PDF.';
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo 'Tu archivo no fue subido.';
            } else {
                if (move_uploaded_file($_FILES['archivo']['tmp_name'], $targetFile)) {
                    echo 'El archivo '.htmlspecialchars(basename($_FILES['archivo']['name']))." ha sido subido a la carpeta $subcarpeta.";
                } else {
                    echo 'Hubo un error al subir tu archivo.';
                }
            }
        } else {
            echo 'La ruta especificada no es válida.';
        }
    } else {
        echo "Faltan parámetros 'carpeta' y 'subcarpeta'.";
    }
}
