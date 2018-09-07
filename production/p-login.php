<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Parish System</title>
    
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="../assets/css/responsive.css" rel="stylesheet">
  </head>

  <body class="login back_log">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content img_content">
            <form method="post" action="crud_usuarios.php">
              <h1>Inicio de sesión</h1>
              <div>
                <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo electrónico" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-success">Iniciar sesión</button>
                <input type="hidden" name="form_login" id="form_login" value="true"/>
                <a class="reset_pass" href="#">¿Olvidó su contraseña?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">¿Eres nuevo aquí?
                  <a href="#signup" class="to_register"> Regístrate gratis</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-home"></i> Parish System</h1>
                  <p>©2018 Todos los derechos reservados. Parish System <strong>Términos y condiciones</strong></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content img_content">
            <form method="post" action="crud_usuarios.php">
              <h1>Crea un cuenta</h1>
              <div>
                <input type="text" class="form-control" name="nombre_usu" id="nombre_usu" placeholder="Nombre completo" required="" />
              </div>
              <div>
                <input type="email" class="form-control" name="correo_usu" id="correo_usu" placeholder="Correo electrónico" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="contrasena_usu" id="contrasena_usu" placeholder="Contraseña" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-success">Registrarse</button>
                <input type="hidden" name="form_registro" id="form_registro" value="true"/>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">¿Ya estás registrado?
                  <a href="#signin" class="to_register"> Inicia sesión </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Parish System</h1>
                  <p>©2018 Todos los derechos reservados. Parish System <strong>Términos y condiciones</strong></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
