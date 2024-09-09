<?php
include 'conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = $_POST['cedula'] ?? '';
    $Fecharetiro = $_POST['Fecharetiro'] ?? '';

    if (!empty($cedula) && !empty($Fecharetiro)) {
        $db = new Conexion();
        $conexion = $db->conMysql();

        $sql = "UPDATE tbl_personas SET Fecharetiro = ?, Estado = 2 WHERE Cedula = ?";
        $stmt = $conexion->prepare($sql);

        if ($stmt === false) {
            echo "Error al preparar la consulta: " . $conexion->error;
            exit;
        }

        $stmt->bind_param("ss", $Fecharetiro, $cedula);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error de ejecución: " . $stmt->error;
        }

        $stmt->close();
        $conexion->close();
    } else {
        echo "error: campos vacíos";
    }
} else {
    echo "error: método no permitido";
}
?>
