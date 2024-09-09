<!-- modal_fecharetiro.php -->
<div class="modal fade" id="modalFechaRetiroModal" tabindex="-1" aria-labelledby="modalFechaRetiroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFechaRetiroLabel">Fecha de Retiro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-fecha-retiro" action="../model/val_fecha_retiro.php" method="POST">
          <div class="form-group">
            <label for="modalFechaRetiroCedula">Cédula</label>
            <input type="text" name="cedula" class="form-control" id="modalFechaRetiroCedula" readonly>
          </div>
          <div class="form-group">
            <label for="modalFechaRetiro">Fecha de Retiro</label>
            <input type="date" name="fecharetiro" class="form-control" id="modalFechaRetiro" required>
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
