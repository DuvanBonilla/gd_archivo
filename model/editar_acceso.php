<?php
include '../model/conexion.php';

$cedula = $_POST["Cedula"];

// Asegúrate de verificar si hay datos en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Incluye la conexión a la base de datos
    $conexion = new Conexion();
    $conn = $conexion->conMysql();

    $cambiosRealizados = 0;

    foreach ($_POST as $key => $value) {
        // Filtra las variables que comienzan con 'permiso_'
        if (strpos($key, 'permiso_') === 0) {
            // Extrae el ID del área desde el nombre del input (e.g.,'permiso_1' -> '1')
            $areaId = str_replace('permiso_', '', $key);

            // El valor será 1, 2 o 3, según el permiso seleccionado
            $permisoSeleccionado = (int)$value;

            $stmt = $conn->prepare("UPDATE tbl_accesos SET Permiso = ? WHERE Cedula = ? AND Area = ?");
            $stmt->bind_param("isi", $permisoSeleccionado, $cedula, $areaId);

            // Ejecuta la actualización y verifica si se realizó correctamente
            if ($stmt->execute()) {
               
                if ($stmt->affected_rows > 0) {
                    $cambiosRealizados++;
                } else {
                    
                    echo "No se encontraron coincidencias para Cedula: $cedula y Area: $areaId.<br>";
                }
            } else {
                echo "Error al ejecutar la consulta: " . $stmt->error . "<br>";
            }
        }
    }

    $stmt->close();
    $conn->close();

    // Verifica si se realizaron cambios
    if ($cambiosRealizados > 0) {
        // Redirige o muestra un mensaje de éxito
        header('Location: ../view/editar_permisos.php');
        exit;
    } else {
     
        echo "No se realizaron cambios en los permisos.";
    }
}
