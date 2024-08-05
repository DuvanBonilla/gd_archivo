<?php
require_once("../model/conexion.php");
require_once("../model/val_personas.php");
// --------------------------------------------------------
$cedula = $_POST["Cedula"];
$nombre = $_POST["Nombre"];
$empresa_int  = $_POST["Empresa"];
$empresa = (int) $empresa_int;
$ubicacion = $_POST["Ubicacion"];
$FechaIngreso = $_POST["Fechaingreso"];
// --------------------------------------------------------
$conexion = new Conexion();
$conMysql = $conexion->conMysql();
// --------------------------------------------------------
$carpetas = new UsuarioYCarpetas($conexion);
$carpetas->ExisteCarpeta($cedula);
$carpetas->UserExist($cedula,$conMysql);
$carpetas->AggUser($cedula,$nombre,$empresa,$ubicacion,$FechaIngreso,$conMysql);
$carpetas->CrearCarpeta($cedula);
// --------------------------------------------------------
 