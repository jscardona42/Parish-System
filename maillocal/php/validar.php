<?php
      ini_set('error_reporting',0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>

  </head>
  <body>
    <div class="modal-content">
  	<form method="post" action="../../production/crud_usuarios.php">
  		<input type="text" name="codigo" id="codigo" placeholder="Ingrese Código">
  		<input type="submit" name="" value="Enviar">
  		<input type="hidden" name="form_validar" id="form_validar" value="true">
  	</form>
  </body>
  </html>