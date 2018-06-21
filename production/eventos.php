      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'functions/functions.php';
      include 'header.php';
      ini_set('error_reporting',0);
      $cont_hab = consultar("evento","1");
      $cont_desh = consultar("evento","0");
      ?>
      
        <!-- page content listado de eventos -->

        <div class="right_col" role="main">


          <div>
            <div class="clearfix"></div>

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Eventos Disponibles</a>
                </li>
                <?php
                if (count($cont_desh)!=0){
                  echo '<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Eventos no disponibles</a>';
                }
                else if(count($cont_desh)==0){
                  echo '';
                } 
                ?>
              </ul>
                <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                   <!-- Eventos disponibles -->
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_content">
                            <!-- Tabla con listado de eventos disponibles -->
                            <table id="datatable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th><strong>Nombre</strong></th>
                                  <th><strong>Fecha inicial</strong></th>
                                  <th><strong>Fecha final</strong></th>
                                  <th><strong>Estado</strong></th>
                                  <th><strong>Descripción</strong></th>
                                  <th><strong>Iglesia</strong></th>
                                </tr>
                              </thead>
                              <?php   
                              //Consulta de los eventos
                              $resultado = consultar("evento","1");

                                  foreach ($resultado as $row) {
                                      $id_eve = $row["idevento"];
                                      echo "<tbody><tr>
                                            <td><a title='Editar' href='nuevoevento.php?id_eve=".$id_eve."' style='background-color: #d83e3e; padding: 3px; border-radius: 7px; color: #fff'>".$row["nombre"]."</a></td>
                                            <td>".$row["fechainicial"]."</td>
                                            <td>".$row["fechafinal"]."</td>
                                            <td>".$row["estado"]."</td>
                                            <td>".$row["descripcion"]."</td>
                                            <td>".$row["idiglesia"]."</td></tr></tbody>
                                      ";
                                  }
                              ?>
                            </table>
                            <!-- Fin tabla con listado de eventos -->

                            <!-- Botones -->
                            <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                  <a title="Nuevo evento" href='nuevoevento.php' style="background-color: #2e6da4; padding: 10px; border-radius: 5px; color: #fff">Nuevo evento</a>
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
                            <!-- Tabla con listado de eventos no disponibles -->
                            <table id="datatable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th><strong>Nombre</strong></th>
                                  <th><strong>Fecha inicial</strong></th>
                                  <th><strong>Fecha final</strong></th>
                                  <th><strong>Estado</strong></th>
                                  <th><strong>Descripción</strong></th>
                                  <th><strong>Iglesia</strong></th>
                                </tr>
                              </thead>
                              <?php   
                              //Consulta de los eventos
                              require_once 'functions/functions.php';
                              $resultado = consultar("evento","0"); 

                                  foreach ($resultado as $row) {
                                      echo "<tbody><tr>
                                            <td>".$row["nombre"]."</td>
                                            <td>".$row["fechainicial"]."</td>
                                            <td>".$row["fechafinal"]."</td>
                                            <td>".$row["estado"]."</td>
                                            <td>".$row["descripcion"]."</td>
                                            <td>".$row["idiglesia"]."</td></tr></tbody>
                                      ";
                                  }
                              ?>
                            </table>
                            <!-- Fin tabla con listado de eventos no disponibles -->

                            <!-- Botones -->
                            <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                  <a title="Nuevo evento" href='nuevoevento.php' style="background-color: #2e6da4; padding: 10px; border-radius: 5px; color: #fff">Nuevo evento</a>
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
      <!-- end page content nuevo evento-->

    <?php }else{ echo '<script> window.location.href="login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>