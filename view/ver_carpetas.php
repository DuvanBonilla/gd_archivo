<?php
$cedula = $_GET["cedula"];
$nombre = $_GET["nombre"];

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
    <strong> <?php echo htmlspecialchars($nombre); ?> : <?php echo htmlspecialchars($cedula); ?> </h1> </strong> <div class="grid-container">
        <div class="grid-item">
            <p>Actualización de datos</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Seguridad social</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Certificados laborales</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Incapacidades</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Certificados de estudio</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Certificados médicos</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Contrato</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Descuentos</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Doc identidad</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Doc legales</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Dotación</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Hoja de vida</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Liquidaciones</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Pago de nómina</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Prestaciones sociales</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Procesos disciplinarios</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Gestión humana</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Seguro de vida</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Préstamos</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Solicitudes</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Terminación contrato</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Visita domiciliaria</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Test Wartegg</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Certificados</p>
            <i class="fas fa-folder"></i>
        </div>
        <div class="grid-item">
            <p>Otros</p>
            <i class="fas fa-folder"></i>
        </div>
    </div>
</body>
</html>
