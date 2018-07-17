      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'functions/functions.php';
      include 'header.php';
      ini_set('error_reporting',0);
      $cont_hab = consultar("curso","SI");
      $cont_desh = consultar("curso","NO");
      $id_cur = $_GET['id_cur'];
      ?>

      <?php
      $editar = editar("curso","idcurso",$id_cur);

      foreach ($editar as $row) {
          $nombre_cur = $row["nombre"];
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
                    <h2>Nuevo Curso<small></small></h2>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del curso <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nombre_cur" name="nombre_cur" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_cur;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cupos<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="datetime" id="cupos_cur" name="cupos_cur" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $cupos_cur;?>">
                        </div>
                      </div>
                      <div style="<?php if ($id_cur!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Estado<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="estado_cur" name="estado_cur" class="form-control col-md-7 col-xs-12">
                            <option value="SI" <?php if ($estado_cur=='SI'){echo 'selected="selected"';}?> >Activo</option>
                            <option value="NO" <?php if ($estado_cur=='NO'){echo 'selected="selected"';}?> >Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Desactivar evento" href='eventos.php' style="vertical-align: bottom; background-color: #2e6da4; padding: 10px; border-radius: 5px; color: #fff">Volver</a>
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

    <?php }else{ echo '<script> window.location.href="login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>