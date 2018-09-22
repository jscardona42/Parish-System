      <?php
      session_start();
      ?>
      <?php if(isset($_SESSION['correo'])) { ?>
      <?php
      include 'header.php';
      $id_usu = base64_decode($_GET['id_usu']);
      ?>

      <?php
      $editar = editar("usuario","idusuario",$id_usu);

      foreach ($editar as $row) {
          $nombre_reg = DatoREQDB("nombres","registro","idregistro=".$row["idregistro"]."");
          $correo_reg = DatoREQDB("correo","registro","idregistro=".$row["idregistro"]."");
          $contrasena_reg = DatoREQDB("contrasena","registro","idregistro=".$row["idregistro"]."");
          $estado_reg = $row["estado"];
          $rol_reg = DatoREQDB("idrol","registro","idregistro=".$row["idregistro"]."");
          $tipodoc_usu = $row["idtipodoc"];
          $documento_usu = $row["documento"];
          $fechanac_usu = $row["fechanac"];
          $telefono_usu = $row["telefonofijo"];
          $celular_usu = $row["celular"];
          $genero_usu = $row["idgenero"];
          $nacionalidad_usu = $row["idnacionalidad"];
          $estadocivil_usu = $row["idestadocivil"];
      }

      ?>
        <!-- page content nuevo evento -->

        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3>Administración de Usuarios</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div style="<?php if ($id_usu==''){echo 'display: block';} else{echo 'display: none';} ?>" class="x_title">
                    <h2>Nuevo usuario<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div style="<?php if ($id_usu!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="x_title">
                    <h2>Actualizar usuario<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="crud_usuarios.php">

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <input type="text" id="nombre_reg" name="nombre_reg" placeholder="NOMBRE COMPLETO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_reg;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <input type="email" id="correo_reg" name="correo_reg" placeholder="CORREO ELECTRÓNICO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $correo_reg;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <input type="text" id="contrasena_reg" readonly="" name="contrasena_reg" placeholder="CONTRASEÑA" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $contrasena_reg;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <select id="rol_reg" name="rol_reg" class="form-control col-md-7 col-xs-12" required="">
                            <option value="">Seleccione rol</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("rol", "SI");

                                  foreach ($resultado as $row) {?>

                                      <option value=<?php echo $row["idrol"]; ?> <?php if ($rol_reg==$row["idrol"]){echo 'selected="selected"';}?>><?php echo $row["rol"]; ?></option>
                                  <?php
                                }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <select id="tipodoc_usu" name="tipodoc_usu" class="form-control col-md-7 col-xs-12" required="">
                            <option value="">Tipo de documento</option>
                            <?php
                              //Consulta de todos los cursos
                              $resultado = consultar("tipodoc", "SI");

                                  foreach ($resultado as $row) {?>

                                      <option value=<?php echo $row["idtipodoc"]; ?> <?php if ($tipodoc_usu==$row["idtipodoc"]){echo 'selected="selected"';}?>><?php echo $row["tipodoc"]; ?></option>
                                  <?php
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <input type="text" id="documento_usu" name="documento_usu" placeholder="DOCUMENTO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $documento_usu;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <input type="date" id="fechanac_usu" name="fechanac_usu" placeholder="FECHA DE NACIMIENTO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $fechanac_usu;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <input type="text" id="telefono_usu" name="telefono_usu" placeholder="TELÉFONO FIJO" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $telefono_usu;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <input type="text" id="celular_usu" name="celular_usu" placeholder="CELULAR" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $celular_usu;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <select id="genero_usu" name="genero_usu" class="form-control col-md-7 col-xs-12" required="">
                            <option value="">Género</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("genero", "SI");

                                  foreach ($resultado as $row) {?>

                                      <option value=<?php echo $row["idgenero"]; ?> <?php if ($genero_usu==$row["idgenero"]){echo 'selected="selected"';}?>><?php echo $row["genero"]; ?></option>
                                  <?php
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <select id="nacionalidad_usu" name="nacionalidad_usu" class="form-control col-md-7 col-xs-12" required="">
                            <option value="">Nacionalidad</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("nacionalidad", "SI");

                                  foreach ($resultado as $row) {?>

                                      <option value=<?php echo $row["idnacionalidad"]; ?> <?php if ($nacionalidad_usu==$row["idnacionalidad"]){echo 'selected="selected"';}?>><?php echo $row["nacionalidad"]; ?></option>
                                  <?php
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <select id="estadocivil_usu" name="estadocivil_usu" class="form-control col-md-7 col-xs-12" required="">
                            <option value="">Estado civil</option>
                            <?php   
                              //Consulta de todos los cursos
                              $resultado = consultar("estadocivil", "SI");

                                  foreach ($resultado as $row) {?>

                                      <option value=<?php echo $row["idestadocivil"]; ?> <?php if ($estadocivil_usu==$row["idestadocivil"]){echo 'selected="selected"';}?>><?php echo $row["estadocivil"]; ?></option>
                                  <?php
                                  }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div style="<?php if ($id_usu!=''){echo 'display: block';} else{echo 'display: none';} ?>" class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                          <select id="estado_usu" name="estado_usu" class="form-control col-md-7 col-xs-12">
                            <option value="SI" <?php if ($estado_usu=='SI'){echo 'selected="selected"';}?> >Activo</option>
                            <option value="NO" <?php if ($estado_usu=='NO'){echo 'selected="selected"';}?> >Inactivo</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                            <a title="Desactivar evento" href='p-usuarios.php' class="btn btn-danger">Volver</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <input type="hidden" name="form_usuarios" id="form_usuarios" value="true"/>
                            <input type="hidden" name="idusu" id="idusu" value="<?php echo $id_usu;?>"/>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        

           <!-- end page content nuevo evento-->

    <?php }else{ echo '<script> window.location.href="p-login.php"; </script>'; } ?>
<?php 
      include 'footer.php';
?>