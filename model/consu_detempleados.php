<?php

require_once 'conexion.php';

function obtenerDatosEmpleado($Cedula,$Razonsoc)
{
    try {
        $conexion = new Conexion();
        $conMysql = $conexion->conMysql();

        // Preparamos la consulta para seleccionar los datos necesarios con JOIN
        $sql = $conMysql->prepare('
            SELECT d.Cedula, p.Nombre, d.Fecharetiro, d.Ubicacion, r.Descripcion
            FROM tbl_det_empleados d
            JOIN tbl_personas p ON d.Cedula = p.Cedula
            JOIN tbl_razonsoc r ON d.Empresa = r.Idrazon
            WHERE d.Cedula = ?
            AND p.Empresa = ?
            ' );
        $sql->bind_param('ss', $Cedula,$Razonsoc);  // Vinculamos el parámetro Cedula

        // Ejecutamos la consulta
        $sql->execute();

        // Obtenemos los resultados
        $resultado = $sql->get_result();

        if ($resultado->num_rows > 0) {
            // Recogemos todos los registros en un array asociativo si hay resultados
            $datos = $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            // Si no hay resultados, devolvemos un array vacío
            $datos = [];
        }

        // Cerrar el resultado y la declaración
        $resultado->free();
        $sql->close();

        // Cerrar la conexión
        $conMysql->close();

        return $datos;  // Devolvemos los registros o un array vacío
    } catch (Exception $e) {
        echo 'Error: '.$e->getMessage();

        return [];  // Devolvemos un array vacío en caso de error
    }
}
