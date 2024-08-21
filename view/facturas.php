<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <link rel="stylesheet" href="css/facturas/info_facturas.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">
   <link rel="stylesheet"   href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
   

</head>
<body>
<a href="index.php"> <i class="fa-solid fa-circle-arrow-left fa-beat icon-back" style="color: #accd4a;"></i> </a>
<div class="container mt-5">
    <h1>Info de Control Interno</h1>
    <br>
    <table id="tablax" class="table table-bordered" style= "text-align:center">
            <tr>
                <th>Carpetas</th>
                <th>Abrir</th>
                <th>Editar</th>
            </tr>
        
        <tbody>
            <?php
            // Incluir el archivo que consulta las carpetas y obtiene los nombres
            $carpetas = include '../model/carpetas_proveedores.php';

            // Mostrar las carpetas en la tabla
            if (is_array($carpetas)) {
                foreach ($carpetas as $carpeta) {
                    echo '<tr>';
                    echo '<td>'.htmlspecialchars($carpeta).'</td>';
                    echo '<form action="ver_carpetas.php" method="GET">';
                    echo '<td>';
                    echo '<input type="hidden" name="carpeta" value="'.htmlspecialchars($carpeta).'">';
                    echo '<a type="button" class="btn btn-primary" style= "margin-left: 5%;" onclick="window.location.href=\'ver_años_prove.php?carpeta='.urlencode($carpeta).'\';">
                            <i class="fa-solid fa-folder-open"></i>
                          </a>';
                    echo '<td>';
                    echo '<button type="button" class="btn btn-primary" style= "margin-left: 5%;" onclick="window.location.href=\'editar_años_prove.php?carpeta='.urlencode($carpeta).'\';">
                            <i class="fa-solid fa-pencil fa-2xl"></i>
                         </button>';
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
    
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crearcarpeta">Nueva Carpeta<i class="fa-solid fa-folder-plus"></i>
    </button>
    <?php include 'crear_carpeta_factura.php'; ?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="../controller/js/info_empleados.js"></script>
</body>
</html>
