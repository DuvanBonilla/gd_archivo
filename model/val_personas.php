<?php

class UsuarioYCarpetas {
    private $conexion;

    // Constructor para recibir la conexión a la base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Obtener la ruta base según el ID de la empresa
    private function ObtenerRutaBase() {
        // Rutas base por ID de empresa
        $rutasBase = [
            1 => 'R:/Gestion_Docu/Cargoban/Empleados',
            2 => 'R:/Gestion_Docu/Oceanix/Empleados',
            3 => 'R:/Gestion_Docu/Solutempo/Empleados',
            4 => 'R:/Gestion_Docu/Cargoban_SAS/Empleados',
            5 => 'R:/Gestion_Docu/Agencia_de_Aduanas/Empleados',
            6 => 'R:/Gestion_Docu/Fundacion_Cargoban/Empleados',
            7 => 'R:/Gestion_Docu/Tase/Empleados',
            8 => 'R:/Gestion_Docu/Opyservis/Empleados',
            9 => 'R:/Gestion_Docu/Tierra_Grata/Empleados',
            10 => 'R:/Gestion_Docu/Bananova/Empleados',
            11 => 'R:/Gestion_Docu/Gira/Empleados',
            12 => 'R:/Gestion_Docu/Palmonte/Empleados',
            13 => 'R:/Gestion_Docu/Principio_Comercial/Empleados'
        ];
        
        // Obtener ID de la empresa de la sesión
        $idEmpresa = isset($_SESSION["idEmpresa"]) ? $_SESSION["idEmpresa"] : null;
        
        // Retornar la ruta base correspondiente o false si no existe
        return isset($rutasBase[$idEmpresa]) ? $rutasBase[$idEmpresa] : false;
    }

    // Función para verificar si una carpeta ya existe
    public function ExisteCarpeta($cedula) {
        $directorioBase = $this->ObtenerRutaBase(); // Obtener la ruta base según la empresa

        if ($directorioBase === false) {
            // Ruta base no encontrada
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Ruta base no válida para la empresa',
                    confirmButtonColor: '#D63030',
                    confirmButtonText: 'OK',
                    timer: 6000
                }).then(() => {
                    location.assign('../view/tabla_empleados.php');
                });
            });
            </script>";
            exit(); // Detener la ejecución si la ruta base no es válida
        }

        $ruta = $directorioBase . "/" . $cedula;
        $existe = file_exists($ruta);
        
        // Para depuración, puedes comentar las siguientes dos líneas en producción
        echo "Ruta para verificar: $ruta<br>";
        echo "Existe: " . ($existe ? 'Sí' : 'No') . "<br>";
        
        return $existe;
    }

    // Función para crear la carpeta principal y subcarpetas numeradas
    public function CrearCarpeta($cedula) {
        $directorioBase = $this->ObtenerRutaBase(); // Obtener la ruta base según la empresa

        if ($directorioBase === false) {
            // Ruta base no encontrada
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Ruta base no válida para la empresa',
                    confirmButtonColor: '#D63030',
                    confirmButtonText: 'OK',
                    timer: 6000
                }).then(() => {
                    location.assign('../view/tabla_empleados.php');
                });
            });
            </script>";
            exit(); // Detener la ejecución si la ruta base no es válida
        }

        $base_dir = $directorioBase . "/" . $cedula;

        if (!$this->ExisteCarpeta($cedula)) {
            // Crear la carpeta principal
            mkdir($base_dir, 0777, true);

            // Nombres personalizados para las carpetas
            $nombresCarpetas = [
                "ACTUALIZACIÓN DE DATOS", "AFILIACIONES SEGURIDAD SOCIAL", "ANEXOS Y CERTIFICADOS LABORALES", 
                "AUSENTISMOS E INCAPACIDADES", "CERTIFICADOS DE ESTUDIOS", "CERTIFICADOS MEDICOS", 
                "CERTIFICADOS VARIOS", "CONTRATO DE TRABAJO", "DESCUENTOS VARIOS", "DOCUMENTOS DE IDENTIDAD", 
                "DOCUMENTOS LEGALES", "DOTACION", "HOJA DE VIDA", "LIQUIDACIONES", "OTROS", "PAGOS DE NOMINA", 
                "PAGOS PRESTACIONES SOCIALES", "PROCEDIMIENTOS DISCIPLINARIOS", "PROCESO GESTION HUMANA", 
                "SEGURO DE VIDA", "SOLICITUDES PRESTAMOS Y OTRAS", "SOLICITUDES VARIAS", 
                "TERMINACION DE CONTRATO", "TEST WARTEGG", "VISITA DOMICILIARIA"
            ];
            // Crear subcarpetas con nombres personalizados
            foreach ($nombresCarpetas as $nombre) {
                mkdir($base_dir . "/" . $nombre, 0777, true);
                echo "Subcarpeta creada: " . $base_dir . "/" . $nombre . "<br>";
            }
            return true;
        } else {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'La carpeta ya existe',
                    confirmButtonColor: '#FFC107',
                    confirmButtonText: 'OK',
                    timer: 6000
                }).then(() => {
                    location.assign('../view/tabla_empleados.php');
                });
            });
            </script>";
            return false;
        }
    }

    // Verificar si el usuario existe
    public function UserExist ($cedula, $conexion){
        // Preparación de la consulta
        $stmt = $conexion->prepare("SELECT Cedula FROM tbl_personas WHERE Cedula = ? ");
        // Asignación de valores
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
                        title: 'El usuario está registrado',
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
    public function AggUser($cedula, $nombre, $empresa, $zona, $ubicacion, $FechaIngreso, $conexion) {
        // Obtener directorio base según la empresa
        $directorioBase = $this->ObtenerRutaBase();
        // Ruta final del directorio
        $carpeta = $directorioBase . "/" . $cedula;
        // Estado inicial del empleado, activo
        $Estado = "1";

        if (!empty($cedula) && !empty($nombre) && !empty($empresa) && !empty($zona) && !empty($ubicacion) && !empty($FechaIngreso)) {
            // Preparación de la consulta
            $stmt = $conexion->prepare("INSERT INTO tbl_personas(Cedula, Nombre, Empresa, Zona, Ubicacion, Fechaingreso, Estado, Carpetas) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            // Asignación de valores
            $stmt->bind_param("ssiissis", $cedula, $nombre, $empresa, $zona, $ubicacion, $FechaIngreso, $Estado, $carpeta);

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
                }
            } else {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al almacenar los datos',
                        confirmButtonColor: '#D63030',
                        confirmButtonText: 'OK',
                        timer: 6000
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
                    icon: 'warning',
                    title: 'Por favor complete todos los campos',
                    confirmButtonColor: '#FFC107',
                    confirmButtonText: 'OK',
                    timer: 6000
                }).then(() => {
                    location.assign('../view/tabla_empleados.php');
                });
            });
            </script>";
        }
    }
}

?>
