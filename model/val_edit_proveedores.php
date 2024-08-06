<?php
// Incluir la clase Conexion
include 'conexion.php';
    // Crear una instancia de la conexión
    $conexion = (new Conexion())->conMysql();

    // Verificar que se reciban los datos del formulario
    if (isset($_POST['Nit'])) {
        // Obtener los datos del formulario
        $nit = $_POST['Nit'];
        $nombre = $_POST['Nombre'];

        // Preparar la consulta SQL para actualizar el proveedor
        $sql = 'UPDATE tbl_proveedores SET Nombre = ? WHERE Nit = ?';

        if ($stmt = $conexion->prepare($sql)) {
            // Vincular los parámetros y ejecutar la consulta
            $stmt->bind_param('ss', $nombre, $nit);
            if ($stmt->execute()) {
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
                    location.assign('../view/tabla_proveedores.php');
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
                    location.assign('../view/tblusuarios.php');
                  });
        });
            </script>".$stmt->error;
            }
            $stmt->close();
        } else {
            echo 'Error en la preparación de la consulta: '.$conexion->error;
        }

        // Cerrar la conexión
        (new Conexion())->cerrarConexion($conexion);
    } else {
        // Redirigir si no se reciben datos
        header('Location: ../view/tabla_proveedores.php');
        exit;
    }
