 <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'header.php';
      ?>

       <!-- page content nuevo evento -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>
            <!-- Inscritos a cursos -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <form id="" data-parsley-validate class="form-horizontal" method="post" action="">
                      <div class="form-group">
                        <div class="col-md-5 col-sm-6 col-xs-10 col-md-offset-3">
                          <select id="id_insgru" name="id_insgru" class="form-control col-md-7 col-xs-12" required="">
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
                    <div style="<?php if($id_insGru=='') {echo 'display: none';} else{echo 'display: block';} ?>">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="page-title">
                            <div class="title_center">
                              <h3><?php echo DatoREQDB("grupo","grupo","idgrupo=".$id_insGru.""); ?></h3>
                            </div>
                          </div>
                          <!-- Tabla con listado de usuarios -->
                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th><strong></strong></th>
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
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <a title="Desactivar evento" href='p-inscripciongrupo.php' class="btn btn-danger">Volver</a>
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
      
    <?php }else{ echo '<script> window.location.href="p-login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>