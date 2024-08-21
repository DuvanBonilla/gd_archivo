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
    <a href="facturas.php" class="icon-back-link">
        <i class="fa-solid fa-circle-arrow-left fa-beat icon-back"></i>
    </a>
    <a href="index.php" class="icon-back-menu">
        <i class="fa-solid fa-right-from-bracket"></i>
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
                </tr>
            </thead>
            <tbody>
                <?php
                include '../model/ver_info_facturas.php';
        foreach ($archivos as $archivo) {
            $archivoUrl = urlencode($archivo); // Codifica el nombre del archivo para la URL
            echo '<tr>
                    <td>'.htmlspecialchars($archivo).'</td>
                    <td><a href="../model/ver_archivos_facturas.php?carpeta='.urlencode($_GET['carpeta']).'&subcarpeta='.urlencode($_GET['subcarpeta']).'&archivo='.$archivoUrl.'" class="btn btn-success"  target="_blank">Ver</a></td>
                   <td><a href="../model/descargar_arch_factu.php?carpeta='.urlencode($carpeta).'&subcarpeta='.urlencode($subcarpeta).'&archivo='.urlencode($archivo).'" class="btn btn-primary">Descargar</a></td>
                  </tr>';
        }
        ?>
            </tbody>
        </table>
        <div style="text-align: center; margin-top: 20px;">
            <form action="../model/subir_archivos_facturas.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="carpeta" value="<?php echo htmlspecialchars($_GET['carpeta']); ?>">
                <input type="hidden" name="subcarpeta" value="<?php echo htmlspecialchars($_GET['subcarpeta']); ?>">
                
                <!-- Input para seleccionar archivos -->
                <input type="file" name="archivo" id="fileInput" style="display: none;" onchange="this.form.submit();">
                
                <!-- Label que actúa como botón -->
                <label for="fileInput" class="btn btn-secondary">Subir archivos</label>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="../controller/js/info_empleados.js"></script>
</body>
</html>
