<?php
include '../model/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['Cedula'])) {

        $cedula = $_POST['Cedula'];
        $conexion = new Conexion();
        $conn = $conexion->conMysql();

        if ($conn->connect_error) {
            die('Error de conexión: ' . $conn->connect_error);
        }
        foreach ($_POST as $key => $value) {
           
            if (strpos($key, 'Estado_') === 0) {
                $empresaId = str_replace('Estado_', '', $key);

                $permisoSeleccionado = (int)$value;
                if (!in_array($permisoSeleccionado, [1, 2])) {
                    continue; 
                }
                // Realizar la actualización en la base de datos
                $stmt = $conn->prepare("UPDATE tbl_per_empresa SET Estado = ? WHERE Cedula = ? AND Empresa = ?");
                if ($stmt) {
                    $stmt->bind_param("isi", $permisoSeleccionado, $cedula, $empresaId);
                    if (!$stmt->execute()) {
                        echo 'Error al actualizar el permiso para la empresa ID: ' . $empresaId . ' - ' . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo 'Error al preparar la consulta: ' . $conn->error;
                }
            }
        }

        // Cerrar la conexión
        $conexion->cerrarConexion($conn);

        header('Location: ../view/editar_permisos.php');
        exit;
    } else {
        echo 'Cédula no proporcionada';
    }
} else {
    echo 'Método no permitido';
}
?>
