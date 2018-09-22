      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'header.php';
      $id_gru = base64_decode($_GET['id_gru']);
      ?>

      <?php
      $editar = editar("grupo","idgrupo",$id_gru);

      foreach ($editar as $row) {
          $nombre_gru = $row["grupo"];
          $nombrelider_gru = $row["nombrelider"];
          $fechacreacion_gru = $row["fechacreacion"];
          $telefono_gru = $row["telefono"];
          $estado_gru = $row["estado"];
          $descripcion_gru = $row["descripcion"];
          $idiglesia_gru = $row["idiglesia"];
      }

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
                    <h2>Actualizar Grupo<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div style="<?php if ($id_gru==''){echo 'display: block';} else{echo 'display: none';} ?>" class="x_title">
                    <h2>Nuevo Grupo<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="crud_grupos.php">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="nombre_gru" name="nombre_gru" placeholder="NOMBRE DEL GRUPO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_gru;?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="nombrelider_gru" name="nombrelider_gru"placeholder="NOMBRE DEL LÍDER" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombrelider_gru;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="tel" id="telefono_gru" name="telefono_gru" placeholder="TELÉFONO DE CONTACTO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $telefono_gru;?>">
                        </div>
                      </div>
                      <div style="<?php if ($id_gru!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="estado_gru" name="estado_gru" class="form-control col-md-7 col-xs-12">
                            <option value="SI" <?php if ($estado_gru=='SI'){echo 'selected="selected"';}?> >Activo</option>
                            <option value="NO" <?php if ($estado_gru=='NO'){echo 'selected="selected"';}?> >Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <textarea id="descripcion_gru" name="descripcion_gru" placeholder="DESCRIPCIÓN DEL GRUPO" required="required" class="form-control col-md-7 col-xs-12"><?php echo $descripcion_gru;?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Volver" href='p-grupos.php' class="btn btn-danger">Volver</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
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

           <!-- end page content nuevo evento-->

    <?php }else{ echo '<script> window.location.href="p-login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>