<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../css/login.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../controller/ctr_login.php" method="POST" class="sign-in-form">
            <h2 class="title">Inicio de Sesión</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Usuario" name="usuario" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Contraseña" name="contrasena" />
            </div>
            <input type="submit" value="Iniciar Sesión" class="btn solid" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>BIENVENIDO!</h3>
            <p>
             Sistema de gestión documental de archivo Cargoban Operador Logístico y Portuario!
            </p>
          </div>
          <img src="../images/lor.png" class="image" alt="" />
        </div>
      </div>
    </div>
  </body>
</html>