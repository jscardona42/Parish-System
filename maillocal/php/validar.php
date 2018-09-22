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
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
    <link href="../../assets/css/styles.css" rel="stylesheet">
    <link href="../../assets/css/responsive.css" rel="stylesheet">
  </head>
  <body class="login back_log">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content img_content">
            <div style="position: fixed; display: inline-block; padding-left: 9%; top: 87px;"><a href="../../production/usuario/"><img width="30px" height="30px" src="../../assets/images/close.png"></a></div>
            <form method="post" action="../../production/crud_usuarios.php">
              <h1>Verificación</h1>
              <div>
                <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Ingrese código de validación" required="" />
              </div>
                <button type="submit" class="btn btn-success">Validar</button>
                <input type="hidden" name="form_validar" id="form_validar" value="true">

              <div class="clearfix"></div>
            </form>
          </section>
          </div>
        </div>
      </div>
  </body>
</html>