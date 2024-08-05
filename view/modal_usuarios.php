<input?php
session_start();
if(!isset($_SESSION["usuario"])){
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
    <link rel="stylesheet" href="css/empleados/modal/register_empleados.css">
    <title>Registros</title>
</head>
<body>
    <div class="modal fade" id="Registrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registrar Persona</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="bi bi-x" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

                    <form action="../controller/ctr_register_personas.php" method="POST">

                        <div class="row">
                        <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Cedula" class="form-label">Cedula</label>
                                    <input type="text" id="Cedula" name="Cedula" placeholder="Identificación"
                                        class="form-control1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Nombre" class="form-label">Nombre</label>
                                    <input type="text" id="Nombre" name="Nombre" placeholder="Nombre Completo"
                                        class="form-control1" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Empresa" class="form-label">Empresa</label>
                                    <select name="Empresa" class="form-control1" id="Empresa" required>
                                        <option value="1">cargob</option>
                                        <option value="2">oceanix</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Ubicación" class="form-label">Ubicación</label>
                                    <input type="text" id="Ubicación" name="Ubicacion" placeholder="Ubicación Física"
                                        class="form-control1" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="Fecha_ingreso" class="form-label">Fecha de ingreso</label>
                            <input type="date" name="Fechaingreso" id="Fechaingreso"  placeholder="Fecha de ingreso"
                             class="form-control1" required>
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

    <!-- Agrega aquí tus bibliotecas de JavaScript si es necesario -->
</body>

</html>