<?php

class val_register{
    public function UserExist ($cedula, $conexion){
            // preparacion de consulta
            $stmt = $conexion->prepare("SELECT Cedula FROM tbl_login WHERE Cedula = ? ");
          // asignacion de valores
            $stmt->bind_param("s", $cedula);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0){
                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'El usuario esta registrado',
                            confirmButtonColor: '#D63030',
                            confirmButtonText: 'OK',
                            timer: 6000
                        }).then(() => {
                            location.assign('../view/register.php');
                        });
                    });
                    </script>";
                exit();
            }
    }

    public function AggUser ($cedula,$nombre,$razon_social,$usuario,$contrasena,$conexion){

        if (!empty($cedula) && !empty($nombre) && !empty($razon_social) && !empty($usuario) && !empty($contrasena))
        {
        // cifrado de contraseña
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
        // preparacion de consulta
        $stmt = $conexion->prepare("INSERT INTO tbl_login(Cedula,Nombre,Razonsoc,Usuario,Password) VALUES (?,?,?,?,?)");
        // asignacion de valores
        $stmt->bind_param("ssiss", $cedula,$nombre,$razon_social,$usuario,$hashed_password);

        if ($stmt->execute()){
            echo "
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script language='JavaScript'>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Novedad Almacenada Exitosamente',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK',
                                timer: 5000
                            }).then(() => {
                            location.assign('../view/register.php');
                            });
                        });
                        </script>";
        }else{
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Fallo al ejecutar el insert',
                    showCancelButton: false,
                    confirmButtonColor: '#D63030',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                location.assign('../view/register.php');
                });
            });
            </script>";
        }
    }else{
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Falta de datos',
                showCancelButton: false,
                confirmButtonColor: '#FF5733 ',
                confirmButtonText: 'OK',
                timer: 5000
            }).then(() => {
                location.assign('../view/register.php');
            });
        });
        </script>";
    }
}

}