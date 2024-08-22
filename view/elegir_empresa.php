<?php
session_start();
$empresas = include("../model/consu_elegir_empresa.php");

$rol = $_SESSION["rol"];
$zona = $_SESSION["zona"];

echo "el rol es" . $rol;
echo "</br>";
echo "la zona es " .$zona;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.ico.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegir empresa</title>
    <link rel="stylesheet" href="css/elegir_empresa/elegir_empresa.css">
        <!-- --- font awesome --- -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">

 <!-- font awesome -->
 <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
</head>
<body>
<a href="../model/cerrar_sesion.php"> <i class="fa-solid fa-circle-arrow-left fa-beat icon-back" style="color: #accd4a;"></i> </a>
<div class="cuadrado">
<?php 
    // se recorre el array $empresas
    foreach ($empresas as $empresa) {
        ?>
        <div class="enlace">
          <!-- se asigan los valores del array -->
            <a class="finca" href="index.php?idEmpresa=<?php echo $empresa['Idrazon']; ?>">
                <?php echo $empresa['Descripcion']; ?>
            </a>
        </div>
        <?php
    }
?>
</div>
</body>
</html>
