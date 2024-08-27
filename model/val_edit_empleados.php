<?php
include 'conexion.php';

$conexion = (new Conexion())->conMysql();

if (isset($_POST['Cedula'])) {
    $oldCedula = $_POST['OldCedula'];
    $cedula = $_POST['Cedula'];
    $nombre = $_POST['Nombre'];
    $ubicacion = $_POST['Ubicacion'];

    $sql = 'UPDATE tbl_personas SET Cedula = ?, Nombre = ?, Ubicacion = ? WHERE Cedula = ?';
    
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param('ssss', $cedula, $nombre, $ubicacion, $oldCedula);
        
        if ($stmt->execute()) {
            if ($cedula !== $oldCedula) {
                $oldPath = 'D:\\Gestion Docu\\Cargoban\\' . $oldCedula;
                $newPath = 'D:\\Gestion Docu\\Cargoban\\' . $cedula;
                
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

    (new Conexion())->cerrarConexion($conexion);
} else {
    header('Location: ../view/tabla_empleados.php');
    exit;
}