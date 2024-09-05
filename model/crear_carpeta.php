 <?php

session_start();
$area = $_SESSION["area"];
if (isset($_GET['nombre'])) {
    $_SESSION['nombre'] = $_GET['nombre'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nuevonombre'])) {
    $anio = $_POST['Nuevonombre']; // Leer el año directamente desde el campo
    $nombreArea = $_SESSION['nombre'];
    $idEmpresa = $_SESSION["idEmpresa"];

    // Definir rutas para las empresas
    $rutasEmpresas = [
        1 => 'R:\\Gestion_Docu\\Cargoban',
        2 => 'R:\\Gestion_Docu\\Oceanix',
        3 => 'R:\\Gestion_Docu\\Solutempo',
        4 => 'R:\\Gestion_Docu\\Cargoban_SAS',
        5 => 'R:\\Gestion_Docu\\Agencia_de_Aduanas',
        6 => 'R:\\Gestion_Docu\\Fundacion_Cargoban',
        7 => 'R:\\Gestion_Docu\\Tase',
        8 => 'R:\\Gestion_Docu\\Opyservis',
        9 => 'R:\\Gestion_Docu\\Tierra_Grata',
        10 => 'R:\\Gestion_Docu\\Bananova',
        11 => 'R:\\Gestion_Docu\\Gira',
    ];

    // Verificar si existe la ID de la empresa en el arreglo
    if (isset($rutasEmpresas[$idEmpresa])) {
        // Combinar la ruta base de la empresa con el nombre del área y el año
        $dir = $rutasEmpresas[$idEmpresa] . '\\' . $nombreArea . '\\' . $anio;

        // Verificar si la carpeta ya existe
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Carpeta creada con exito: $dir',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 7000
                    }).then(() => {
                        const area = encodeURIComponent('$area');
                        const nombre = encodeURIComponent('$nombreArea');
                        location.assign('../view/carpetas.php?area=' + area + '&nombre=' + nombre);
                    });
                });
            </script>";         } else {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Carpeta ya creada: $dir',
                        confirmButtonColor: '#D62912',
                        confirmButtonText: 'OK',
                        timer: 7000
                    }).then(() => {
                        const area = encodeURIComponent('$area');
                        const nombre = encodeURIComponent('$nombreArea');
                        location.assign('../view/carpetas.php?area=' + area + '&nombre=' + nombre);
                    });
                });
            </script>";   }
    } else {
        echo 'ID de empresa no válida';
    }
}
?>