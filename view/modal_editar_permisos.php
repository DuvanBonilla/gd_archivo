<?php
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    header('location: ../view/login.php');
    exit;
}

// Cargar los accesos de áreas y empresas
$accesos = include "../model/consu_permisos_usuario.php";
$permi = include "../model/consu_permiso_empresas.php";

// Cargar las áreas y las empresas
$areas = include '../model/consultar_area.php';
$Empresas = include '../model/consu_elegir_empresa.php';
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

    <!-- Modal para Permisos por Área -->
    <div class="modal fade" id="Permisos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Editar Permisos - Área</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="bi bi-x" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                    <form action="../model/editar_acceso.php" method="POST">
                        <table>
                            <thead>
                                <tr>
                                    <th>Area</th>
                                    <th>Ver</th>
                                    <th>Editar</th>
                                    <th>Ninguno</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($accesos as $acceso) {
                                    echo '<tr>';
                                    
                                    // Obtener el nombre del área
                                    $nombreArea = '';
                                    foreach ($areas as $area) {
                                        if ($area['Idarea'] == $acceso['Area']) {
                                            $nombreArea = $area['NombreA'];
                                            break;
                                        }
                                    }
                                    echo "<td>" . htmlspecialchars($nombreArea) . "</td>";
                                    
                                    // Radio buttons para permisos de área
                                    $radioName = "permiso_" . $acceso['Area'];
                                    echo "<td><label class='switch'><input type='radio' name='$radioName' value='1' " . ($acceso['Permiso'] == 1 ? 'checked' : '') . "><span class='slider round'></span></label></td>";
                                    echo "<td><label class='switch'><input type='radio' name='$radioName' value='2' " . ($acceso['Permiso'] == 2 ? 'checked' : '') . "><span class='slider round'></span></label></td>";
                                    echo "<td><label class='switch'><input type='radio' name='$radioName' value='3' " . ($acceso['Permiso'] == 3 ? 'checked' : '') . "><span class='slider round'></span></label></td>";
                                    echo '</tr>';
                                }
                                ?>
                                <div class="form-group">
                                    <input type="text" name="cedula" hidden value="<?php echo htmlspecialchars($acceso['Cedula']); ?>" id="cedula" placeholder="Número de cédula" required />
                                </div>
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
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
                    <form action="../model/editar_permiso_empresa.php" method="POST">
                        <table>
                            <thead>
                                <tr>
                                    <th>Empresa</th>
                                    <th>Activo</th>
                                    <th>Denegado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($permi as $permis) {
                                    echo '<tr>';
                                    
                                    // Obtener el nombre de la empresa
                                    $nombreEmpresa = '';
                                    foreach ($Empresas as $empresa) {
                                        if ($empresa['Idrazon'] == $permis['Empresa']) {
                                            $nombreEmpresa = $empresa['Descripcion'];
                                            break;
                                        }
                                    }
                                    echo "<td>" . htmlspecialchars($nombreEmpresa) . "</td>";
                                    
                                    // Radio buttons para permisos de empresa
                                    $radioName = "permiso_em" . $permis['Empresa'];
                                    echo "<td><label class='switch'><input type='radio' name='$radioName' value='1' " . ($permis['Estado'] == 1 ? 'checked' : '') . "><span class='slider round'></span></label></td>";
                                    echo "<td><label class='switch'><input type='radio' name='$radioName' value='2' " . ($permis['Estado'] == 2 ? 'checked' : '') . "><span class='slider round'></span></label></td>";
                                    echo '</tr>';
                                }
                                ?>
                                <div class="form-group">
                                    <input type="text" name="cedula" hidden value="<?php echo htmlspecialchars($permis['Cedula']); ?>" id="cedula" placeholder="Número de cédula" required />
                                </div>
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
