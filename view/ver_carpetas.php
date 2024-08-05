<?php
$cedula = $_GET["cedula"];
$nombre = $_GET["nombre"];

// Lista de carpetas con sus respectivos enlaces
$carpetas = [
    "Actualización de datos" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Certificados" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Certificados de estudio" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Certificados laborales" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Certificados médicos" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Contrato" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Descuentos" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Doc identidad" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Doc legales" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Dotación" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Gestión humana" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Hoja de vida" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Incapacidades" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Liquidaciones" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Otros" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Pago de nómina" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Prestaciones sociales" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Préstamos" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Procesos disciplinarios" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Seguridad social" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Seguro de vida" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Solicitudes" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Terminación contrato" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Test Wartegg" => "carpetas/carpetas_archivos/consultar_datos.php",
    "Visita domiciliaria" => "carpetas/carpetas_archivos/consultar_datos.php",
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grid de Iconos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/empleados/carpetas/ver_carpetas.css">
</head>
<body>
    <a href="tabla_empleados.php" class="icon-back-link">
        <i class="fa-solid fa-circle-arrow-left fa-beat icon-back"></i>
    </a> 

    <a href="index.php" class="icon-back-menu">
        <i class="fa-solid fa-right-from-bracket"></i> 
    </a> 
    
    <h1>Carpetas del empleado <br>
    <strong><?php echo htmlspecialchars($nombre); ?> : <?php echo htmlspecialchars($cedula); ?></strong></h1>
    
    <div class="grid-container">
        <?php
        // Recorre la lista de carpetas y crea un enlace para cada una
        foreach ($carpetas as $carpeta => $url) {
            $carpetaUrl = urlencode($carpeta); // Codifica el nombre de la carpeta para la URL
            echo '<div class="grid-item">
                    <a href="' . htmlspecialchars($url) . '?cedula=' . urlencode($cedula) . '&nombre=' . urlencode($nombre) . '&carpeta=' . $carpetaUrl . '" class="grid-item-link">
                        <p>' . htmlspecialchars($carpeta) . '</p>
                        <i class="fas fa-folder"></i>
                    </a>
                  </div>';
        }
        ?>
    </div>
</body>
</html>
