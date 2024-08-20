<?php
// Verifica si el parámetro 'carpeta' está presente en la URL
if (isset($_GET['carpeta'])) {
    $carpeta = $_GET['carpeta'];
    $rutaBase = 'C:\\xampp\\htdocs\\gd_archivo\\model\\carpetas\\';
    $rutaCompleta = $rutaBase.$carpeta;

    // Verifica si la carpeta existe
    if (is_dir($rutaCompleta)) {
        $contenido = scandir($rutaCompleta);
        $contenido = array_diff($contenido, ['.', '..']); // Excluye . y ..

        // Comienza a generar el HTML para mostrar el contenido de la carpeta
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contenido de Carpeta</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <link rel="stylesheet" href="css/empleados/carpetas/ver_carpetas.css">
        </head>
        <a href="facturas.php" class="icon-back-link">
            <i class="fa-solid fa-circle-arrow-left fa-beat icon-back"></i>
        </a>
        
        <a href="index.php" class="icon-back-menu">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
        <body>
            
            <h1>Carpetas de Facturación<br>
            <strong><?php echo htmlspecialchars($carpeta); ?></strong></h1>
            
            <div class="grid-container">
                <?php
                // Itera sobre el contenido de la carpeta y crea un enlace para cada elemento
                foreach ($contenido as $subcarpeta) {
                    $subcarpetaUrl = urlencode($subcarpeta); // Codifica el nombre del subcarpeta para la URL
                    echo '<div class="grid-item">
                            <a href="ver_info_facturas.php?carpeta='.urlencode($carpeta).'&subcarpeta='.$subcarpetaUrl.'" class="grid-item-link">
                                <p><i class="fas fa-folder"></i> '.htmlspecialchars($subcarpeta).'</p>
                            </a>
                          </div>';
                }
        ?>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo 'La carpeta no existe o no es un directorio válido.';
    }
} else {
    echo 'No se especificó la carpeta.';
}
?>
