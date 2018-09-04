      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'header.php';
      ?>

       <!-- page content nuevo evento -->
        <div class="right_col" role="main">
          <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Iglesias<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal" method="post" action="p-usuarios.php">
                      <div class="form-group">
                          <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("iglesia", "SI");

                                  foreach ($resultado as $row) { ?>
                                      <div class="col-md-4 col-sm-4 col-xs-12">
                                        <button type="submit" class="btn btn-success"><?php echo $row["nombre"]; ?></button>
                                      </div>
                                  <?php
                                  }
                              ?>
                      </div> 
                    </form>
                  </div>
                </div>
              </div>
              <div class="ln_solid"></div>
            </div>
          </div>

          </div>
          <?php }else{ echo '<script> window.location.href="p-login.php"; </script>'; } ?>
    
<?php 
      include 'footer.php';
?>