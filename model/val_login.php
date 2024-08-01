<?php

class Usuario
{
    private $usuario;
    private $contrasena;
    private $conexion;

    public function __construct($usuario, $contrasena, $conexion)
    {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->conexion = $conexion;
    }

    public function validarLogin()
    {
        $validar_login = $this->conexion->query("SELECT * FROM tbl_login WHERE Usuario ='$this->usuario'");

        if ($validar_login->num_rows > 0) {
            // $usuarioBD = $validar_login->fetch_assoc();
            // $hashContraseñaBD = $usuarioBD['Password'];
            echo '<script>window.location.href="../view/index.php";</script>';

            // if (password_verify($this->contrasena, $hashContraseñaBD)) {
            //     $_SESSION['Usuario'] = $this->usuario;
            //     echo '<script>window.location.href="../view/index.php";</script>';
            //     exit;
            // }
        }
        //     echo "
        //     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        //     <script language='JavaScript'>
        //     document.addEventListener('DOMContentLoaded', function() {
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Usuario No Existe o Contraseña Incorrecta. Verifique Su Informacion',
        //             showCancelButton: false,
        //             confirmButtonColor: '#3085d6',
        //             confirmButtonText: 'OK',
        //             timer: 5000
        //           }).then(() => {
        //             location.assign('../view/login.php');
        //           });
        // });
        //     </script>";
    }
}
