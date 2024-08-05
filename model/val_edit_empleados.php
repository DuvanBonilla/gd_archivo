<?php

// Incluir la clase Conexion
include 'conexion.php';

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar':
            editar();
            break;
    }
}
    // Crear una instancia de la conexión
    $conexion = (new Conexion())->conMysql();

    // Verificar que se reciban los datos del formulario
    if (isset($_POST['Cedula'])) {
        // Obtener los datos del formulario
        $cedula = $_POST['Cedula'];
        $nombre = $_POST['Nombre'];
        $ubicacion = $_POST['Ubicacion'];

        // Preparar la consulta SQL para actualizar el empleado
        $sql = 'UPDATE tbl_personas SET Nombre = ?, Ubicacion = ? WHERE Cedula = ?';

        if ($stmt = $conexion->prepare($sql)) {
            // Vincular los parámetros y ejecutar la consulta
            $stmt->bind_param('sss', $nombre, $ubicacion, $cedula);
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

        // Cerrar la conexión
        (new Conexion())->cerrarConexion($conexion);
    } else {
        // Redirigir si no se reciben datos
        header('Location: ../view/tabla_empleados.php');
        exit;
    }
