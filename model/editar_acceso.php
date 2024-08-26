<?php
include '../model/conexion.php';

$cedula = $_POST["cedula"];

// Asegúrate de verificar si hay datos en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Incluye la conexión a la base de datos
    $conexion = new Conexion();
    $conn = $conexion->conMysql();

    // Inicializa un contador de cambios
    $cambiosRealizados = 0;

    // Obtén los accesos enviados desde el formulario
    foreach ($_POST as $key => $value) {
        // Filtra las variables que comienzan con 'permiso_'
        if (strpos($key, 'permiso_') === 0) {
            // Extrae el ID del área desde el nombre del input (e.g.,'permiso_1' -> '1')
            $areaId = str_replace('permiso_', '', $key);

            // El valor será 1, 2 o 3, según el permiso seleccionado
            $permisoSeleccionado = (int)$value;

            // Realiza la actualización en la base de datos para cada área específica
            $stmt = $conn->prepare("UPDATE tbl_accesos SET Permiso = ? WHERE Cedula = ? AND Area = ?");
            $stmt->bind_param("iii", $permisoSeleccionado, $cedula, $areaId);
            // Ejecuta la actualización y verifica si se realizó correctamente
            if ($stmt->execute()) {
                $cambiosRealizados++;
            }
        }
    }

    // Cierra la conexión a la base de datos
    $stmt->close();
    $conn->close();

    // Verifica si se realizaron cambios
    if ($cambiosRealizados > 0) {
        // Redirige o muestra un mensaje de éxito
        header('Location: ../view/editar_permisos.php');
        exit;
    } else {
        // Manejo del error si no se realizaron cambios
        echo "No se realizaron cambios en los permisos.";
    }
}