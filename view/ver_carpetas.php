<?php
session_start(); 
$cedula = $_GET["cedula"];
$nombre = $_GET["nombre"];
$idEmpresa = $_SESSION["idEmpresa"];

// Lista de carpetas con sus respectivos enlaces
$carpetas = [
    "ACTUALIZACIÓN DE DATOS" => "carpetas/carpetas_archivos/consultar_datos.php",
    "AFILIACIONES SEGURIDAD SOCIAL" => "carpetas/carpetas_archivos/consultar_datos.php",
    "ANEXOS Y CERTIFICADOS LABORALES" => "carpetas/carpetas_archivos/consultar_datos.php",
    "AUSENTISMOS E INCAPACIDADES" => "carpetas/carpetas_archivos/consultar_datos.php",
    "CERTIFICADOS DE ESTUDIOS" => "carpetas/carpetas_archivos/consultar_datos.php",
    "CERTIFICADOS MEDICOS" => "carpetas/carpetas_archivos/consultar_datos.php",
    "CERTIFICADOS VARIOS" => "carpetas/carpetas_archivos/consultar_datos.php",
    "CONTRATO DE TRABAJO" => "carpetas/carpetas_archivos/consultar_datos.php",
    "DESCUENTOS VARIOS" => "carpetas/carpetas_archivos/consultar_datos.php",
    "DOCUMENTOS DE IDENTIDAD" => "carpetas/carpetas_archivos/consultar_datos.php",
    "DOCUMENTOS LEGALES" => "carpetas/carpetas_archivos/consultar_datos.php",
    "DOTACION" => "carpetas/carpetas_archivos/consultar_datos.php",
    "HOJA DE VIDA" => "carpetas/carpetas_archivos/consultar_datos.php",
    "LIQUIDACIONES" => "carpetas/carpetas_archivos/consultar_datos.php",
    "OTROS" => "carpetas/carpetas_archivos/consultar_datos.php",
    "PAGOS DE NOMINA" => "carpetas/carpetas_archivos/consultar_datos.php",
    "PAGOS PRESTACIONES SOCIALES" => "carpetas/carpetas_archivos/consultar_datos.php",
    "PROCEDIMIENTOS DISCIPLINARIOS" => "carpetas/carpetas_archivos/consultar_datos.php",
    "PROCESO GESTION HUMANA" => "carpetas/carpetas_archivos/consultar_datos.php",
    "SEGURO DE VIDA" => "carpetas/carpetas_archivos/consultar_datos.php",
    "SOLICITUDES PRESTAMOS Y OTRAS" => "carpetas/carpetas_archivos/consultar_datos.php",
    "SOLICITUDES VARIAS" => "carpetas/carpetas_archivos/consultar_datos.php",
    "TERMINACION DE CONTRATO" => "carpetas/carpetas_archivos/consultar_datos.php",
    "TEST WARTEGG" => "carpetas/carpetas_archivos/consultar_datos.php",
    "VISITA DOMICILIARIA" => "carpetas/carpetas_archivos/consultar_datos.php",
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

    <a href="index.php?idEmpresa=<?php echo $idEmpresa;?> " class="icon-back-menu">
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
