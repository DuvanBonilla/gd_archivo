<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="css/empleados/modal/edit_empleados.css">
</head>
<div class="modal fade" id="editar<?php echo $Cedula; ?>" tabindex="-1" role="dialog" aria-labelledby="editar<?php echo $Cedula; ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editar<?php echo $Cedula; ?>Label">Editar Información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../model/val_edit_empleados.php" method="POST">
                    <input type="hidden" name="OldCedula" value="<?php echo $Cedula; ?>">
                    <div class="form-group">
                        <label for="Cedula<?php echo $Cedula; ?>">Cedula</label>
                        <input type="text" class="form-control" id="Cedula<?php echo $Cedula; ?>" name="Cedula" value="<?php echo $Cedula; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Nombre<?php echo $Cedula; ?>">Nombre</label>
                        <input type="text" class="form-control" id="Nombre<?php echo $Cedula; ?>" name="Nombre" value="<?php echo $Nombre; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Ubicacion<?php echo $Cedula; ?>">Ubicación</label>
                        <input type="text" class="form-control" id="Ubicacion<?php echo $Cedula; ?>" name="Ubicacion" value="<?php echo $Ubicacion; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Fechaingreso <?php echo $Cedula; ?>">Fecha de Ingreso</label>
                        <input type="date" class="form-control" name="Fechaingreso" id="Fechaingreso<?php echo $Cedula; ?>" name="Fechaingreso" value="<?php echo $Fechaingreso; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Fecharetiro <?php echo $Cedula; ?>">Fecha de Retiro</label>
                        <input type="date" class="form-control" name="Fecharetiro" id="Fecharetiro<?php echo $Cedula; ?>" name="Fecharetiro" value="<?php echo $Fecharetiro; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>