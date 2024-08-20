<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/empleados/info_empleados.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Info de Control Interno</h1>
    <br>
    <table id="tablax" class="table table-bordered">
        <thead>
            <tr>
                <th>Año</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Incluir el archivo que consulta las carpetas y obtiene los nombres
            $carpetas = include '../model/carpetas_años.php';

            // Mostrar las carpetas en la tabla
            if (is_array($carpetas)) {
                foreach ($carpetas as $carpeta) {
                    echo '<tr>';
                    echo '<td>'.htmlspecialchars($carpeta).'</td>';
                    echo '<td>';
                    echo '<form action="ver_carpetas.php" method="GET">';
                    echo '<input type="hidden" name="carpeta" value="'.htmlspecialchars($carpeta).'">';
                    echo '<button type="button" class="btn btn-primary" onclick="window.location.href=\'ver_facturas.php?carpeta='.urlencode($carpeta).'\';">Ver</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="2">No se pudieron cargar las carpetas.</td></tr>';
            }
            ?>
        </tbody>
    </table>
    
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crearaño">
        Crear nuevo año <i class="bi bi-person-plus"></i>
    </button>
    <?php include 'crear_año.php'; ?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="../controller/js/info_empleados.js"></script>
</body>
</html>
