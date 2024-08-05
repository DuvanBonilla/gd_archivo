<?php

class UsuarioYCarpetas {
    private $conexion;

    // Constructor para recibir la conexión a la base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Función para verificar si una carpeta ya existe
    public function ExisteCarpeta($cedula) {
        $directorio = "../archivos";
        $ruta = $directorio . "/" . $cedula;
        $existe = file_exists($ruta);
        echo "Ruta para verificar: $ruta<br>";
        echo "Existe: " . ($existe ? 'Sí' : 'No') . "<br>";
        return $existe;
    }

    // Función para crear la carpeta principal y subcarpetas numeradas
    public function CrearCarpeta($cedula) {
        // Ruta del directorio
        $directorio = "../archivos";
        $base_dir = $directorio . "/" . $cedula;

        if (!$this->ExisteCarpeta($cedula)) {
            // Crear la carpeta principal
            mkdir($base_dir, 0777, true);

            // Nombres personalizados para las carpetas
            $nombresCarpetas = [
                "actualización de datos", "seguridad social", "certificados laborales", "incapacidades", "certificados de estudio",
                "certificados médicos", "contrato", "descuentos", "doc identidad", "doc legales",
                "dotación", "hoja de vida", "liquidaciones", "pago de nomina", "prestaciones sociales",
                "procesos disciplinarios", "gestión humana", "seguro de vida", "prestamos", "solicitudes",
                "terminación contrato", "visita domiciliaria", "test wartegg", "certificados", "otros"
            ];
            // Crear subcarpetas con nombres personalizados
            foreach ($nombresCarpetas as $nombre) {
                mkdir($base_dir . "/" . $nombre, 0777, true);
                echo "Subcarpeta creada: " . $base_dir . "/" . $nombre . "<br>";
            }
            return true;
        } else {
            echo "Carpeta ya existe: $base_dir<br>";
            return false;
        }
    }

    // verificar si el usuario existe
    public function UserExist ($cedula, $conexion){
        // preparacion de consulta
        $stmt = $conexion->prepare("SELECT Cedula FROM tbl_personas WHERE Cedula = ? ");
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
                    location.assign('../view/tabla_empleados.php');
                    });
                });
                </script>";
            exit();
        }
    }

    // Función para agregar un nuevo usuario y crear las carpetas
    public function AggUser($cedula, $nombre, $empresa,$ubicacion, $FechaIngreso,$conexion) {
        // directorio donde se guardan las carpetas
        $directorio = "../archivos";
        // mas la cedula, directorio final
        $carpeta = $directorio . "/" . $cedula;

        if (!empty($cedula) && !empty($nombre) && !empty($empresa) && !empty($ubicacion) && !empty($FechaIngreso)) {
            // Preparación de la consulta
            $stmt = $conexion->prepare("INSERT INTO tbl_personas(Cedula, Nombre, Empresa, Ubicacion, Fechaingreso, Carpetas) VALUES (?, ?, ?, ?, ?, ?)");
            // Asignación de valores
            $stmt->bind_param("ssisss", $cedula, $nombre, $empresa, $ubicacion, $FechaIngreso, $carpeta);

            if ($stmt->execute()) {
                if ($this->CrearCarpeta($cedula)) {
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Novedad Almacenada y Carpetas Creadas Exitosamente',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            timer: 5000
                        }).then(() => {
                    location.assign('../view/tabla_empleados.php');
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
                            title: 'error al crear carpeta empleado',
                            showCancelButton: false,
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'OK',
                            timer: 5000
                        }).then(() => {
                    location.assign('../view/tabla_empleados.php');
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
                    location.assign('../view/tabla_empleados.php');
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
                    location.assign('../view/tabla_empleados.php');
                });
            });
            </script>";
        }
    }
}