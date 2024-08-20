<div class="modal fade" id="crearaño" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Crear Nuevo Año</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="bi bi-x" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                    <form action="../model/crear_año.php" method="POST">
                    <div class="col-12">
                     <label for="Fechaingreso" class="form-label">Año para registrar</label>
                     <input type="number" name="Fechaingreso" id="Fechaingreso" placeholder="Nuevo año" class="form-control" min="1900" max="2099" step="1" required>
                    </div>
                        <br>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>