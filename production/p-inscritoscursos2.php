      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'header.php';
      ?>
      
        <!-- page content listado de inscritos a cursos -->

        <div class="right_col" role="main">
          <div>
            <div class="clearfix"></div>

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Inscritos a cursos</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Inscritos a grupos</a>
              </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <!-- Inscritos a cursos -->
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_content">
                            <form id="" data-parsley-validate class="form-horizontal" method="post" action="">
                                  <div class="form-group">
                                    <div class="col-md-5 col-sm-6 col-xs-10 col-md-offset-3">
                                      <select id="id_inscur" name="id_inscur" class="form-control col-md-7 col-xs-12" required="">
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
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <button type="submit" class="btn btn-success">Buscar</button>
                                      </div>
                                  </div>
                                </form>
                                <?php
                                  $id_insCur = $_POST["id_inscur"];
                                ?>
                                <div style="<?php if($id_insCur=='') {echo 'display: none';} else{echo 'display: block';} ?>">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                      <!-- Tabla con listado de usuarios -->
                                      <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th><strong></strong></th>
                                            <th><strong>Curso</strong></th>
                                            <th><strong>Usuario</strong></th>
                                            <th><strong>Tipo de documento</strong></th>
                                            <th><strong>Documento</strong></th>
                                          </tr>
                                        </thead>
                                        <?php   
                                        //Consulta de los grupos
                                        $resultadoUser = editar("inscripcioncurso","idcurso",$id_insCur);

                                            foreach ($resultadoUser as $row) {
                                                $pos++;
                                                echo "<tbody><tr>
                                                      <td>".$pos."</td>
                                                      <td>".DatoREQDB("curso","curso","idcurso=".$row["idcurso"]."")."</td>
                                                      <td>".DatoREQDB("nombres","registro","idregistro=".DatoREQDB("idregistro","usuario","idusuario=".$row["idusuario"]."")."")."</td>    
                                                      <td>".DatoREQDB("tipodoc","tipodoc","idtipodoc=".DatoREQDB("idtipodoc","usuario","idusuario=".$row["idusuario"]."")."")."</td>
                                                      <td>".DatoREQDB("documento","usuario","idusuario=".DatoREQDB("idtipodoc","usuario","idusuario=".$row["idusuario"]."")."")."</td>                           
                                                      </tr></tbody>";
                                            }
                                        ?>
                                      </table>
                                        <!-- Fin tabla con listado de usuarios -->
                                    </div>
                                  </div>
                                </div>
                            <!-- Fin tabla con listado de cursos -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <!-- Inscritos a cursos -->
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_content">
                            <form id="" data-parsley-validate class="form-horizontal" method="post" action="">
                                  <div class="form-group">
                                    <div class="col-md-5 col-sm-6 col-xs-10 col-md-offset-3">
                                      <select id="id_insgru" name="id_inscur" class="form-control col-md-7 col-xs-12" required="">
                                        <option value="">Seleccione grupo</option>
                                        <?php   
                                          //Consulta de todos los cursos
                                          $resultado = consultar("grupo", "SI");

                                              foreach ($resultado as $row) {
                                                  echo '<option value='.$row["idgrupo"].'>'.$row["grupo"].'</option>';
                                              }
                                          ?>
                                      </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <button type="submit" class="btn btn-success">Buscar</button>
                                      </div>
                                  </div>
                                </form>
                                <?php
                                  $id_insGru = $_POST["id_insgru"];
                                ?>
                                <div >
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                      <!-- Tabla con listado de usuarios -->
                                      <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th><strong></strong></th>
                                            <th><strong>Grupo</strong></th>
                                            <th><strong>Usuario</strong></th>
                                            <th><strong>Tipo de documento</strong></th>
                                            <th><strong>Documento</strong></th>
                                          </tr>
                                        </thead>
                                        <?php   
                                        //Consulta de los grupos
                                        $resultadoUser = editar("inscripciongrupo","idgrupo",$id_insGru);

                                            foreach ($resultadoUser as $row) {
                                                $pos++;
                                                echo "<tbody><tr>
                                                      <td>".$pos."</td>
                                                      <td>".DatoREQDB("grupo","grupo","idgrupo=".$row["idgrupo"]."")."</td>
                                                      <td>".DatoREQDB("nombres","registro","idregistro=".DatoREQDB("idregistro","usuario","idusuario=".$row["idusuario"]."")."")."</td>    
                                                      <td>".DatoREQDB("tipodoc","tipodoc","idtipodoc=".DatoREQDB("idtipodoc","usuario","idusuario=".$row["idusuario"]."")."")."</td>
                                                      <td>".DatoREQDB("documento","usuario","idusuario=".DatoREQDB("idtipodoc","usuario","idusuario=".$row["idusuario"]."")."")."</td>                           
                                                      </tr></tbody>";
                                            }
                                        ?>
                                      </table>
                                        <!-- Fin tabla con listado de usuarios -->
                                    </div>
                                  </div>
                                </div>
                            <!-- Fin tabla con listado de cursos -->
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

    <?php }else{ echo '<script> window.location.href="p-login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>