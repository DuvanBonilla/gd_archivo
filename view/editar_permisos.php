<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../view/login.php');
    exit;
}
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

    <title>Empleados</title>
</head>
<body>
<a href="index.php"> <i class="fa-solid fa-circle-arrow-left fa-beat icon-back" style="color: #accd4a;"></i> </a>
<div id="modalContainer"></div>
</div>
    <div class="container" style="margin-top: 4%;padding: 5px">
        <table id="tablax" class="table table-striped table-bordered" style="width:100%">
            <h1>BASE DE DATOS DE EMPLEADOS</h1>
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>RazonSoc</th>
                    <th>Rol</th>
                    <th>Zona</th>
                    <th>Usuario</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $users = include '../model/consu_usuarios.php';
for ($i = 0; $i < count($users); ++$i) {
    $user = $users[$i];
    $Cedula = $user['Cedula'];
    // $Nombre = $empleado['Nombre'];
    // $Ubicacion = $empleado['Razonsoc'];
    // $Estado = $empleado['Rol'];
    // $Empresa = $empleado['Empresa'];
    echo '<tr>';
    echo '<td>'.$user['Cedula'].'</td>';
    echo '<td>'.$user['Nombre'].'</td>';
    echo '<td>'.$user['Razonsoc'].'</td>';
    echo '<td>'.$user['Rol'].'</td>';
    echo '<td>'.$user['Zona'].'</td>';
    echo '<td>'.$user['Usuario'].'</td>';


        echo '<td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Permisos">
                        Permisos <i class="bi bi-person-plus"></i>
        </button>
              </td>';
    
    echo '</tr>';
    include 'modal_editar_permisos.php';
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
    <script src="../controller/js/estado_empleado.js"></script>

</body>
</html>
