      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'header.php';
      $id_cur = $_GET['id_cur'];
      ?>

      <?php
      $editar = editar("curso","idcurso",$id_cur);

      foreach ($editar as $row) {
          $nombre_cur = $row["curso"];
          $fechaini_cur = $row["fechaini"];
          $fechafin_cur = $row["fechafin"];
          $cupos_cur = $row["cupos"];
          $estado_cur = $row["estado"];
      }
      
      ?>
        <!-- page content nuevo evento -->

        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3>Administración de Cursos</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div style="<?php if ($id_cur==''){echo 'display: block';} else{echo 'display: none';} ?>" class="x_title">
                    <h2>Nuevo Curso<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div style="<?php if ($id_cur!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="x_title">
                    <h2>Actualizar Curso<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="crud_cursos.php">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="nombre_cur" name="nombre_cur" placeholder="NOMBRE DEL CURSO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_cur;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="date" id="fechaini_cur" name="fechaini_cur" placeholder="FECHA DE INICIO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $fechaini_cur;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="date" id="fechafin_cur" name="fechafin_cur" placeholder="FECHA DE FINALIZACIÓN" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $fechafin_cur;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="number" id="cupos_cur" name="cupos_cur" placeholder="CANTIDAD DE CUPOS" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $cupos_cur;?>">
                        </div>
                      </div>
                      <div style="<?php if ($id_cur!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="estado_cur" name="estado_cur" class="form-control col-md-7 col-xs-12">
                            <option value="SI" <?php if ($estado_cur=='SI'){echo 'selected="selected"';}?> >Activo</option>
                            <option value="NO" <?php if ($estado_cur=='NO'){echo 'selected="selected"';}?> >Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Desactivar evento" href='p-cursos.php' class="btn btn-danger">Volver</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <input type="hidden" name="form_cursos" id="form_cursos" value="true"/>
                            <input type="hidden" name="idcur" id="idcur" value="<?php echo $id_cur;?>"/>
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