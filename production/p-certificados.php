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
                <h3>Certificados</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Descarga de certificados<small></small></h2>
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
                          <th><strong>Descargar</strong></th>
                          <th><strong>Nombre curso</strong></th>
                          <th><strong>Nombre usuario</strong></th>
                          <th><strong>nota</strong></th>
                        </tr>
                      </thead>
                      <?php
                      $idUsuario= DatoREQDB("idusuario","usuario","documento=".$documento."");

                      //Consulta de los certificados
                      $resultadoUser = editar("inscripcioncurso","idusuario",$idUsuario);                      

                          foreach ($resultadoUser as $row) {
                            $id_insc = $row['idinscripcioncurso'];
                              echo "<tbody><tr>
                                    <td><a class='btn_editarActivo' title='Editar' href='generarpdf.php?id_insc=".base64_encode($id_insc)."'><i class='fa fa-pencil'></i>Descargar</a></td> 
                                    <td>".DatoREQDB("curso","curso","idcurso=".$row["idcurso"]."")."</td>
                                    <td>".DatoREQDB("nombres","registro","idregistro=".DatoREQDB("idregistro","usuario","idusuario=".$row["idusuario"]."")."")."</td>                               
                                    <td>".$row["nota"]."</td>                               
                                    </tr></tbody>";
                          }
                      ?>
                      
                    </table>
                    <!-- Fin tabla con listado de usuarios -->
                </div>
              </div>
            </div>
              <div class="ln_solid"></div>
            </div>
          </div>

          </div>
      
    <?php }else{ echo '<script> window.location.href="p-login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>