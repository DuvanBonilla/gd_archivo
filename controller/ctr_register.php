<?php

require_once ("../model/conexion.php");
require_once ("../model/val_register.php");

// -----------------------------------------------------------------------
$conexion = new Conexion;
$conMysql = $conexion->conMysql();
// -----------------------------------------------------------------------
$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$razon_social = $_POST["razon_social"];
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
// -----------------------------------------------------------------------
$val_register = new val_register();
$val_register->UserExist($cedula,$conMysql);
$val_register->AggUser($cedula,$nombre,$razon_social,$usuario,$contrasena,$conMysql);
// -----------------------------------------------------------------------
