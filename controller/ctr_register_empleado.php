<?php
session_start();
require_once("../model/conexion.php");
require_once("../model/val_personas.php");
// --------------------------------------------------------
$empresa_int = $_SESSION["idEmpresa"];
$zona = $_SESSION["zona"];
$empresa = (int) $empresa_int;
$cedula = $_POST["Cedula"];
$nombre = $_POST["Nombre"];
$ubicacion = $_POST["Ubicacion"];
$FechaIngreso = $_POST["Fechaingreso"];
// --------------------------------------------------------
$conexion = new Conexion();
$conMysql = $conexion->conMysql();
// --------------------------------------------------------
$carpetas = new UsuarioYCarpetas($conexion);
$carpetas->ExisteCarpeta($cedula);
$carpetas->UserExist($cedula, $empresa,$conMysql);
$carpetas->AggUser($cedula,$nombre,$empresa,$zona,$ubicacion,$FechaIngreso,$conMysql);
$carpetas->CrearCarpeta($cedula);
// --------------------------------------------------------
 