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
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="id_curso" name="id_curso" class="form-control col-md-7 col-xs-12">
                            <option value="">Seleccione tipo de documento</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("tipodoc", "SI");

                                  foreach ($resultado as $row) {
                                      echo '<option value='.$row["idtipodoc"].'>'.$row["tipodoc"].'</option>';
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="estado_civil" name="estado_civil" placeholder="TIPO DE DOCUMENTO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_gru;?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Volver" href='inscripcioncurso.php' class="btn btn-danger">Volver</a>
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
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="id_curso" name="id_curso" class="form-control col-md-7 col-xs-12">
                            <option value="">Seleccione estado civil</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("estadocivil", "SI");

                                  foreach ($resultado as $row) {
                                      echo '<option value='.$row["idestadocivil"].'>'.$row["estadocivil"].'</option>';
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="estado_civil" name="estado_civil" placeholder="ESTADO CIVIL" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_gru;?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Volver" href='inscripcioncurso.php' class="btn btn-danger">Volver</a>
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
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="id_curso" name="id_curso" class="form-control col-md-7 col-xs-12">
                            <option value="">Seleccione nacionalidad</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("nacionalidad", "SI");

                                  foreach ($resultado as $row) {
                                      echo '<option value='.$row["idnacionalidad"].'>'.$row["nacionalidad"].'</option>';
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="estado_civil" name="estado_civil" placeholder="NACIONALIDAD" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_gru;?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Volver" href='inscripcioncurso.php' class="btn btn-danger">Volver</a>
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
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="id_curso" name="id_curso" class="form-control col-md-7 col-xs-12">
                            <option value="">Seleccione género</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("genero", "SI");

                                  foreach ($resultado as $row) {
                                      echo '<option value='.$row["idgenero"].'>'.$row["genero"].'</option>';
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="text" id="estado_civil" name="estado_civil" placeholder="GÉNERO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_gru;?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a title="Volver" href='inscripcioncurso.php' class="btn btn-danger">Volver</a>
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

      <?php }else{ echo '<script> window.location.href="login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>