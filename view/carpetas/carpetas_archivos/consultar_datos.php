<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header('location: ../../../../login.php');
    exit;
}

$cedula = $_GET["cedula"];
$nombre = $_GET["nombre"];
$carpeta = $_GET["carpeta"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.ico.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/empleados/info_empleados.css">
    <!-- --- font awesome --- -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">

    <title>Tabla archivos</title>
</head>
<body>
<a href="../../ver_carpetas.php?cedula=<?php echo urlencode($cedula); ?>&nombre=<?php echo urlencode($nombre); ?>&carpeta=<?php echo urlencode($carpeta); ?>"> 
    <i class="fa-solid fa-circle-arrow-left fa-beat icon-back" style="color: #accd4a;"></i> 
</a>
    <div class="container" style="margin-top: 4%;padding: 5px">
        <table id="tablax" class="table table-striped table-bordered" style="width:100%">
        <h1>Archivos de 
        <strong><?php echo htmlspecialchars($nombre); ?> :<br> <?php echo htmlspecialchars($carpeta); ?></strong></h1>           
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
                require_once("../../../model/val_mostrar_carpetas.php");
                $archivos = obtenerCarpetaPorId($cedula,$carpeta);
                if ($archivos) {
                    foreach ($archivos as $archivo) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($archivo['nombre']) . '</td>';
                        echo "<td><a href='../../../model/ver_archivos.php?archivo=".urlencode($archivo['ruta'])."' target='_blank' class='btn btn-light'style='margin-left: 40%;color:#1997bd' ><i class='fas fa-eye'></i></a></td>";
                        echo "<td><a href='../../../model/descargar_archivos.php?archivo=".$archivo['ruta']."' target='_blank' class='btn btn-light'style='margin-left: 40%; color:#a8ce3b'><i class='fas fa-file-download'></i></a></td>";
                        echo "<td>
                                <a href='../../../model/eliminar_archivos.php?archivo=" . urlencode($archivo['ruta']) . "&cedula=" . urlencode($cedula) . "&carpeta=" . urlencode($carpeta) . "&nombre=" . urlencode($nombre) . "' 
                                class='popup-button update-delete-button' 
                                style='margin-left: 40%;' 
                                onclick=\"return confirm('¿Estás seguro de que deseas eliminar este archivo?');\">
                                    <i class='fas fa-trash-alt'></i>
                                </a>
                            </td>";
                        echo '</tr>';

                    }
                } else {
                    echo '<tr><td colspan="2">No se encontraron archivos.</td></tr>';
                }
            ?>
            </tbody>
        </table>
        <div style="text-align: center; margin-top: 20px;">
    <form action="../../../model/subir_archivos_empleados.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="cedula" value="<?php echo htmlspecialchars($cedula); ?>">
        <input type="hidden" name="carpeta" value="<?php echo htmlspecialchars($carpeta); ?>">
        <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">

        
        <!-- Input para seleccionar múltiples archivos -->
        <input type="file" name="archivo[]" id="fileInput" style="display: none;" multiple onchange="this.form.submit();">
        
        <!-- Label que actúa como botón -->
        <label for="fileInput" class="btn btn-secondary">Subir archivos</label>
    </form>
</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- <script src="../../controller/js/info_empleados.js"></script> -->
</body>
</html>
