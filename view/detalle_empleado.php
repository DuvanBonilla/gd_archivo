<?php
session_start();
$Razonsoc = $_SESSION["idEmpresa"];
$Cedula = $_GET['cedula'] ?? '';
require_once '../model/consu_detempleados.php';
$datosEmpleado = obtenerDatosEmpleado($Cedula,$Razonsoc);
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
    <link rel="stylesheet" href="css/empleados/detalle_empleados.css">
    <!-- --- font awesome --- -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">
    <title>Paginacion</title>
</head>
<body>
<a href="tabla_empleados.php"> <i class="fa-solid fa-circle-arrow-left fa-beat icon-back" style="color: #accd4a;"></i> </a>
    <div class="container" style="margin-top: 4%;padding: 5px">
        <table id="tablax" class="table table-striped table-bordered" style="width:100%">
            <h1>Ubicaciones Antiguas del Empleado</h1>
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha retiro</th>
                    <th>Ubicación</th>
                </tr>
            </thead>
           <tbody>
                <?php foreach ($datosEmpleado as $empleado) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($empleado['Cedula']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['Nombre']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['Descripcion']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['Fechaingreso']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['Fecharetiro']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['Ubicacion']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="../controller/js/detalle_empleados.js"></script>
</body>
</html>
