<?php
session_start();
if(!isset($_SESSION["usuario"])){
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

    <!-- <link rel="stylesheet" href="css/empleados/modal/register_empleados.css"> -->
    <title>Paginacion</title>
</head>
<body>
<a href="index.php"> <i class="fa-solid fa-circle-arrow-left fa-beat icon-back" style="color: #accd4a;"></i> </a>
    <div class="container" style="margin-top: 4%;padding: 5px">
        <table id="tablax" class="table table-striped table-bordered" style="width:100%">
            <h1>BASE DE DATOS DEL PERSONAL</h1>
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Fecha ingreso</th>
                    <th>Editar</th>
                    <th>Carpetas</th>

                </tr>
            </thead>
            <tbody>
            <?php
            $empleados = include("../model/consu_empleados.php");
                for ($i = 0; $i < count($empleados); ++$i){
                    $empleado = $empleados[$i];
                    echo '<tr>';
                    echo '<td>'.$empleado['Cedula'].'</td>';
                    echo '<td>'.$empleado['Nombre'].'</td>';
                    echo '<td>'.$empleado['Ubicacion'].'</td>';
                    echo '<td>'.$empleado['Fechaingreso'].'</td>';
                    echo '<td><button class="btn btn-primary">Editar</button></td>';
                    echo '<td>
                    <button onclick="window.location.href=\'ver_carpetas.php?cedula=' . urlencode($empleado['Cedula']) . '&nombre=' . urlencode($empleado['Nombre']) . '\'" 
                            style="margin-left: 30%; background-color: #1c2355" 
                            class="btn btn-secondary">
                        <i class="fa-solid fa-folder-open"></i>
                    </button>
                  </td>';                   
                   echo '</tr>';
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
</body>
</html>
