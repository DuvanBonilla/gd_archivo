<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../view/login.php');
    exit;
}

// Obtener permisos del usuario
$permisos = include "../model/consu_permisos_usuario.php";

// Obtener parámetros de la URL
$idArea = isset($_SESSION['area']) ? intval($_SESSION['area']) : 0;
$nombreArea = isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '';

// Verificar permiso del usuario para la área actual
$permisoUsuario = null;
foreach ($permisos as $permiso) {
    if ($permiso['Area'] == $idArea) {
        $permisoUsuario = $permiso['Permiso'];
        break;
    }
}

// Incluir el archivo que obtiene la lista de archivos
include '../model/ver_info_carpetas.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos en Carpeta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/empleados/info_empleados.css">
</head>
<body>
<a href="ver_años_carpetas.php?area=<?php echo $idArea; ?>&carpeta=<?php echo urlencode($_GET['carpeta']); ?>&subcarpeta=<?php echo urlencode($_GET['subcarpeta']); ?>" class="icon-back-link">
    <i class="fa-solid fa-circle-arrow-left fa-beat icon-back"></i>
</a>

    <div class="container" style="margin-top: 4%;padding: 5px">
        <h1>Información Del Año<br>
        <strong><?php echo htmlspecialchars($_GET['subcarpeta']); ?></strong></h1>

        <table id="tablax" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Archivo</th>
                    <th>Ver</th>
                    <th>Descargar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($archivos as $archivo) {
                    $archivoUrl = urlencode($archivo); // Codifica el nombre del archivo para la URL
                    echo '<tr>
                            <td>'.htmlspecialchars($archivo).'</td>
                            <td><a href="../model/ver_archivos_carpetas.php?carpeta='.urlencode($_GET['carpeta']).'&subcarpeta='.urlencode($_GET['subcarpeta']).'&archivo='.$archivoUrl.'" class="btn btn-success" target="_blank">Ver</a></td>
                           <td><a href="../model/descargar_arch_años.php?carpeta='.urlencode($_GET['carpeta']).
                           '&subcarpeta='.urlencode($_GET['subcarpeta']).
                           '&archivo='.$archivoUrl.'" class="btn btn-primary">Descargar</a></td>
                           <td>
                                <a href="../model/eliminar_archivos_carpetas.php?nombreArea='.$nombreArea.'&carpeta='.urlencode($_GET['carpeta']).'&subcarpeta='.urlencode($_GET['subcarpeta']).'&archivo='.$archivoUrl.'" 
                                class="btn btn-danger" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este archivo?\');">
                                 <i class="fas fa-trash-alt"></i> 
                            </a>
                            </td>
                            
                          
                           </tr>';
                }
                ?>
            </tbody>
        </table>
        
        <?php if ($permisoUsuario == 2): ?>
            <div style="text-align: center; margin-top: 20px;">
                    <form action="../model/subir_archivos_carpetas.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="carpeta" value="<?php echo htmlspecialchars($_GET['carpeta']); ?>">
                        <input type="hidden" name="subcarpeta" value="<?php echo htmlspecialchars($_GET['subcarpeta']); ?>">
        
                        <!-- Input para seleccionar múltiples archivos -->
                        <input type="file" name="archivo[]" id="fileInput" style="display: none;" multiple onchange="this.form.submit();">
        
                        <!-- Label que actúa como botón -->
                        <label for="fileInput" class="btn btn-secondary">Subir archivos</label>
                    </form>
             </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="../controller/js/info_empleados.js"></script>
</body>
</html>
