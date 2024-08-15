<?php
$finca = $_GET["finca"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegir Finca</title>
    <link rel="stylesheet" href="css/elegir_finca/elegir_finca.css">

 <!-- font awesome -->
 <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
</head>
<body>
<a href="index.php"> <i class="fa-solid fa-circle-arrow-left fa-beat icon-back" style="color: #accd4a;"></i> </a>
<div class="cuadrado">
<div class="enlace"><a class="finca" href="tabla_ver_empleados_finca.php?finca=<?php echo $finca; ?>">Ver Empleado</a></div>
<div class="enlace"><a class="finca" href="tabla_ver_egresos_finca.php?finca=<?php echo $finca; ?>">Ver Egresos</a></div>
<div class="enlace"><a class="finca" href="tabla_ver_empleados_finca.php?finca=<?php echo $finca; ?>">Ver Facturas</a></div>
        <?php 
echo $finca;
        
        ?>
</body>
</html>
