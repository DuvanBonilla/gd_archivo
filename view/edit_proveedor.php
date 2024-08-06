<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="css/empleados/modal/edit_proveedores.css">
</head>
<div class="modal fade" id="editar<?php echo $Nit; ?>" tabindex="-1" role="dialog" aria-labelledby="editar<?php echo $Nit; ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editar<?php echo $Nit; ?>Label">Editar Información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../model/val_edit_proveedores.php" method="POST">
                    <input type="hidden" name="Nit" value="<?php echo $Nit; ?>">
                    <div class="form-group">
                        <label for="Nit<?php echo $Nit; ?>">Nit</label>
                        <input type="text" class="form-control" id="Nit<?php echo $Nit; ?>" name="Nit" value="<?php echo $Nit; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Nombre<?php echo $Nit; ?>">Nombre</label>
                        <input type="text" class="form-control" id="Nombre<?php echo $Nit; ?>" name="Nombre" value="<?php echo $Nombre; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Editar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
