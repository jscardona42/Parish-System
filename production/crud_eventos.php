<?php
session_start();
include '../assets/functions/functions.php';
ini_set('error_reporting',0);

/*****************************************
INSERCIÓN Y ACTUALIZACIÓN DE LOS EVENTOS
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_Eventos = $_POST['form_eventos'];
$id_eve = $_POST['ideve'];
$nombre_eve = $_POST['nombre_eve'];
$fechainicial_eve = $_POST['fechainicial_eve'];
$fechafinal_eve = $_POST['fechafinal_eve'];
$lugar_eve = $_POST['lugar_eve'];
$estado_eve = $_POST['estado_eve'];
$descripcion_eve = $_POST['descripcion_eve'];

//Cargar archivos
	if ($_FILES['img_eve']!=""){

		if($_FILES['img_eve']['name']==""){
			$imgevento = DatoREQDB("imgevento","evento","idevento=".$id_eve."");
		}
		else{
			$imgevento = $_FILES['img_eve']['name'];
		}
		 move_uploaded_file($_FILES['img_eve']['tmp_name'],
		"../assets/images/eventos/" . $imgevento);
	}

/*Si el ID del evento es igual a vacío, se ejecuta la función de inserción*/
if ($Form_Eventos and $id_eve=="") {
    insertarEvento("evento",$nombre_eve, $fechainicial_eve, $fechafinal_eve, $lugar_eve, $imgevento, "SI", $descripcion_eve, 1);
    echo '<script> window.location.href="p-eventos.php"; </script>';
}
/*Si el ID del evento es diferente de vacío, se ejecuta la función de actualización*/
else if ($Form_Eventos and $id_eve!="") {
    actualizarEvento('evento', $nombre_eve, $fechainicial_eve, $fechafinal_eve, $lugar_eve, $imgevento, $estado_eve, $descripcion_eve, $id_eve);
    echo '<script> window.location.href="p-eventos.php"; </script>';
}

?>