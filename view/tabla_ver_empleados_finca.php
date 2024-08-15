<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../view/login.php');
    exit;
}
$finca = $_GET["finca"];

$fincas = array(
    "8" => "La Gira",
    "9" => "Tierra Grata",
    "10" => "Bananova",
);

$zona = array(
    "1" => "Uraba",
    "2" => "Santa Marta",
    "3" => "Medellin",
);
$estado = array(
    "1" => '<i class="fa-solid fa-check-circle" style="color: green;"></i>',
    "2" => '<i class="fa-solid fa-times-circle" style="color: red;"></i>'
);

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
    <link rel="stylesheet" href="css/empleados/info_empleados.css">
    <!-- --- font awesome --- -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">
    <title></title>
</head>
<body>
<a href="elegir_tabla_finca.php?finca=<?php echo urlencode($finca); ?>"> <i class="fa-solid fa-circle-arrow-left fa-beat icon-back" style="color: #accd4a;"></i> </a>
<div id="modalContainer"></div>
</div>
    <div class="container" style="margin-top: 4%;padding: 5px">
        <table id="tablax" class="table table-striped table-bordered" style="width:100%">
            <h1>Empleados de la finca <br> <strong> <?php echo $fincas[$finca] ?>.</strong></h1>
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Zona</th>
                    <th>Ubicacion</th>
                    <th>Fecha ingreso</th>
                    <th>Estado</th>
                    <th>Carpetas</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require_once ("../model/ver_empleados_fincas.php");
                    require_once ("../model/conexion.php");
                    $conexion = new Conexion;
                    $conMysql = $conexion->conMysql();
                    $empleados = new EmpleadosFincas;
                    $resultado = $empleados->BuscarEmpleados($finca,$conMysql);
                    if ($resultado != false){
                        foreach($resultado as $resultados){
                            echo '<td>'.$resultados['Cedula'].'</td>';
                            echo '<td>'.$resultados['Nombre'].'</td>';
                            echo '<td>'.$zona[$resultados['Zona']].'</td>';
                            echo '<td>'.$resultados['Ubicacion'].'</td>';
                            echo '<td>'.$resultados['Fechaingreso'].'</td>';
                            echo '<td>'.$estado[$resultados['Estado']];'</td>';
                            echo '<td>'.$resultados['Carpetas'].'</td>';
                        }
                    }
                ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Registrar">
            Nuevo Registro <i class="bi bi-person-plus"></i>
        </button>
        <?php include 'modal_empleado.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="../controller/js/info_empleados.js"></script>
    <!-- <script src="../controller/js/estado_empleado.js"></script> -->

</body>
</html>
