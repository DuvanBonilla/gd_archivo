<?php

class val_register_personas
{
    public function UserExist($cedula, $conexion)
    {
        $stmt = $conexion->prepare('SELECT Cedula FROM tbl_login WHERE Cedula = ?');
        $stmt->bind_param('s', $cedula);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El usuario está registrado',
                        confirmButtonColor: '#D63030',
                        confirmButtonText: 'OK',
                        timer: 6000
                    }).then(() => {
                        location.assign('../view/register.php');
                    });
                });
                </script>";
            exit;
        }
    }

    public function AggUser($cedula, $nombre, $razon_social, $rol, $zona, $usuario, $contrasena, $empresasConEstados, $areasConEstados, $conexion)
    {
        if (!empty($cedula) && !empty($nombre) && !empty($razon_social) && !empty($rol) && !empty($zona) && !empty($usuario) && !empty($contrasena)) {
            $zona = 1;
            $rol = 1;
            $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
            $stmt = $conexion->prepare('INSERT INTO tbl_login (Cedula, Nombre, Razonsoc,Rol, Zona, Usuario, Password) VALUES (?, ?, ?, ?,?,?, ?)');
            $stmt->bind_param('ssiiiss', $cedula, $nombre, $razon_social, $zona, $rol, $usuario, $hashed_password);

            if ($stmt->execute()) {
                $this->AggEmpresas($cedula, $empresasConEstados, $conexion);
                $this->AggAreas($cedula, $areasConEstados, $conexion);
            } else {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Fallo al ejecutar el insert en tbl_login',
                        confirmButtonColor: '#D63030',
                        confirmButtonText: 'OK',
                        timer: 5000
                    }).then(() => {
                        location.assign('../view/register.php');
                    });
                });
                </script>";
            }
        } else {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Falta de datos',
                    confirmButtonColor: '#FF5733',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    // location.assign('../view/register.php');
                });
            });
            </script>";
        }
    }

    private function AggEmpresas($cedula, $empresasConEstados, $conexion)
    {
        foreach ($empresasConEstados as $empresaData) {
            $stmt = $conexion->prepare('INSERT INTO tbl_per_empresa (Cedula, Empresa, Estado) VALUES (?, ?, ?)');
            $stmt->bind_param('sii', $cedula, $empresaData['id'], $empresaData['estado']);

            if (!$stmt->execute()) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Fallo al ejecutar el insert en tbl_per_empresa',
                        confirmButtonColor: '#D63030',
                        confirmButtonText: 'OK',
                        timer: 5000
                    }).then(() => {
                        location.assign('../view/register.php');
                    });
                });
                </script>";
                exit;
            }
        }

        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Usuario y permisos de empresa almacenados exitosamente',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 5000
            }).then(() => {
                // location.assign('../view/register.php');
            });
        });
        </script>";
    }

    private function AggAreas($cedula, $areasConEstados, $conexion)
    {
        foreach ($areasConEstados as $areaData) {
            $stmt = $conexion->prepare('INSERT INTO tbl_accesos (Cedula, Area, Permiso) VALUES (?, ?, ?)');
            $stmt->bind_param('sii', $cedula, $areaData['id'], $areaData['estado']);

            if (!$stmt->execute()) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Fallo al ejecutar el insert en tbl_accesos',
                        confirmButtonColor: '#D63030',
                        confirmButtonText: 'OK',
                        timer: 5000
                    }).then(() => {
                        location.assign('../view/register.php');
                    });
                });
                </script>";
                exit;
            }
        }

        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Áreas y permisos almacenados exitosamente',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 5000
            }).then(() => {
                // location.assign('../view/register.php');
            });
        });
        </script>";
    }
}
