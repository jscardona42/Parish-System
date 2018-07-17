      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'functions/functions.php';
      include 'header.php';
      ini_set('error_reporting',0);
      $cont_hab = consultar("aula","SI");
      $cont_desh = consultar("aula","NO");
      ?>
      
        <!-- page content listado de aulas -->

        <div class="right_col" role="main">


          <div>
            <div class="clearfix"></div>

            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Aulas Disponibles</a>
                </li>
                <?php
                if (count($cont_desh)!=0){
                  echo '<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Aulas no disponibles</a>';
                }
                else if(count($cont_desh)==0){
                  echo '';
                } 
                ?>
              </ul>
                <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                   <!-- Aulas disponibles -->
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_content">
                            <!-- Tabla con listado de aulas disponibles -->
                            <table id="datatable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th><strong>Número de aula</strong></th>
                                  <th><strong>Activa</strong></th>
                                  <th><strong>Iglesia</strong></th>
                                </tr>
                              </thead>
                              <?php   
                              //Consulta de los aulas
                              $resultado = consultar("aula","SI");

                                  foreach ($resultado as $row) {
                                      $id_aul = $row["idaula"];
                                      echo "<tbody><tr>
                                            <td><a title='Editar' href='nuevaaula.php?id_aul=".$id_aul."' style='border-bottom: 1px solid #000000; border-top: 1px solid #000; padding: 3px; border-radius: 7px; color: #000'><i class='fa fa-pencil'></i>".$row["numeroaula"]."</a></td>
                                            <td>".$row["estado"]."</td>
                                            <td>".$row["idiglesia"]."</td></tr></tbody>
                                      ";
                                  }
                              ?>
                            </table>
                            <!-- Fin tabla con listado de aulas -->

                            <!-- Botones -->
                            <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                  <a title="Nuevo curso" href='nuevaaula.php' style="background-color: #2e6da4; padding: 10px; border-radius: 5px; color: #fff">Nueva aula</a>
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
                            <!-- Tabla con listado de aulas no disponibles -->
                            <table id="datatable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th><strong>Número de aula</strong></th>
                                  <th><strong>Activa</strong></th>
                                  <th><strong>Iglesia</strong></th>
                              </thead>
                              <?php   
                              //Consulta de los aulas
                              require_once 'functions/functions.php';
                              $resultado = consultar("aula","NO"); 

                                  foreach ($resultado as $row) {
                                    $id_aul = $row["idaula"];
                                      echo "<tbody><tr>
                                            <td><a title='Editar' href='nuevaaula.php?id_aul=".$id_aul."' style='background-color: #d83e3e; padding: 3px; border-radius: 7px; color: #fff'><i class='fa fa-pencil'></i>".$row["numeroaula"]."</a></td>
                                           <td>".$row["estado"]."</td>
                                            <td>".$row["idiglesia"]."</td></tr></tbody>
                                      ";
                                  }
                              ?>
                            </table>
                            <!-- Fin tabla con listado de aulas no disponibles -->

                            <!-- Botones -->
                            <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                  <a title="Nueva aula" href='nuevaaula.php' style="background-color: #2e6da4; padding: 10px; border-radius: 5px; color: #fff">Nueva aula</a>
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
      <!-- end page content nuevo aula-->

    <?php }else{ echo '<script> window.location.href="login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>