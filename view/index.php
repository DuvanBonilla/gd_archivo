<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../view/login.php');
    exit;
}
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
            <span>Usuarios</span>
            </a>
        </div>
    
            <div class="enlace">
                <i class="bx bxs-contact"></i>
                <span>Base de Datos</span>
            </div>

            <div class="enlace">
                <i class="bx bx-clipboard"></i>
                <span>Gestion Humana</span>
            </div>

            <div class="enlace">
                <i class="bx bx-file-blank"></i>
                <span>Facturas</span>
            </div>

            <div class="enlace">
                <i class="bx bx-dollar-circle"></i>
                <span>Egresos</span>
            </div>

            <div class="enlace" id="lista-toggle">
                <i class="bx bxl-spring-boot"></i>
                <span>Fincas</span>
            </div>
            <div class="submenu" id="lista-submenu">
                <div class="enlace"><span>Finca 1</span></div>
                <div class="enlace"><span>Finca 2</span></div>
                <div class="enlace"><span>Finca 3</span></div>
            </div>
            <div class="enlace">
                <a href="register.php">
                <i class="bx bx-user-plus"></i> <!-- Icono de registrar usuario -->
                <span>Registrar usuario</span>
                </a>
            </div>
            <div class="enlace">
                <a href="../controller/cerrar_sesion.php">
                <i class="bx bx-log-out"></i>
                <span>Cerrar sesion</span>
                </a>
            </div>
        </div>
    </div>
    <script src="../controller/js/lista-fincas.js" defer></script>
</body>
</html>