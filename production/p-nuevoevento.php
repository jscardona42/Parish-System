      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'header.php';
      $id_eve = $_GET['id_eve'];
      ?>

      <?php
      $editar = editar("evento","idevento",$id_eve);

      foreach ($editar as $row) {
          $nombre_eve = $row["evento"];
          $fechaini_eve = $row["fechainicial"];
          $fechafin_eve = $row["fechafinal"];
          $lugar_eve = $row["lugar"];
          $estado_eve = $row["estado"];
          $descripcion_eve = $row["descripcion"];
      }

      ?>
        <!-- page content nuevo evento -->

        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3>Administración de Eventos</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div style="<?php if ($id_eve==''){echo 'display: block';} else{echo 'display: none';} ?>" class="x_title">
                    <h2>Nuevo Evento <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div style="<?php if ($id_eve!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="x_title">
                    <h2>Actualizar Evento <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="crud_eventos.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="nombre_eve" name="nombre_eve" placeholder="NOMBRE DEL EVENTO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_eve;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="date" id="fechainicial_eve" name="fechainicial_eve" placeholder="FECHA DE INICIO DEL EVENTO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $fechaini_eve;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="date" id="fechafinal_eve" name="fechafinal_eve" placeholder="FECHA DE FINALIZACIÓN DEL EVENTO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $fechafin_eve;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="lugar_eve" name="lugar_eve" placeholder="LUGAR DEL EVENTO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $lugar_eve;?>">
                        </div>
                      </div>
                      <div style="<?php if ($id_eve!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="estado_eve" name="estado_eve" class="form-control col-md-7 col-xs-12">
                            <option value="SI" <?php if ($estado_eve=='SI'){echo 'selected="selected"';}?> >Activo</option>
                            <option value="NO" <?php if ($estado_eve=='NO'){echo 'selected="selected"';}?>>Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <div style="<?php if ($id_eve!=''){echo 'display: block';} else{echo 'display: block';} ?>">
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="file" id="img_eve" name="img_eve" placeholder="Cargue una imagen" <?php if ($id_eve!=''){echo '';} else{echo 'required';} ?> class="form-control col-md-7 col-xs-12" value="<?php echo $img_eve;?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <textarea id="descripcion_eve" name="descripcion_eve" placeholder="DESCRIPCIÓN DEL EVENTO" required="required" class="form-control col-md-7 col-xs-12"><?php echo $descripcion_eve;?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Desactivar evento" href='p-eventos.php' class="btn btn-danger">Volver</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <input type="hidden" name="form_eventos" id="form_eventos" value="true"/>
                            <input type="hidden" name="ideve" id="ideve" value="<?php echo $id_eve;?>"/>
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