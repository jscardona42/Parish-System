	<?php
      include 'functions/functions.php';
      include 'header.php';
      ini_set('error_reporting',0);
      $cont = consultar("evento","1");
      ?>
	<div class="" role="tabpanel" data-example-id="togglable-tabs">
	  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Eventos habilitados</a>
	    </li>
	    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Eventos Deshabilitados</a>
	  </ul>
      <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
         <!-- Eventos disponibles -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title text_center">
                  <h2>Eventos disponibles</h2>
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
                  <!-- Tabla con listado de cursos -->
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th><input type="checkbox"></th>
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
                            echo "<tbody><tr>
                                  <td><input type='checkbox'></td>
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
                  <!-- Fin tabla con listado de cursos -->

                  <!-- Botones -->
                  <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button">Editar</button>
                        <button type="submit" class="btn btn-success">Desactivar</button>
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
                <div class="x_title text_center">
                  <h2>Eventos no disponibles</h2>
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
                  <!-- Tabla con listado de cursos -->
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th><input type="checkbox"></th>
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
                                  <td><input type='checkbox'></td>
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
                  <!-- Fin tabla con listado de cursos -->

                  <!-- Botones -->
                  <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button">Editar</button>
                        <button type="submit" class="btn btn-success">Desactivar</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
      include 'footer.php';
?>