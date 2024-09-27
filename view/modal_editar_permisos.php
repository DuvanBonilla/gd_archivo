<?php
if (!isset($_SESSION["usuario"])) {
    header('location: ../view/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.ico.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register/modal_editar_permisos.css" />
    <title>Registros</title>
</head>

<body>
    <div class="modal fade" id="Permisos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Editar Permisos - Área</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                     <i class="bi bi-x" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Aquí se cargará el contenido dinámico -->
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para Permisos por Empresa -->
    <div class="modal fade" id="PermisosEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Editar Permisos - Empresa</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="bi bi-x" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                </div>                  
                         
            </div>
        </div>
    </div>

</body>

</html>
