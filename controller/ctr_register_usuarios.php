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
        $rol = $_POST['rol'];
        $zona = $_POST['zona'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $areasSeleccionadas = $_POST['areas'] ?? [];
        // Obtener las empresas seleccionadas y sus estados
        $empresaEstados = isset($_POST['empresaEstado']) ? $_POST['empresaEstado'] : [];
        //instancia de la clase
        $valRegister = new val_register_personas();
        //validar si el usuario existe
        $valRegister->UserExist($cedula,$conMysql);
        //crear array de empresa y el estado
        $empresasConEstados = $valRegister->ArrayEmpresaEstado($empresaEstados);
        //crear array de areas con su id y el estado de permiso
        $areasConEstados=$valRegister->Areas($areasSeleccionadas);
        try{
            $valRegister->AggUser($cedula, $nombre, $rol, $zona, $usuario, $contrasena, $empresasConEstados, $areasConEstados, $conMysql);

        }catch(Exception $e){
            echo "Error al insertar" . $e->getMessage();
        }
    }
}else{
    echo "datos incompletos";
}
