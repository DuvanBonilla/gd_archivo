<?php
include '../model/conexion.php';
$cedula = $_POST["cedula"];

// Asegúrate de verificar si hay datos en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Incluye la conexión a la base de datos
    $conexion = new Conexion();
    $conn = $conexion->conMysql();
    // Obtén los accesos enviados desde el formulario
    foreach ($_POST as $key => $value) {
        // Filtra las variables que comienzan con 'permiso_'
        if (strpos($key, 'permiso_em') === 0) {
            // Extrae el ID de la empresa desde el nombre del input (e.g., 'permiso_1' -> '1')
            $empresaId = str_replace('permiso_em', '', $key);
            
            // El valor será 1, 2 o 3, según el permiso seleccionado
            $permisoSeleccionado = (int)$value;
            
            // Realiza la actualización en la base de datos
            // $stmt = $conn->prepare("UPDATE tbl_accesos SET Permiso = ? WHERE Cedula = ? AND Area = ?");

            $stmt = $conn->prepare("UPDATE tbl_per_empresa SET Estado = ? WHERE Cedula = ? AND Empresa = ?");
            $stmt->bind_param("iii", $permisoSeleccionado, $cedula, $empresaId);
            $stmt->execute();
        }
    }
    // Redirige o muestra un mensaje de éxito
    header('Location: ../view/editar_permisos.php');
    exit;
}
