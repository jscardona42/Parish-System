      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'header.php';
      $id_aul = $_GET['id_aul'];
      ?>

      <?php
      $editar = editar("aula","idaula",$id_aul);

      foreach ($editar as $row) {
          $numero_aul = $row["numeroaula"];
          $estado_aul = $row["estado"];
      }

      ?>
        <!-- page content nueva aula -->

        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3>Administración de Aulas</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div style="<?php if ($id_aul!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="x_title">
                    <h2>Actualizar Aula<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div style="<?php if ($id_aul==''){echo 'display: block';} else{echo 'display: none';} ?>" class="x_title">
                    <h2>Nueva Aula<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="crud_aulas.php">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="numero_aul" name="numero_aul" placeholder="NÚMERO DE AULA" required="required" class="form-control col-md-12 col-xs-12" value="<?php echo $numero_aul;?>">
                        </div>
                      </div>
                      <div style="<?php if ($id_aul!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Estado<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="estado_aul" name="estado_aul" class="form-control col-md-7 col-xs-12">
                            <option value="SI" <?php if ($estado_aul=='SI'){echo 'selected="selected"';}?> >Activo</option>
                            <option value="NO" <?php if ($estado_aul=='NO'){echo 'selected="selected"';}?> >Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Desactivar aula" href='aulas.php' class="btn btn-danger">Volver</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <input type="hidden" name="form_aulas" id="form_aulas" value="true"/>
                            <input type="hidden" name="idaul" id="idaul" value="<?php echo $id_aul;?>"/>
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