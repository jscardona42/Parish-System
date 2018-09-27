 <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'header.php';
      ?>

      <!-- Estado -->
        <div class="right_col" role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Configuración</h3>
              </div>
            </div>
            <!-- Tipo de documento -->
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tipo de documento<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="crud_configuracion.php">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="tipodoc_td" name="tipodoc_td" onchange="cargarTipodoc();" class="form-control col-md-7 col-xs-12">
                            <option value="">Seleccione tipo de documento</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("tipodoc", "SI");

                                  foreach ($resultado as $row) {
                                      echo '<option value="'.$row["tipodoc"].'">'.$row["tipodoc"].'</option>';
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="tipodoc" name="tipodoc" placeholder="TIPO DE DOCUMENTO" required="required" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <!-- <a title="Desactivar" href='insertar.php' class="btn btn-danger">Desactivar</a>-->
                             <button type="submit" class="btn btn-success">Guardar</button>
                            <input type="hidden" name="form_tipodoc" id="form_tipodoc" value="true"/>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Estado civil -->
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Estado civil<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="crud_configuracion.php">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="estadocivil_es" onchange="cargarEstadocivil();" name="estadocivil_es" class="form-control col-md-7 col-xs-12">
                            <option value="">Seleccione estado civil</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("estadocivil", "SI");

                                  foreach ($resultado as $row) {
                                      echo '<option value="'.$row["estadocivil"].'">'.$row["estadocivil"].'</option>';
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="estadocivil" name="estadocivil" placeholder="ESTADO CIVIL" required="required" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <!-- <a title="Desactivar" href='insertar.php' class="btn btn-danger">Desactivar</a>-->
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <input type="hidden" name="form_estadocivil" id="form_estadocivil" value="true"/>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Nacionalidad -->
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nacionalidad<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="crud_configuracion.php">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="nacionalidad_na" name="nacionalidad_na" onchange="cargarNacionalidad();" class="form-control col-md-7 col-xs-12">
                            <option value="">Seleccione nacionalidad</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("nacionalidad", "SI");

                                  foreach ($resultado as $row) {
                                      echo '<option value='.$row["nacionalidad"].'>'.$row["nacionalidad"].'</option>';
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="nacionalidad" name="nacionalidad" placeholder="NACIONALIDAD" required="required" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <!-- <a title="Desactivar" href='insertar.php' class="btn btn-danger">Desactivar</a>-->
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <input type="hidden" name="form_nacionalidad" id="form_nacionalidad" value="true"/>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Género -->
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Género<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="crud_configuracion.php">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="genero_ge" name="genero_ge" onchange="cargarGenero();" class="form-control col-md-7 col-xs-12">
                            <option value="">Seleccione género</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("genero", "SI");

                                  foreach ($resultado as $row) {
                                      echo '<option value='.$row["genero"].'>'.$row["genero"].'</option>';
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="genero" name="genero" placeholder="GÉNERO" required="required" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <!-- <a title="Desactivar" href='insertar.php' class="btn btn-danger">Desactivar</a>-->
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <input type="hidden" name="form_genero" id="form_genero" value="true"/>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

      <?php }else{ echo '<script> window.location.href="p-login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>