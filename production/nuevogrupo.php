      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'functions/functions.php';
      include 'header.php';
      ini_set('error_reporting',0);
      $cont_hab = consultar("grupo","SI");
      $cont_desh = consultar("grupo","NO");
      $id_gru = $_GET['id_gru'];
      ?>

      <?php
      $editar = editar("grupo","idgrupo",$id_gru);

      foreach ($editar as $row) {
          $nombre_gru = $row["nombre"];
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

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nuevo Grupo<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="insertar.php">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del grupo<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nombre_gru" name="nombre_gru" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_gru;?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del líder<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nombrelider_gru" name="nombrelider_gru" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombrelider_gru;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Teléfono<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="telefono_gru" name="telefono_gru" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $telefono_gru;?>">
                        </div>
                      </div>
                      <div style="<?php if ($id_gru!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Estado<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="estado_gru" name="estado_gru" class="form-control col-md-7 col-xs-12">
                            <option value="SI" <?php if ($estado_gru=='SI'){echo 'selected="selected"';}?> >Activo</option>
                            <option value="NO" <?php if ($estado_gru=='NO'){echo 'selected="selected"';}?> >Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripción<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="descripcion_gru" name="descripcion_gru" required="required" class="form-control col-md-7 col-xs-12"><?php echo $descripcion_gru;?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Volver" href='grupos.php' style="vertical-align: bottom; background-color: #2e6da4; padding: 10px; border-radius: 5px; color: #fff">Volver</a>
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

    <?php }else{ echo '<script> window.location.href="login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>