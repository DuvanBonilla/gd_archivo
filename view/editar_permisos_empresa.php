<?php
if(!isset($_SESSION["usuario"])){
  header('location: ../view/login.php');
    exit;
}

$permi = include "../model/consu_permiso_empresas.php";


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
    <div class="modal fade" id="PermisosEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registrar Empleado</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="bi bi-x" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
              <form action="../model/editar_permis.php" method = "POST">
           
              <table>
    <thead>
        <tr>
            <th>Empresa</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Ninguno</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $Empresas = include '../model/consu_elegir_empresa.php';
        foreach ($permi as $permis) {
            echo '<tr>';
            
            // Encontrar el nombre del área correspondiente al permis actual
            $nombreEmpresa = '';
            foreach ($Empresas as $empresa) {
                if ($empresa['Idrazon'] == $permis['Empresa']) {
                    $nombreArea = $empresa['Descripcion'];
                    break;
                }
            }
            echo "<td>" . htmlspecialchars($nombreArea) . "</td>";
        
            // Usar el mismo nombre para los radios de una misma fila
            $radioName = "permiso_" . $permis['Empresa'];
            
            echo "<td> 
                   <label class='switch'> 
                       <input type='radio' class='update-delete-button' 
                              name='$radioName' value='1' " . ($permis['Permiso'] == 1 ? 'checked' : '') . "> 
                       <span class='slider round'></span>
                   </label>
                 </td>";
            echo "<td> 
                   <label class='switch'> 
                       <input type='radio' class='update-delete-button' 
                              name='$radioName' value='2' " . ($permis['Permiso'] == 2 ? 'checked' : '') . "> 
                       <span class='slider round'></span>
                   </label>
                 </td>";
    
        }
        ?>  
           <div class="form-group">
           <input type="text" name="cedula" hidden value="<?php echo htmlspecialchars($permis['Cedula']); ?>" id="cedula" placeholder="Número de cédula" required/>
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