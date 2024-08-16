<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../view/login.php');
    exit;
}
$razonesSociales = include '../model/consu_razonsoc.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="images/logo.ico.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">
    <!-- Main css -->
    <link rel="stylesheet" href="css/register/register.css" />
  </head>
  <body>
    <a href="index.php"> <i class="fa-solid fa-circle-arrow-left fa-beat icon-back" style="color: #accd4a;"></i> </a>
    <div class="main">
      <!-- Sign up form -->
      <section class="signup">
        <div class="container">
          <div class="signup-content">
            <div class="signup-form">
              <h2 class="form-title" style="">Registro de usuarios</h2>
              <form method="POST" action="../controller/ctr_register_usuarios.php" class="register-form" id="register-form">
                <!-- datos generales del usuario a register -->
                <div class="form-group">
                  <label for="cedula"></label>
                  <input type="text" name="cedula" id="cedula" placeholder="Número de cédula" required/>
                </div>
                <div class="form-group">
                  <label for="nombre"><i class="zmdi zmdi-email"></i></label>
                  <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" required />
                </div>
                <div class="form-group">
                  <label for="razon_social"><i class="zmdi zmdi-lock"></i></label>
                  <input type="text" name="razon_social" id="razonSocial" placeholder="Ingrese razón social" required />
                </div>
                <div class="form-group">
                  <label for="rol">Rol:</label>
                    <select class="form-control" id="rol" name="rol" required>
                        <option value="">Selecciona un rol</option>
                        <?php require_once ("../model/consu_rol.php");?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="zona">Zona:</label>
                    <select class="form-control" id="zona" name="zona" required>
                        <option value="">Selecciona una zona</option>
                        <?php require_once ("../model/consu_zona.php");?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="usuario"><i class="zmdi zmdi-lock-outline"></i></label>
                  <input type="text" name="usuario" id="usuario" placeholder="Ingrese usuario" required/>
                </div>
                <div class="form-group">
                  <label for="contrasena"><i class="zmdi zmdi-lock-outline"></i></label>
                  <input type="password" name="contrasena" id="contrasena" placeholder="Ingrese contraseña" required />
                </div>
                
                <!-- dar permiso a las empresas a las que puede acceder -->
                <h1 >Empresas</h1>

                <div class="signup-image">
                  <div class="grid-container">
                    <!-- se recorre la lista de empresas -->
                    <?php foreach ($razonesSociales as $index => $razon) { ?>
                      <div class="switch-container">
    <label class="switch-label"><strong><?php echo $razon['Descripcion']; ?></strong></label>
    <label class="switch">
        <input type="checkbox" name="empresa[]" value="<?php echo $razon['Idrazon']; ?>" data-id="<?php echo $razon['Idrazon']; ?>">
        <span class="slider round"></span>
    </label>
    <input type="hidden" name="empresaEstado[<?php echo $razon['Idrazon']; ?>]" value="2" id="empresaEstado_<?php echo $razon['Idrazon']; ?>">
</div>
                    <?php } ?>
              </div>
            </div>
            <hr>
            <br>
            <h1>Areas</h1>
  <table>
  <thead>
            <tr>
                <th></th>
                <th>Ver</th>
                <th>Editar</th>
                <th>Ninguno</th>
            </tr>
        </thead>
        <tbody>
            <?php

           $areas = include '../model/consultar_area.php';
foreach ($areas as $area) {
    echo '<tr>';
    echo "<td>{$area['NombreA']}</td>";

    // Generar los tres radio buttons con el mismo nombre por área
    echo "<td> 
                    <label class='switch'> 
                        <input type='radio' class='update-delete-button' 
                               name='areas[{$area['Idarea']}]' value='1'> 
                        <span class='slider round'></span>
                    </label>
                  </td>";
    echo "<td> 
                    <label class='switch'> 
                        <input type='radio' class='update-delete-button' 
                               name='areas[{$area['Idarea']}]' value='2'> 
                        <span class='slider round'></span>
                    </label>
                  </td>";
    echo "<td> 
                    <label class='switch'> 
                        <input type='radio' class='update-delete-button' 
                               name='areas[{$area['Idarea']}]' value='3'> 
                        <span class='slider round'></span>
                    </label>
                  </td>";

    echo '</tr>';
}
?>  
        </tbody>
    </table>

                <div class="form-group form-button">
                  <input type="submit" class="form-submit"/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle with Popper (JavaScript) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

      <script src="../controller/js/per_empresa.js"></script>
  </body>
</html>
