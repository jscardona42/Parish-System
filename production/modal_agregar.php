<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar país</h4>
      </div>
      <div class="modal-body">
      <div id="datos_ajax_register"></div>

      <div class="form-group">
        <select id="tipodoc_cpreg" name="tipodoc_cpreg" class="form-control" required="">
          <option value="">TIPO DE DOCUMENTO</option>
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

      <div class="form-group">
          <input type="text" class="form-control" id="documento_cpreg" name="documento_cpreg" required placeholder="NÚMERO DE DOCUMENTO">
      </div>
      <div class="form-group">
          <input type="date" id="fechanac_cpreg" name="fechanac_cpreg" placeholder="FECHA DE NACIMIENTO" required="required" class="form-control" value="">
      </div>
      <div class="form-group">
        <input type="text" id="telefono_cpreg" name="telefono_cpreg" placeholder="TELÉFONO FIJO" required="required" class="form-control" value="">
      </div>
      <div class="form-group">
        <input type="text" id="celular_cpreg" name="celular_cpreg" placeholder="CELULAR" required="required" class="form-control" value="">
      </div>
      <div class="form-group">
         <select id="genero_cpreg" name="genero_cpreg" class="form-control" required="">
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

      <div class="form-group">
        <select id="nacionalidad_cpreg" name="nacionalidad_cpreg" class="form-control" required="">
          <option value="">Nacionalidad</option>
          <?php   
            //Consulta de todos los cursos
            $resultado = consultar("nacionalidad", "SI");
                foreach ($resultado as $row) {?>
                  <option value=<?php echo $row["idnacionalidad"]; ?> <?php if ($genero_usu==$row["idnacionalidad"]){echo 'selected="selected"';}?>><?php echo $row["nacionalidad"]; ?></option>
                <?php
                }
            ?>
        </select>
      </div>

      <div class="form-group">
        <select id="estadocivil_cpreg" name="estadocivil_cpreg" class="form-control" required="">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Omitir</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</form>