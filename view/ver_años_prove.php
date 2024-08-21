<?php
include '../model/consu_años_prove.php';
?>      
      <!DOCTYPE html>
        <html lang="es">
        <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenido de Carpeta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/facturas/carpetas/ver_carpetas.css">
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
        <a href="facturas.php" class="icon-back-link">
            <i class="fa-solid fa-circle-arrow-left fa-beat icon-back"></i>
        </a>
        
        <a href="index.php" class="icon-back-menu">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
        <body>

        <div class="container mt-5">
            <h1>Información Por Años<br>
            <br>
            <strong><h1>Carpeta actual:  <?php echo htmlspecialchars($carpeta); ?></strong></h1>
            
            <div class="grid-container">
                                <?php
                foreach ($contenido as $subcarpeta) {
                    $subcarpetaUrl = urlencode($subcarpeta); // Codifica el nombre del subcarpeta para la URL
                    echo '<div class="grid-item">
                                            <a href="ver_info_facturas.php?carpeta='.urlencode($carpeta).'&subcarpeta='.$subcarpetaUrl.'" class="grid-item-link">
                                                <p><i class="fas fa-folder"></i> '.htmlspecialchars($subcarpeta).'</p>
                                            </a>
                                        </div>';
                }
                ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crearaño">
            Crear Año <i class="bi bi-person-plus"></i>
            </button>
            <?php include 'crear_año.php'; ?>
        </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        </body>
        </html>
