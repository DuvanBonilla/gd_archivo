<?php

class ProveedorYCarpetas {
    private $conexion;

    // Constructor para recibir la conexión a la base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Función para verificar si una carpeta ya existe
    public function ExisteCarpeta($nit) {
        $directorio = "../archivos_proveedores";
        $ruta = $directorio . "/" . $nit;
        $existe = file_exists($ruta);
        echo "Ruta para verificar: $ruta<br>";
        echo "Existe: " . ($existe ? 'Sí' : 'No') . "<br>";
        return $existe;
    }

    // Función para crear la carpeta principal y subcarpetas numeradas
    public function CrearCarpeta($nit, $nombre) {
        // Ruta del directorio
        $directorio = "../archivos_proveedores";
        $base_dir = $directorio . "/" . $nit;
        
        if (!$this->ExisteCarpeta($nit)) {
            // Crear la carpeta principal
            mkdir($base_dir, 0777, true);

        // Crear la subcarpeta con el nombre especificado en $nombre
        $carpetaPersonalizada = $base_dir . "/" . $nombre;
        mkdir($carpetaPersonalizada, 0777, true);
        echo "Carpeta creada: " . $carpetaPersonalizada . "<br>";

            return true;
        } else {
            echo "Carpeta ya existe: $base_dir<br>";
            return false;
        }
    }

    // verificar si el usuario existe
    public function UserExist ($nit, $conexion){
        // preparacion de consulta
        $stmt = $conexion->prepare("SELECT Nit FROM tbl_proveedores WHERE Nit = ? ");
      // asignacion de valores
        $stmt->bind_param("s", $nit);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0){
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El proveedor esta registrado',
                        confirmButtonColor: '#D63030',
                        confirmButtonText: 'OK',
                        timer: 6000
                    }).then(() => {
                    location.assign('../view/tabla_proveedores.php');
                    });
                });
                </script>";
            exit();
        }
    }

    // Función para agregar un nuevo usuario y crear las carpetas
    public function AggProveedor($nit, $nombre,$FechaIngreso,$conexion) {
        // directorio donde se guardan las carpetas
        $directorio = "../archivos_proveedores";
        // mas la nit, directorio final
        $carpeta = $directorio . "/" . $nit;

        if (!empty($nit) && !empty($nombre)  && !empty($FechaIngreso)) {
            // Preparación de la consulta
            $stmt = $conexion->prepare("INSERT INTO tbl_proveedores(Nit, Nombre, Fechaingreso, Carpetas) VALUES (?, ?, ?, ?)");
            // Asignación de valores
            $stmt->bind_param("ssss", $nit, $nombre, $FechaIngreso, $carpeta);

            if ($stmt->execute()) {
                if ($this->CrearCarpeta($nit, $nombre)) {
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Carpeta Creada Exitosamente',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            timer: 5000
                        }).then(() => {
                    location.assign('../view/tabla_proveedores.php');
                        });
                    });
                    </script>";
                } else {
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'error al crear carpeta provedor',
                            showCancelButton: false,
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'OK',
                            timer: 5000
                        }).then(() => {
                    location.assign('../view/tabla_proveedores.php');
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
                        title: 'Fallo al ejecutar el insert',
                        showCancelButton: false,
                        confirmButtonColor: '#D63030',
                        confirmButtonText: 'OK',
                        timer: 5000
                    }).then(() => {
                    location.assign('../view/tabla_proveedores.php');
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
                    showCancelButton: false,
                    confirmButtonColor: '#FF5733',
                    confirmButtonText: 'OK',
                    timer: 500000
                }).then(() => {
                    location.assign('../view/tabla_proveedores.php');
                });
            });
            </script>";
        }
    }
}