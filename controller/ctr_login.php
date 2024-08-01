<?php

session_start();

require_once '../model/conexion.php';
require_once '../model/val_login.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$conexion = new Conexion();
$con = $conexion->conMysql();
$user = new Usuario($usuario, $contrasena, $con);
$user->validarLogin();
$conexion->cerrarConexion($con);
