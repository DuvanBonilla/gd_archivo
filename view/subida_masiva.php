<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../view/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida Masiva</title>
    <link rel="stylesheet" href="css/subida_masiva/subida.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">
</head>
<body>
<a href="index.php"> <i class="fa-solid fa-circle-arrow-left fa-beat icon-back" style="color: #accd4a;"></i> </a>
    <div class="panel">
        <h1>Subida Masiva de Archivos</h1>
        <form action="../model/subida_masiva.php" method="post">
            <button type="submit">Subir Archivos</button>
        </form>
    </div>
</body>  
</html>
  