<?php

require_once("../model/conexion.php");

$cedula = $_GET["cedula"];
// ----------------------------------------------
$conexion = new Conexion();
$conn = $conexion->conMysql();
// ----------------------------------------------

class EliminarUsuario{


    public function eliminar($cedula,$conexion){
       if(isset($cedula)){
        $stmt = $conexion->prepare("DELETE FROM tbl_login WHERE Cedula = ?");
        $stmt->bind_param("s", $cedula);

        if($stmt->execute()){
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario eliminado con exito',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    location.assign('../view/editar_permisos.php');
                });
            });
            </script>";
        }else{
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Fallo al eliminar usuario',
                    confirmButtonColor: '#D63030',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    location.assign('../view/editar_permisos.php');
                });
            });
            </script>";
            exit;
        }
       }else{
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Falta de datos',
                    confirmButtonColor: '#D63030',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    location.assign('../view/editar_permisos.php');
                });
            });
            </script>";
            exit;
       }
    }
}

$eliminarUsuario = new EliminarUsuario();
$eliminarUsuario->eliminar($cedula,$conn);