<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../view/login.php');
    exit;
}

require_once '../model/conexion.php';
require_once '../model/val_register.php';

$conexion = new Conexion();
$conMysql = $conexion->conMysql();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cedula']) && isset($_POST['nombre'])) {
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $razon_social = $_POST['razon_social'];
        $rol = 1;
        $zona = 1;
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Obtener las empresas seleccionadas y sus estados
        // $empresasSeleccionadas = isset($_POST['empresa']) ? $_POST['empresa'] : [];
        $empresaEstados = isset($_POST['empresaEstado']) ? $_POST['empresaEstado'] : [];

        $empresasConEstados = [];
        foreach ($empresaEstados as $empresaId => $estado) {
            // Agregar cada empresa con su estado, si no existe un estado se asigna '2' por defecto
            $estado = !empty($estado) ? $estado : '2';
            $empresasConEstados[] = [
                'id' => $empresaId,
                'estado' => $estado,
            ];
        }

        if (isset($_POST['areas'])) {
            $areasSeleccionadas = $_POST['areas'];
            $areasConEstados = [];

            foreach ($areasSeleccionadas as $idArea => $valorSeleccionado) {
                $areasConEstados[] = [
                    'id' => $idArea,
                    'estado' => $valorSeleccionado,
                ];
            }
        }
        $valRegister = new val_register_personas();
        $valRegister->AggUser($cedula, $nombre, $razon_social, $rol, $zona, $usuario, $contrasena, $empresasConEstados, $areasConEstados, $conMysql);
    }
}
