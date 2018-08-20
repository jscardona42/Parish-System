      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include '../assets/functions/functions.php';
      include 'header.php';
      ini_set('error_reporting',0);
      $cont_hab = consultar("usuario","SI");
      $cont_desh = consultar("usuario","NO");
      ?>
      
        <!-- page content listado de cursos -->

        <div class="right_col" role="main">


          <div>
            <div class="clearfix"></div>

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Usuario activos</a>
                </li>
                <?php
                if (count($cont_desh)!=0){
                  echo '<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Usuarios inactivos</a>';
                }
                else if(count($cont_desh)==0){
                  echo '';
                } 
                ?>
              </ul>
                <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                   <!-- Cursos disponibles -->
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_content">
                            <!-- Tabla con listado de cursos disponibles -->
                            <table id="datatable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th><strong>Nombres</strong></th>
                                  <th><strong>Correo</strong></th>
                                  <th><strong>Tipo documento</strong></th>
                                  <th><strong>Documento</strong></th>
                                  <th><strong>Activo</strong></th>
                                </tr>
                              </thead>
                              <?php   
                              //Consulta de los cursos
                              $resultado = consultar("usuario","SI");

                                  foreach ($resultado as $row) {
                                      $id_usu = $row["idusuario"];
                                      echo "<tbody><tr>
                                            <td><a class='btn_editarActivo' title='Editar' href='nuevousuario.php?id_usu=".$id_usu."'><i class='fa fa-pencil'></i>".DatoREQDB("nombres","registro","idregistro=".DatoREQDB("idregistro","usuario","idusuario=".$row["idusuario"]."")."")."</a></td>
                                            <td>".DatoREQDB("correo","registro","idregistro=".DatoREQDB("idregistro","usuario","idusuario=".$row["idusuario"]."")."")."</td>
                                            <td>".DatoREQDB("tipodoc","tipodoc","idtipodoc=".$row["idtipodoc"]."")."</td>
                                            <td>".$row["documento"]."</td>
                                            <td>".$row["estado"]."</td>
                                            </tr></tbody>
                                      ";
                                  }
                              ?>
                            </table>
                            <!-- Fin tabla con listado de cursos -->

                            <!-- Botones -->
                            <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                  <a title="Nuevo usuario" class="btn_new" href='nuevousuario.php'>Nuevo usuario</a>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_content">
                            <!-- Tabla con listado de cursos no disponibles -->
                            <table id="datatable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th><strong>Nombre</strong></th>
                                  <th><strong>Fecha inicial</strong></th>
                                  <th><strong>Fecha final</strong></th>
                                  <th><strong>Cupos</strong></th>
                                  <th><strong>Activo</strong></th>
                                  <th><strong>Iglesia</strong></th>
                                </tr>
                              </thead>
                              <?php   
                              //Consulta de los cursos
                              $resultado = consultar("usuario","NO");

                                  foreach ($resultado as $row) {
                                      $id_usu = $row["idusuario"];
                                      echo "<tbody><tr>
                                            <td><a class='btn_editarActivo' title='Editar' href='nuevousuario.php?id_usu=".$id_usu."'><i class='fa fa-pencil'></i>".DatoREQDB("nombres","registro","idregistro=".DatoREQDB("idregistro","usuario","idusuario=".$row["idusuario"]."")."")."</a></td>
                                            <td>".DatoREQDB("correo","registro","idregistro=".DatoREQDB("idregistro","usuario","idusuario=".$row["idusuario"]."")."")."</td>
                                            <td>".DatoREQDB("tipodoc","tipodoc","idtipodoc=".$row["idtipodoc"]."")."</td>
                                            <td>".$row["documento"]."</td>
                                            <td>".$row["estado"]."</td>
                                            </tr></tbody>
                                      ";
                                  }
                              ?>
                            </table>
                            <!-- Fin tabla con listado de cursos no disponibles -->

                            <!-- Botones -->
                            <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                  <a title="Nuevo curso" class="btn_new" href='nuevocurso.php'>Nuevo curso</a>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>          
      <!-- end page content nuevo cursos-->

    <?php }else{ echo '<script> window.location.href="login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>