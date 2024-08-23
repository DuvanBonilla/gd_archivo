<div class="modal fade" id="crearcarpeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Crear Carpeta Nueva</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="bi bi-x" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                    <form action="../model/crear_carpeta.php" method="POST">
                    <div class="col-12">
                     <label for="Nuevonombre" class="form-label">Nombre para registrar</label>
                     <input type="text" name="Nuevonombre" id="Nuevonombre" placeholder="Nuevo Nombre" class="form-control" required>
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