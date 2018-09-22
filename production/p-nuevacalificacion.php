      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'header.php';
      $id_insc = base64_decode($_GET['id_insc']);
      ?>

      <?php
      $editar = editar("inscripcioncurso","idinscripcioncurso",$id_insc);

      foreach ($editar as $row) {
          $curso_insc = $row["idcurso"];
          $usuario_insc = $row["idusuario"];
          $nota_insc = $row["nota"];
      }
      
      ?>
        <!-- page content nuevo evento -->

        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3>Administración de Calificaciones</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calificaciones<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="crud_cursos.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <label>Nombre del curso</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" readonly="" placeholder="NOMBRE DEL CURSO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo DatoREQDB("curso","curso","idcurso=".$row["idcurso"]."");?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <label>Nombre del usuario</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" readonly="" placeholder="NOMBRE DEL USUARIO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo DatoREQDB("nombres","registro","idregistro=".DatoREQDB("idregistro","usuario","idusuario=".$row["idusuario"]."")."");?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <label>Calificación</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="number" id="nota_cal" min="1" max="5" name="nota_cal" placeholder="NOTA" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nota_insc;?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Desactivar evento" href='p-calificar.php' class="btn btn-danger">Volver</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <input type="hidden" name="form_calificar" id="form_calificar" value="true">
                            <input type="hidden" name="curso_cal" id="curso_cal" value="<?php echo $curso_insc;?>">
                            <input type="hidden" name="usuario_cal" id="usuario_cal" value="<?php echo $usuario_insc;?>">
                            <input type="hidden" name="idinscal" id="idinscal" value="<?php echo $id_insc;?>">
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

           <!-- end page content nuevo evento-->

    <?php }else{ echo '<script> window.location.href="p-login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>