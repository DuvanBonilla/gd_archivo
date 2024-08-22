<?php
require_once("../model/conexion.php");
require_once("../model/eliminar_usuarios.php");

$cedula = $_GET["cedula"];
// ----------------------------------------------
$conexion = new Conexion();
$conn = $conexion->conMysql();
// ----------------------------------------------
$eliminarUsuario = new EliminarUsuario();
$eliminarUsuario->eliminar($cedula,$conn);