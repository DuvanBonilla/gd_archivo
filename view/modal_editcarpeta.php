<!-- <!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="css/empleados/modal/edit_empleado.css">
</head> -->
<!-- modal_editcarpeta.php -->
<?php
$carpeta = htmlspecialchars($carpeta); // Sanitiza el nombre de la carpeta
$modalId = 'ednombre_' . str_replace(' ', '_', $carpeta); // Reemplaza espacios con '_'
?>
<div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="editarLabel_<?php echo $modalId; ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarLabel_<?php echo $modalId; ?>">Editar Nombre de Carpetas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../model/val_edit_carpeta.php" method="POST">
                    <input type="hidden" name="carpeta" value="<?php echo $carpeta; ?>">
                    <div class="form-group">
                        <label for="Nombre_<?php echo $modalId; ?>">Nombre</label>
                        <input type="text" class="form-control" id="Nombre_<?php echo $modalId; ?>" name="Nombre" value="<?php echo $carpeta; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

