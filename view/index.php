<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../view/login.php');
    exit;
}
$permisos = include ("../model/consu_permisos_usuario.php");

$id_empresa = isset ($_GET["idEmpresa"]) ? intval($_GET["idEmpresa"]) :0;
$_SESSION["idEmpresa"] = $id_empresa;

$rol = $_SESSION["rol"];
$zona = $_SESSION["zona"];

$areas = include '../model/consultar_area.php';
$idAreaToPage = [
    '1' => 'carpetas.php',
    '2' => 'carpetas.php',
    '3' => 'pagina_sst.php',
    '4' => 'carpetas.php',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.ico.ico" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Dashboard</title>
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/index/estilos.css">
</head>
<body>

    <div class="menu-dashboard">
        <!-- TOP MENU -->
        <div class="top-menu">
            <div class="logo">
                <img src="images/logo.ico.ico" alt="" class="logo-img">
                <span>argoArchivos</span>
            </div>
        </div>
        <!-- MENU -->
        <div class="menu">

        <div class="enlace">
            <a href="tabla_empleados.php">
            <i class="bx bx-user"></i>
            <span>Empleados</span>
            </a>
        </div>
    
        <a href="#" class="enlace" id="lista-toggle">
        <i class='bx bxs-collection'></i>
    <span>Areas</span>
</a>
<div class="submenu" id="lista-submenu">
<?php if (!empty($areas)) { ?>
    <?php foreach ($areas as $area) { ?>
        <?php
        // Obtener el ID del área actual
        $idArea = $area['Idarea'];

        // Verificar si el usuario tiene permiso para esta área
        $tienePermiso = false;
        foreach ($permisos as $permiso) {
            if ($permiso['Area'] == $idArea &&  $permiso['Permiso'] == 1 || $permiso['Permiso'] == 2) {
                $tienePermiso = true;
                break;
            }
        }

        // Mostrar el área solo si tiene permiso
        if ($tienePermiso) {
            $page = isset($idAreaToPage[$idArea]) 
            ? $idAreaToPage[$idArea]
            : '#';
        ?>
            <div class="enlace">
                <a href="<?php echo $page; ?>?area=<?php echo $idArea; ?>">
                    <i class='bx bx-right-arrow-alt'></i>  
                    <span><?php echo htmlspecialchars($area['NombreA']); ?></span>
                </a>
            </div>
        <?php } ?>
    <?php } ?>
<?php } else { ?>
    <div class="enlace">
        <span>No hay áreas disponibles.</span>
    </div>
<?php } ?>

</div>
            <div class="enlace">
                <a href="register.php">
                <i class="bx bx-user-plus"></i> 
                <span>Registrar usuario</span>
                </a>
            </div>

          
            <div class="enlace">
            <a href="subida_masiva.php">
            <i class='bx bxs-rocket'></i>
                <span>Subida masiva</span>
            </div>

            <div class="enlace">
            <a href="editar_permisos.php">
            <i class='bx bxs-edit-alt'></i>
            <span>Modificar permisos</span>
            </div>

            <div class="enlace">
            <a href="elegir_empresa.php">
            <i class='bx bxs-buildings'></i>
            <span>Escoger empresa</span>
            </div>
            <div class="enlace">
                <a href="../model/cerrar_sesion.php">
                <i class="bx bx-log-out"></i>
                <span>Cerrar sesion</span>
                </a>
            </div>
        </div>
    </div>
    <script src="../controller/js/lista-fincas.js" ></script>
</body>
</html>

