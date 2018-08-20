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
            <div class="page-title">
              <div class="title_left">
                <h3>Inscripciones</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inscripción a curso<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal" method="post" action="">
                      <div class="form-group">
                        <div class="col-md-5 col-sm-6 col-xs-6 col-md-offset-3">
                          <input type="text" id="documento_usu" name="documento_usu" placeholder="Ingrese documento de identidad del usuario" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-2">
                            <button type="submit" class="btn btn-success">Buscar</button>
                          </div>
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>

              <?php
                $documento = $_POST["documento_usu"];
              ?>
            <div style="<?php if($documento=='') {echo 'display: none';} else{echo 'display: block';} ?>">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <!-- Tabla con listado de usuarios -->
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><strong>Nombre</strong></th>
                          <th><strong>Correo electrónico</strong></th>
                          <th><strong>Tipo de documento</strong></th>
                          <th><strong>Documento</strong></th>
                        </tr>
                      </thead>
                      <?php   
                      //Consulta de los grupos
                      $resultadoUser = editar("usuario","documento",$documento);

                          foreach ($resultadoUser as $row) {
                              echo "<tbody><tr>
                                    <td>".DatoREQDB("nombres","registro","idregistro=".$row["idregistro"]."")."</td>
                                    <td>".DatoREQDB("correo","registro","idregistro=".$row["idregistro"]."")."</td>
                                    <td>".DatoREQDB("tipodoc","tipodoc","idtipodoc=".$row["idtipodoc"]."")."</td>                                 
                                    <td>".$row["documento"]."</td>                               
                                    </tr></tbody>";
                          }
                      ?>
                      
                    </table>
                    <!-- Fin tabla con listado de usuarios -->

                    <!-- Fin tabla con listado de usuarios -->
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="insertar.php">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <select id="id_ins_curso" name="id_ins_curso" class="form-control col-md-7 col-xs-12" required="">
                            <option value="">Seleccione curso</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("curso", "SI");

                                  foreach ($resultado as $row) {
                                      echo '<option value='.$row["idcurso"].'>'.$row["curso"].'</option>';
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Inscribir usuario</button>
                        <input type="hidden" name="form_ins_curso" id="form_ins_curso" value="true"/>
                        <input type="hidden" name="id_insusuario" id="id_insusuario" value="<?php echo DatoREQDB("idusuario","usuario","documento=$documento") ?>"/>
                        <a title="Volver" href='inscripcioncurso.php' class="btn btn-danger">Cancelar</a>
                      </div>
                   </div>
                 </form>
                </div>
              </div>
            </div>
              <div class="ln_solid"></div>
            </div>

            <!-- Botones -->
            <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                  <a title="Ver usuarios inscritos" class="btn_new" href='inscritoscursos.php'>Ver usuarios inscritos</a>
                </div>
              </div>
          </div>

          </div>
      
    <?php }else{ echo '<script> window.location.href="login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>