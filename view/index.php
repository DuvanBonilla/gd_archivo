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
            <span>Empleados</span>
            </a>
        </div>
    
            <div class="enlace">
                <i class="bx bx-clipboard"></i>
                <span>Gestion Humana</span>
            </div>

            <div class="enlace">
                <a href="tabla_proveedores.php">
                <i class="bx bx-file-blank"></i>
                <span>Facturas</span>
            </div>

            <div class="enlace">
                <i class="bx bx-dollar-circle"></i>
                <span>Egresos</span>
            </div>

            <a href="#" class="enlace" id="lista-toggle">
            <i class="bx bxl-spring-boot"></i>
            <span>Agropecuarias</span>
        </a>
             <div class="submenu" id="lista-submenu">
                <div class="enlace"><a href="elegir_tabla_finca.php?finca=8"><span>La Gira</span></a></div>
                <div class="enlace"><a href="elegir_tabla_finca.php?finca=9"><span>Tierra Grata</span></a></div>
                <div class="enlace"><a href="elegir_tabla_finca.php?finca=10"><span>Bananova</span></a></div>
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