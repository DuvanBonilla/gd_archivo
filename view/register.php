<?php
session_start();
if(!isset($_SESSION["usuario"])){
  header('location: ../view/login.php');
    exit;
}
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
    <!-- Font Icon -->

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
              <h2 class="form-title">Registro de usuarios</h2>
              <form method="POST" action="../controller/ctr_register.php" class="register-form" id="register-form">
                <div class="form-group">
                  <label for="name"
                  ></label>
                  <input
                    type="text"
                    name="cedula"
                    id="cedula"
                    
                    placeholder="Numero de cedula"
                  />
                </div>
                <div class="form-group">
                  <label for="nombre"><i class="zmdi zmdi-email"></i></label>
                  <input
                    type="text"
                    name="nombre"
                    id="nombre"
                    placeholder="Ingrese su nombre"
                  />
                </div>
                <div class="form-group">
                  <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                  <input
                    type="text"
                    name="razon_social"
                    id="razonSocial"
                    placeholder="Ingrese razon social"
                  />
                </div>

                <div class="form-group">
                  <label for="re-pass"
                    ><i class="zmdi zmdi-lock-outline"></i
                  ></label>
                  <input
                    type="text"
                    name="usuario"
                    id="usuario"
                    placeholder="Ingrese usuario"
                  />
                </div>

                <div class="form-group">
                  <label for="re-pass"
                    ><i class="zmdi zmdi-lock-outline"></i
                  ></label>
                  <input
                    type="password"
                    name="contrasena"
                    id="contrasena"
                    placeholder="Ingrese contraseña"
                  />
                </div>

                <div class="form-group form-button">
                  <input
                    type="submit"
                    name="signup"
                    id="signup"
                    class="form-submit"
                    value="Registrar usuario"
                  />
                </div>
              </form>
            </div>
            <div class="signup-image">
              <figure>
                <img src="images/image-register.png" alt="sing up image" />
              </figure>
            </div>
          </div>
        </div>
      </section>
</html>
