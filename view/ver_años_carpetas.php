<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../view/login.php');
    exit;
}

$permisos = include "../model/consu_permisos_usuario.php";
$idEmpresa = $_SESSION["idEmpresa"];
$idArea = isset($_SESSION['area']) ? intval($_SESSION['area']) : 0;
$nombreArea = isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '';

$permisoUsuario = null;
foreach ($permisos as $permiso) {
    if ($permiso['Area'] == $idArea) {
        $permisoUsuario = $permiso['Permiso'];
        break;
    }
}

include '../model/consu_años_carpetas.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenido de Carpeta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/carpetas/carpetas/ver_carpetas.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<a href="carpetas.php?area=<?php echo $idArea; ?>&nombre=<?php echo urlencode($nombreArea); ?>" class="icon-back-link">
    <i class="fa-solid fa-circle-arrow-left fa-beat icon-back"></i>
</a>
<a href="index.php?idEmpresa=<?php echo $idEmpresa;?> " class="icon-back-menu">
    <i class="fa-solid fa-right-from-bracket"></i>
</a>

<div class="container mt-5">
    <h1>Información Por Años</h1>
    <h2>Carpeta actual: <?php echo htmlspecialchars($carpeta); ?></h2>

    <div class="grid-container">
        <?php
        foreach ($contenido as $subcarpeta) {
            $subcarpetaUrl = urlencode($subcarpeta); // Codifica el nombre del subcarpeta para la URL
            echo '<div class="grid-item">
                    <a href="ver_info_carpetas.php?carpeta='.urlencode($carpeta).'&subcarpeta='.$subcarpetaUrl.'" class="grid-item-link">
                        <p><i class="fas fa-folder"></i> '.htmlspecialchars($subcarpeta).'</p>
                    </a>
                </div>';
        }
        ?>
    </div>
  
    <?php if ($permisoUsuario == 2): ?>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crearaño">
            Crear Año <i class="bi bi-person-plus"></i>
        </button>
        <?php include 'crear_año.php'; ?>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
