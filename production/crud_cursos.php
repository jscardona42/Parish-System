<?php
session_start();
include '../assets/functions/functions.php';
ini_set('error_reporting',0);

/*****************************************
INSERCIÓN Y ACTUALIZACIÓN DE LOS CURSOS
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_Cursos = $_POST['form_cursos'];
$id_cur = $_POST['idcur'];

$nombre_cur = $_POST['nombre_cur'];
$cupos_cur = $_POST['cupos_cur'];
$estado_cur = $_POST['estado_cur'];
$fechaini_cur = $_POST['fechaini_cur'];
$fechafin_cur = $_POST['fechafin_cur'];

//Cargar archivos
	if ($_FILES['img_cur']!=""){

		if($_FILES['img_cur']['name']==""){
			$imgcurso = DatoREQDB("imgcurso","curso","idcurso=".$id_cur."");
		}
		else{
			$imgcurso = $_FILES['img_cur']['name'];
		}
		 move_uploaded_file($_FILES['img_cur']['tmp_name'],
		"../assets/images/cursos/" . $imgcurso);
	}

/*Si el ID del curso es igual a vacío, se ejecuta la función de inserción*/
if ($Form_Cursos and $id_cur=="") {
    insertarCurso("curso",$nombre_cur, $fechaini_cur, $fechafin_cur, $cupos_cur, $imgcurso, "SI", 1);
    echo '<script> window.location.href="p-cursos.php"; </script>';
}

/*Si el ID del evento es diferente de vacío, se ejecuta la función de actualización*/
else if ($Form_Cursos and $id_cur!="") {
    actualizarCurso('curso', $nombre_cur, $fechaini_cur, $fechafin_cur, $cupos_cur, $imgcurso, $estado_cur, 1, $id_cur);
    echo '<script> window.location.href="p-cursos.php"; </script>';
}

/*****************************************
INSCRIPCION A CURSO
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_ins_curso = $_POST['form_ins_curso'];
$id_insCurso= $_POST['id_ins_curso'];
$id_userCurso = $_POST['id_insusuario'];

if ($Form_ins_curso) {
    inscripcionCurso("inscripcioncurso", $id_insCurso, $id_userCurso, "1", "SI");
    echo '<script> window.location.href="p-inscripcioncurso.php"; </script>';
}

//Formulario de inscripcion a cursos
$Form_In_Curso = $_POST['form_in_curso'];
$idCurso = $_POST['idcurso'];
$idUsuario = $_POST['idusuario'];

echo '<script> alert("'.$idUsuario.'"); </script>';

    if ($Form_In_Curso and $idUsuario!='') {
        inscripcionCurso("inscripcioncurso", $idCurso, $idUsuario, "1", "SI");
        echo '<script> alert("Inscrito correctamente"); </script>';
        echo '<script> window.location.href="usuario"; </script>';
    }
    elseif ($Form_In_Curso and $idUsuario=='') {
        inscripcionCurso("inscripcioncurso", $idCurso, $idUsuario, "1", "SI");
        echo '<script> alert("Inicie sesion antes de inscribirse"); </script>';
        echo '<script> window.location.href="p-login.php"; </script>';
    }


?>