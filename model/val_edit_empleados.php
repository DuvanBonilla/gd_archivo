<?php
session_start(); 
include 'conexion.php';

$conexion = (new Conexion())->conMysql();

if (isset($_POST['Cedula'])) {
    $oldCedula = $_POST['OldCedula'];
    $cedula = $_POST['Cedula'];
    $nombre = $_POST['Nombre'];
    $ubicacion = $_POST['Ubicacion'];
    $idEmpresa = $_SESSION["idEmpresa"];

    // Mapeo de ID de empresa a rutas
    $rutas = [
        1 => 'R:/Gestion_Docu/Cargoban/Empleados',
        2 => 'R:/Gestion_Docu/Oceanix/Empleados',
        3 => 'R:/Gestion_Docu/Solutempo/Empleados',
        4 => 'R:/Gestion_Docu/Cargoban_SAS/Empleados',
        5 => 'R:/Gestion_Docu/Agencia_de_Aduanas/Empleados',
        6 => 'R:/Gestion_Docu/Fundacion_Cargoban/Empleados',
        7 => 'R:/Gestion_Docu/Tase/Empleados',
        8 => 'R:/Gestion_Docu/Opyservis/Empleados',
        9 => 'R:/Gestion_Docu/Tierra_Grata/Empleados',
        10 => 'R:/Gestion_Docu/Bananova/Empleados',
        11 => 'R:/Gestion_Docu/Gira/Empleados',
        12 => 'R:/Gestion_Docu/Palmonte/Empleados',
        13 => 'R:/Gestion_Docu/Principio_Comercial/Empleados'
    ];

    // Seleccionar la ruta correspondiente
    $rutaBase = isset($rutas[$idEmpresa]) ? $rutas[$idEmpresa] : null;

    if ($rutaBase !== null) {
        $sql = 'UPDATE tbl_personas SET Cedula = ?, Nombre = ?, Ubicacion = ? WHERE Cedula = ?';
        
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param('ssss', $cedula, $nombre, $ubicacion, $oldCedula);
            
            if ($stmt->execute()) {
                if ($cedula !== $oldCedula) {
                    $oldPath = $rutaBase . '\\' . $oldCedula;
                    $newPath = $rutaBase . '\\' . $cedula;
                    
                    if (file_exists($oldPath)) {
                        rename($oldPath, $newPath);
                    } else {
                        echo "<script>alert('La carpeta original no existe.');</script>";
                    }
                }
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'El registro fue actualizado correctamente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 5000
                      }).then(() => {
                        location.assign('../view/tabla_empleados.php');
                      });
                });
                </script>";
                exit;
            } else {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Algo salió mal. Intenta de nuevo',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 1500
                      }).then(() => {
                        location.assign('../view/tabla_empleados.php');
                      });
                });
                </script>".$stmt->error;
            }
            $stmt->close();
        } else {
            echo 'Error en la preparación de la consulta: '.$conexion->error;
        }
    } else {
        echo "<script>alert('ID de empresa no válido.');</script>";
    }

    (new Conexion())->cerrarConexion($conexion);
} else {
    header('Location: ../view/tabla_empleados.php');
    exit;
}

