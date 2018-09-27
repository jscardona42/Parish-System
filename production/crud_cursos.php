<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">
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

/*Si el ID del evento es diferente de vacío, se ejecuta la función de actualización*/
if ($Form_Cursos and $id_cur!="") {
    actualizarCurso('curso', $nombre_cur, $fechaini_cur, $fechafin_cur, $cupos_cur, $imgcurso, $estado_cur, 1, $id_cur);
    echo '<script> window.location.href="p-cursos.php"; </script>';
}

//Validar si el curso ya existe
if(count(editar("curso","curso",$nombre_cur))!=0){
    echo '<script> alert("No puede tener dos cursos con el mismo nombre"); </script>';
    echo '<script> window.location.href="p-nuevocurso.php"; </script>';

}elseif (count(editar("curso","curso",$nombre_cur))==0) {

    /*Si el ID del curso es igual a vacío, se ejecuta la función de inserción*/
    if ($Form_Cursos and $id_cur=="") {
        insertarCurso("curso",$nombre_cur, $fechaini_cur, $fechafin_cur, $cupos_cur, $imgcurso, "SI", 1);
        echo '<script> window.location.href="p-cursos.php"; </script>';
    }
}


/*****************************************
INSCRIPCION A CURSO
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_ins_curso = $_POST['form_ins_curso'];
$id_insCurso= $_POST['id_ins_curso'];
$id_userCurso = $_POST['id_insusuario'];

if (count(verificarInscritosCRS("inscripcioncurso", $id_insCurso, $id_userCurso))==0) {

    if ($Form_ins_curso) {
        inscripcionCurso("inscripcioncurso", $id_insCurso, $id_userCurso, "1", "SI");
        echo '<script> alert("Inscrito correctamente"); </script>';
        echo '<script> window.location.href="p-inscripcioncurso.php"; </script>';
    }
}
else{
     echo '<script> alert("El usuario ya está registrado en el curso"); </script>';
        echo '<script> window.location.href="p-inscripcioncurso.php"; </script>';
}

//Formulario de inscripcion a cursos
$Form_In_Curso = $_POST['form_in_curso'];
$idCurso = $_POST['idcurso'];
$idUsuario = $_POST['idusuario'];

if (count(verificarInscritosCRS("inscripcioncurso", $idCurso, $idUsuario))==0) {

    if ($Form_In_Curso and $idUsuario!='' and isset($_SESSION['correoUser'])) {
        inscripcionCurso("inscripcioncurso", $idCurso, $idUsuario, "1", "SI");
        echo '<script> alert("Inscrito correctamente"); </script>';
        echo '<script> window.location.href="usuario"; </script>';
    }
    elseif ($Form_In_Curso and $idUsuario=='' and isset($_SESSION['correoUser'])) {
        //inscripcionCurso("inscripcioncurso", $idCurso, $idUsuario, "1", "SI");
        echo '<script> alert("Debe completar el formulario de registro antes de poder inscribirse"); </script>';
        echo '<script> window.location.href="usuario/completarregistro.php"; </script>';
    }
    elseif($Form_In_Curso and $idUsuario=='' and !isset($_SESSION['correoUser'])){
        //inscripcionCurso("inscripcioncurso", $idCurso, $idUsuario, "1", "SI");
        echo '<script> alert("Inicie sesion antes de inscribirse"); </script>';
        echo '<script> window.location.href="p-login.php"; </script>';
    }
}else{
    echo '<script> alert("El usuario ya está inscrito en el curso"); </script>';
    echo '<script> window.location.href="usuario"; </script>';
}

//Formulario de calificación de alumnos
$Form_Calificar = $_POST['form_calificar'];
$idcurso_cal = $_POST['curso_cal'];
$idusuario_cal = $_POST['usuario_cal'];
$idinsc_cal = $_POST['idinscal'];
$nota_cal = $_POST['nota_cal'];

//echo '<script> alert("Hola'.$idcurso_cal.'"); </script>';
if ($Form_Calificar and $idinsc_cal!="") {
    //echo '<script> alert("Nota: '.$nota_cal.'"); </script>';
    calificarUsaurio("inscripcioncurso", $idcurso_cal, $idusuario_cal, $nota_cal, "SI", $idinsc_cal);
    if ($nota_cal1>=2) {
        generarCertificado("certificado", $idinsc_cal,"SI");
    }
    echo '<script> window.location.href="p-calificar.php"; </script>';
}



?>