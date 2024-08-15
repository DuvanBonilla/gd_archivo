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
        $areasSeleccionadas = $_POST['areas'];
        // Obtener las empresas seleccionadas y sus estados
        $empresaEstados = isset($_POST['empresaEstado']) ? $_POST['empresaEstado'] : [];

        $valRegister = new val_register_personas();
        $empresasConEstados = $valRegister->ArrayEmpresaEstado($empresaEstados);
        $areasConEstados=$valRegister->Areas($areasSeleccionadas);

        try{
            $valRegister->AggUser($cedula, $nombre, $razon_social, $rol, $zona, $usuario, $contrasena, $empresasConEstados, $areasConEstados, $conMysql);

        }catch(Exception $e){
            echo "Error al insertar" . $e->getMessage();
        }
    }
}else{
    echo "datos incompletos";
}
