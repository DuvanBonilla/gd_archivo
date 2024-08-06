<?php
require_once("../model/conexion.php");
require_once("../model/val_proveedores.php");
// --------------------------------------------------------
$nit = $_POST["Nit"];
$nombre = $_POST["Nombre"];
$FechaIngreso = $_POST["Fechaingreso"];
// --------------------------------------------------------
$conexion = new Conexion();
$conMysql = $conexion->conMysql();
// --------------------------------------------------------
$carpetas = new ProveedorYCarpetas($conexion);
$carpetas->ExisteCarpeta($nit);
$carpetas->UserExist($nit,$conMysql);
$carpetas->AggProveedor($nit,$nombre,$FechaIngreso,$conMysql);
$carpetas->CrearCarpeta($nit,$nombre);
// --------------------------------------------------------
 