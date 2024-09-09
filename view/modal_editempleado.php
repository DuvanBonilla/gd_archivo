<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-editar" action="../model/val_editestado_empleado.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Edite la Fecha y Ubicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cedula" id="modalCedula">
                    <input type="hidden" name="estado" value="1">
                    
                    <div class="form-group">
                        <label for="Fechaingreso">Fecha de Ingreso</label>
                        <input type="date" class="form-control" name="FechaIngreso" id="modalFechaIngreso" class="form-control1" required>
                    </div>
                    <div class="form-group">
                        <label for="Ubicacion">Nueva Ubicación</label>
                        <input type="text" class="form-control" name="Ubicacion" id="modalUbicacion" placeholder="Nueva Ubicación" class="form-control1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
