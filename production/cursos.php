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
      ?>
      
        <!-- page content listado de cursos -->

        <div class="right_col" role="main">


          <div>
            <div class="clearfix"></div>

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Cursos Disponibles</a>
                </li>
                <?php
                if (count($cont_desh)!=0){
                  echo '<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Cursos no disponibles</a>';
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
                                  <th><strong>Nombre</strong></th>
                                  <th><strong>Cupos</strong></th>
                                  <th><strong>Activo</strong></th>
                                </tr>
                              </thead>
                              <?php   
                              //Consulta de los cursos
                              $resultado = consultar("curso","SI");

                                  foreach ($resultado as $row) {
                                      $id_cur = $row["idcurso"];
                                      echo "<tbody><tr>
                                            <td><a title='Editar' href='nuevocurso.php?id_cur=".$id_cur."' style='border-bottom: 1px solid #000000; border-top: 1px solid #000; padding: 3px; border-radius: 7px; color: #000'><i class='fa fa-pencil'></i>".$row["nombre"]."</a></td>
                                            <td>".$row["cupos"]."</td>
                                            <td>".$row["estado"]."</td></tr></tbody>
                                      ";
                                  }
                              ?>
                            </table>
                            <!-- Fin tabla con listado de cursos -->

                            <!-- Botones -->
                            <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                  <a title="Nuevo curso" href='nuevocurso.php' style="background-color: #2e6da4; padding: 10px; border-radius: 5px; color: #fff">Nuevo curso</a>
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
                                  <th><strong>Cupos</strong></th>
                                  <th><strong>Activo</strong></th>
                                </tr>
                              </thead>
                              <?php   
                              //Consulta de los cursos
                              require_once 'functions/functions.php';
                              $resultado = consultar("curso","NO"); 

                                  foreach ($resultado as $row) {
                                    $id_cur = $row["idcurso"];
                                      echo "<tbody><tr>
                                            <td><a title='Editar' href='nuevocurso.php?id_cur=".$id_cur."' style='background-color: #d83e3e; padding: 3px; border-radius: 7px; color: #fff'><i class='fa fa-pencil'></i>".$row["nombre"]."</a></td>
                                            <td>".$row["cupos"]."</td>
                                            <td>".$row["estado"]."</td></tr></tbody>
                                      ";
                                  }
                              ?>
                            </table>
                            <!-- Fin tabla con listado de cursos no disponibles -->

                            <!-- Botones -->
                            <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                  <a title="Nuevo curso" href='nuevocurso.php' style="background-color: #2e6da4; padding: 10px; border-radius: 5px; color: #fff">Nuevo curso</a>
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