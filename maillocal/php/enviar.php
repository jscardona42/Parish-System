<?php
//Librerías para el envío de mail
include 'class.phpmailer.php';
include 'class.smtp.php';

//Recibir todos los parámetros del formulario
$para = $_GET['correo_usu'];
$asunto = 'Confirmacion';
$mensaje = '<!DOCTYPE html>
<html lang="en">
 	<head>
	</head>
	<body>
		<table align="center" width="60%" style="text-align: center">
			<tr>
				<td>
					<h1>Por favor haga clic en el botón<br>
						para completar el registro.
					</h1>
				</td>
			</tr>
			<tr>
				<td>
					<a href="http://localhost:81/ParishSystem/production/login.php" style="font-weight: bolder; font-size: 20px; background-color: #d61111; padding: 10px; border-radius: 7px; color: #000; text-decoration: none;">Activar cuenta</a>
				</td>
			</tr>
		</table>
  	</body>
</html>';

//Este bloque es importante
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->isHTML(true);
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;

//Nuestra cuenta
$mail->Username ='jscardona42@gmail.com';
$mail->Password = 'js1012377024';

//Agregar destinatario
$mail->AddAddress($para);
$mail->Subject = $asunto;
$mail->Body = $mensaje;
//Para adjuntar archivo
$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
$mail->MsgHTML($mensaje);

//Avisar si fue enviado o no y dirigir al index
if($mail->Send())
{
	echo'<script type="text/javascript">
			alert("Enviado Correctamente");
			window.location.href="../../production/eventos.php";
		 </script>';
}
else{
	echo'<script type="text/javascript">
			alert("NO ENVIADO, intentar de nuevo");
			window.location.href="../../production/eventos.php";
		 </script>';
}
?>

