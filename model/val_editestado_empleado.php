<?php

include 'conexion.php';
$conexion = (new Conexion())->conMysql();

$cedula = $_POST['cedula'];
$estadoNuevo = $_POST['estado'];

if ($estadoNuevo == 2 && !isset($_POST['actualizar'])) {
    // Cambio de 1 a 2: solo actualización del estado
    $sqlUpdate = 'UPDATE tbl_personas SET Estado = ? WHERE Cedula = ?';
    $stmtUpdate = $conexion->prepare($sqlUpdate);
    $stmtUpdate->bind_param('ss', $estadoNuevo, $cedula);

    if ($stmtUpdate->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmtUpdate->close();
} elseif ($estadoNuevo == 1 && isset($_POST['actualizar'])) {
    $fechaIngreso = $_POST['Fechaingreso'];
    $ubicacion = $_POST['Ubicacion'];

    // Obtener la información actual antes de actualizar
    $sqlCurrentData = 'SELECT Fechaingreso, Ubicacion FROM tbl_personas WHERE Cedula = ?';
    $stmtCurrentData = $conexion->prepare($sqlCurrentData);
    $stmtCurrentData->bind_param('s', $cedula);
    $stmtCurrentData->execute();
    $stmtCurrentData->bind_result($currentFechaIngreso, $currentUbicacion);
    $stmtCurrentData->fetch();
    $stmtCurrentData->close();

    // Guardar la información anterior en tbl_det_empleados
    $sqlBackup = 'INSERT INTO tbl_det_empleados (Cedula, Fecharetiro, Ubicacion) VALUES (?, ?, ?)';
    $stmtBackup = $conexion->prepare($sqlBackup);
    $stmtBackup->bind_param('sss', $cedula, $currentFechaIngreso, $currentUbicacion);
    $stmtBackup->execute();
    $stmtBackup->close();

    // Actualizar el estado y los campos en tbl_personas
    $sqlUpdate = 'UPDATE tbl_personas SET Estado = ?, Fechaingreso = ?, Ubicacion = ? WHERE Cedula = ?';
    $stmtUpdate = $conexion->prepare($sqlUpdate);
    $stmtUpdate->bind_param('ssss', $estadoNuevo, $fechaIngreso, $ubicacion, $cedula);

    if ($stmtUpdate->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmtUpdate->close();
}

$conexion->close();
