<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../view/login.php');
    exit;
}
$carpetas = include "../model/carpetas.php";
$permisos = include "../model/consu_permisos_usuario.php";

$idArea = isset($_GET['area']) ? intval($_GET['area']) : 0;
$_SESSION['area'] = $idArea;
$nombreArea = isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '';
$_SESSION['nombre'] = $nombreArea;
$idEmpresa = $_SESSION["idEmpresa"];

$permisoUsuario = null;
foreach ($permisos as $permiso) {
    if ($permiso['Area'] == $idArea) {
        $permisoUsuario = $permiso['Permiso'];
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpetas</title>
    <link rel="stylesheet" href="css/carpetas/info_carpetas.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<a href="index.php?idEmpresa=<?php echo $idEmpresa; ?>"> 
    <i class="fa-solid fa-circle-arrow-left fa-beat icon-back" style="color: #accd4a;"></i>
</a>
<div class="container mt-5">
    <br>
    <strong><h1>Información de:  <?php echo htmlspecialchars($nombreArea); ?></strong></h1>
    <br>
    <table id="tablax" class="table table-bordered" style="text-align:center">
        <thead>
            <tr>
                <th>Carpetas</th>
                <th>Abrir</th>
                <?php if ($permisoUsuario == 2): ?>
                    <th>Editar</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Mostrar las carpetas en la tabla
            if (is_array($carpetas)) {
                foreach ($carpetas as $carpeta) {
                    $carpetaEscapada = htmlspecialchars($carpeta);
                    $modalId = 'ednombre_' . str_replace(' ', '_', $carpetaEscapada); 
                    echo '<tr>';
                    echo '<td>'. $carpetaEscapada .'</td>';
                    echo '<form action="ver_carpetas.php" method="GET">';
                    echo '<td>';
                    echo '<input type="hidden" name="carpeta" value="'. $carpetaEscapada .'">';
                    echo '<a type="button" class="btn btn-primary" style="margin-left: 5%;" onclick="window.location.href=\'ver_años_carpetas.php?carpeta='.urlencode($carpeta).'\';">
                            <i class="fa-solid fa-folder-open"></i>
                          </a>';
                    echo '</td>';

                    // Solo mostrar el botón de editar si el usuario tiene permiso para editar
                    if ($permisoUsuario == 2) {
                        echo '<td>';
                        echo '<button type="button" class="btn btn-primary" style="margin-left: 5%;" data-toggle="modal" data-target="#' . $modalId . '">
                                <i class="fa-solid fa-pencil fa-2xl"></i>
                              </button>';
                        echo '</td>';
                    }
                    
                    echo '</form>';
                    echo '</tr>';

                    include 'modal_editcarpeta.php';
                }
            } else {
                echo '<tr><td colspan="3">No se pudieron cargar las carpetas.</td></tr>';
            }
            ?>
        </tbody>
    </table>
    
    <?php if ($permisoUsuario == 2): ?>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crearcarpeta">
            Nueva Carpeta<i class="fa-solid fa-folder-plus"></i>
        </button>
    <?php endif; ?>
    
    <?php include 'crear_carpeta.php'; ?>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="../controller/js/info_empleados.js"></script>
</body>
</html>
