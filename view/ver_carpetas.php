<?php
$cedula = $_GET["cedula"];
$nombre = $_GET["nombre"];

// Lista de carpetas con sus respectivos enlaces
$carpetas = [
    "Actualización de datos" => "actualizacion_datos.php",
    "Seguridad social" => "seguridad_social.php",
    "Certificados laborales" => "certificados_laborales.php",
    "Incapacidades" => "incapacidades.php",
    "Certificados de estudio" => "certificados_estudio.php",
    "Certificados médicos" => "certificados_medicos.php",
    "Contrato" => "contrato.php",
    "Descuentos" => "descuentos.php",
    "Doc identidad" => "doc_identidad.php",
    "Doc legales" => "doc_legales.php",
    "Dotación" => "dotacion.php",
    "Hoja de vida" => "hoja_vida.php",
    "Liquidaciones" => "liquidaciones.php",
    "Pago de nómina" => "pago_nomina.php",
    "Prestaciones sociales" => "prestaciones_sociales.php",
    "Procesos disciplinarios" => "procesos_disciplinarios.php",
    "Gestión humana" => "gestion_humana.php",
    "Seguro de vida" => "seguro_vida.php",
    "Préstamos" => "prestamos.php",
    "Solicitudes" => "solicitudes.php",
    "Terminación contrato" => "terminacion_contrato.php",
    "Visita domiciliaria" => "visita_domiciliaria.php",
    "Test Wartegg" => "test_wartegg.php",
    "Certificados" => "certificados.php",
    "Otros" => "otros.php"
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
