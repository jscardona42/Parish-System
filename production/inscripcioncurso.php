 <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include '../assets/functions/functions.php';
      include 'header.php';
      ini_set('error_reporting',0);
      $cont_hab = consultar("curso","SI");
      $cont_desh = consultar("curso","NO");
      ?>

       <!-- page content nuevo evento -->

        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3>Administración de Grupos</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div style="<?php if ($id_gru!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="x_title">
                    <h2>Inscripción a curso<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div style="<?php if ($id_gru==''){echo 'display: block';} else{echo 'display: none';} ?>" class="x_title">
                    <h2>Inscripción a curso<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="insertar.php">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="id_curso" name="id_curso" class="form-control col-md-7 col-xs-12">
                            <option value="">Seleccione curso</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("curso", "SI");

                                  foreach ($resultado as $row) {
                                      echo '<option value='.$row["idcurso"].'>'.$row["nombre"].'</option>';
                                  }
                              ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="id_usuario" name="id_usuario" class="form-control col-md-7 col-xs-12">
                            <option value="">Seleccione usuario</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Volver" href='inscripcioncurso.php' class="btn btn-danger">Volver</a>
                            <button type="submit" class="btn btn-success">Inscribir usuario</button>
                            <input type="hidden" name="form_grupos" id="form_grupos" value="true"/>
                            <input type="hidden" name="idgru" id="idgru" value="<?php echo $id_gru;?>"/>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
    <?php }else{ echo '<script> window.location.href="login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>