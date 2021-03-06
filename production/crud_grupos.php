<?php
session_start();
include '../assets/functions/functions.php';
ini_set('error_reporting',0);

/*****************************************
INSERCIÓN Y ACTUALIZACIÓN DE LOS GRUPOS
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_Grupos = $_POST['form_grupos'];
$id_gru = $_POST['idgru'];

$nombre_gru = $_POST["nombre_gru"];
$nombrelider_gru = $_POST["nombrelider_gru"];
$fechacreacion_gru = strftime("%Y-%m-%d-%H-%M-%S", time() );
$telefono_gru = $_POST["telefono_gru"];
$estado_gru = $_POST["estado_gru"];
$descripcion_gru = $_POST["descripcion_gru"];
$idiglesia_gru = $_POST["idiglesia_gru"];

//Validar si el grupo ya existe
if(count(editar("grupo","grupo",$nombre_gru))!=0){
    echo '<script> alert("No puede tener dos grupos con el mismo nombre"); </script>';
    echo '<script> window.location.href="p-nuevogrupo.php"; </script>';

}elseif (count(editar("grupo","grupo",$nombre_gru))==0) {

	/*Si el ID del evento es igual a vacío, se ejecuta la función de inserción*/
	if ($Form_Grupos and $id_gru=="") {
	    echo '<script> alert("Inscrito correctamente"); </script>';
	    insertarGrupo('grupo', $nombre_gru, $nombrelider_gru, $fechacreacion_gru, $telefono_gru, "SI", $descripcion_gru, 1);
	    echo '<script> window.location.href="p-grupos.php"; </script>';
	}
	/*Si el ID del evento es diferente de vacío, se ejecuta la función de actualización*/
	else if ($Form_Grupos and $id_gru!="") {
	    actualizarGrupo('grupo', $nombre_gru, $nombrelider_gru, $fechacreacion_gru, $telefono_gru, $estado_gru, $descripcion_gru, 1, $id_gru);
	    echo '<script> window.location.href="p-grupos.php"; </script>';
	}
}

/*****************************************
INSCRIPCION A GRUPO
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_ins_grupo = $_POST['form_ins_grupo'];
$id_insGrupo= $_POST['id_ins_grupo'];
$id_userGrupo = $_POST['id_grpusuario'];


if (count(verificarInscritosGRP("inscripciongrupo", $id_insGrupo, $id_userGrupo))==0) {

	if ($Form_ins_grupo) {
	    inscripcionGrupo("inscripciongrupo", $id_insGrupo, $id_userGrupo, "SI");
	    echo '<script> alert("Inscrito correctamente"); </script>';
	    echo '<script> window.location.href="p-inscripciongrupo.php"; </script>';
	}
}
else{
	echo '<script> alert("El usuario ya está inscrito en el grupo"); </script>';
	echo '<script> window.location.href="p-inscripciongrupo.php"; </script>';
}


?>