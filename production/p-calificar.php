 <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'header.php';
      ?>

       <!-- page content nuevo evento -->
        <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3>Calificaciones</h3>
            </div>
          </div>
          <div class="clearfix"></div>
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
                        <div class="page-title">
                          <div class="title_center">
                            <h3><?php echo DatoREQDB("curso","curso","idcurso=".$id_insCur.""); ?></h3>
                          </div>
                        </div>
                        <form id="" data-parsley-validate class="form-horizontal" method="post" action="crud_cursos.php">
                        <!-- Tabla con listado de usuarios -->
                        <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th><strong></strong></th>
                              <th><strong>Calificar</strong></th>
                              <th><strong>Nombres</strong></th>
                              <th><strong>Tipo de documento</strong></th>
                              <th><strong>Documento</strong></th>
                            </tr>
                          </thead>
                          <?php   
                          //Consulta de los grupos
                          $resultadoUser = editar("inscripcioncurso","idcurso",$id_insCur);

                              foreach ($resultadoUser as $row) {
                                $pos++;
                                $id_insc = $row['idinscripcioncurso'];
                                  $nombres_cal = DatoREQDB("nombres","registro","idregistro=".DatoREQDB("idusuario","inscripcioncurso","idinscripcioncurso=".$id_insc."")."");
                                  $tipodoc_cal = DatoREQDB("tipodoc","tipodoc","idtipodoc=".DatoREQDB("idtipodoc","usuario","idusuario=".$row["idusuario"]."")."");
                                  $documento_cal = DatoREQDB("documento","usuario","idusuario=".DatoREQDB("idusuario","usuario","idusuario=".$row["idusuario"]."")."");
                                  echo "<tbody><tr>
                                        <td>".$pos."</td>
                                        <td><a class='btn_editarActivo' title='Editar' href='p-nuevacalificacion.php?id_insc=".base64_encode($id_insc)."'><i class='fa fa-pencil'></i>Calificar</a></td>
                                        <td>".$nombres_cal."</td>    
                                        <td>".$tipodoc_cal."</td>   
                                        <td>".$documento_cal."</td>              
                                        </tr></tbody>";
                              }
                          ?>
                        </table>
                          <!-- Fin tabla con listado de usuarios -->
                        </form>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <a title="Desactivar evento" href='p-inscripcioncurso.php' class="btn btn-danger">Volver</a>
                      </div>
                    </div>
                  </div>
                  <!-- Fin tabla con listado de cursos -->
                </div>
              </div>
            </div>
          </div>
        </div>
      
    <?php }else{ echo '<script> window.location.href="p-login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>