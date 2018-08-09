      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include '../assets/functions/functions.php';
      include 'header.php';
      ini_set('error_reporting',0);
      $cont_hab = consultar("grupo","SI");
      $cont_desh = consultar("grupo","NO");
      ?>
      
        <!-- page content listado de grupos -->

        <div class="right_col" role="main">


          <div>
            <div class="clearfix"></div>

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Grupos Disponibles</a>
                </li>
                <?php
                if (count($cont_desh)!=0){
                  echo '<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Grupos no disponibles</a>';
                }
                else if(count($cont_desh)==0){
                  echo '';
                } 
                ?>
              </ul>
                <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                   <!-- Grupos disponibles -->
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_content">
                            <!-- Tabla con listado de grupos disponibles -->
                            <table id="datatable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th><strong>Nombre</strong></th>
                                  <th><strong>Nombre Líder</strong></th>
                                  <th><strong>Fecha</strong></th>
                                  <th><strong>Teléfono</strong></th>
                                  <th><strong>Activo</strong></th>
                                  <th><strong>Descripción</strong></th>
                                  <th><strong>Iglesia</strong></th>
                                </tr>
                              </thead>
                              <?php   
                              //Consulta de los grupos
                              $resultado = consultar("grupo","SI");

                                  foreach ($resultado as $row) {
                                      $id_gru = $row["idgrupo"];
                                      echo "<tbody><tr>
                                            <td><a class='btn_editarActivo' title='Editar' href='nuevogrupo.php?id_gru=".$id_gru."'><i class='fa fa-pencil'></i>".$row["nombre"]."</a></td>
                                            <td>".$row["nombrelider"]."</td>
                                            <td>".$row["fechacreacion"]."</td>
                                            <td>".$row["telefono"]."</td>
                                            <td>".$row["estado"]."</td>
                                            <td>".$row["descripcion"]."</td>
                                            <td>".DatoREQDB("nombre","iglesia","idiglesia=".$row["idiglesia"]."")."</td></tr></tbody>
                                      ";
                                  }
                              ?>
                            </table>
                            <!-- Fin tabla con listado de grupos -->

                            <!-- Botones -->
                            <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                  <a title="Nuevo curso" class="btn_new" href='nuevogrupo.php'>Nuevo grupo</a>
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
                            <!-- Tabla con listado de grupos no disponibles -->
                            <table id="datatable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th><strong>Nombre</strong></th>
                                  <th><strong>Nombre Líder</strong></th>
                                  <th><strong>Fecha</strong></th>
                                  <th><strong>Teléfono</strong></th>
                                  <th><strong>Activo</strong></th>
                                  <th><strong>Descripción</strong></th>
                                  <th><strong>Iglesia</strong></th>
                                </tr>
                              </thead>
                              <?php   
                              //Consulta de los grupos
                              require_once '../assets/functions/functions.php';
                              $resultado = consultar("grupo","NO"); 

                                  foreach ($resultado as $row) {
                                    $id_gru = $row["idgrupo"];
                                      echo "<tbody><tr>
                                            <td><a class='btn_editInactivo' title='Editar' href='nuevogrupo.php?id_gru=".$id_gru."'><i class='fa fa-pencil'></i>".$row["nombre"]."</a></td>
                                           <td>".$row["nombrelider"]."</td>
                                            <td>".$row["fechacreacion"]."</td>
                                            <td>".$row["telefono"]."</td>
                                            <td>".$row["estado"]."</td>
                                            <td>".$row["descripcion"]."</td>
                                            <td>".DatoREQDB("nombre","iglesia","idiglesia=".$row["idiglesia"]."")."</td></tr></tbody>
                                      ";
                                  }
                              ?>
                            </table>
                            <!-- Fin tabla con listado de grupos no disponibles -->

                            <!-- Botones -->
                            <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                  <a title="Nuevo grupo" class="btn_new" href='nuevogrupo.php'>Nuevo grupo</a>
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
      <!-- end page content nuevo grupo-->

    <?php }else{ echo '<script> window.location.href="login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>