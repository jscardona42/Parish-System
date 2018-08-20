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
$estado_eve = $_POST['estado_eve'];
$descripcion_eve = $_POST['descripcion'];

/*Si el ID del evento es igual a vacío, se ejecuta la función de inserción*/
if ($Form_Eventos and $id_eve=="") {
    insertarEvento("evento",$nombre_eve, $fechainicial_eve, $fechafinal_eve, "SI", $descripcion_eve, 1);
    echo '<script> window.location.href="eventos.php"; </script>';
}
/*Si el ID del evento es diferente de vacío, se ejecuta la función de actualización*/
else if ($Form_Eventos and $id_eve!="") {
    actualizarEvento('evento', $nombre_eve, $fechainicial_eve, $fechafinal_eve, $estado_eve, $descripcion_eve, $id_eve);
    echo '<script> window.location.href="eventos.php"; </script>';
}

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

/*Si el ID del evento es igual a vacío, se ejecuta la función de inserción*/
if ($Form_Cursos and $id_cur=="") {
    //echo '<script> alert("Insert '.$cupos_cur.'"); </script>';
    insertarCurso("curso",$nombre_cur, $fechaini_cur, $fechafin_cur, $cupos_cur, "SI", 1);
    echo '<script> window.location.href="cursos.php"; </script>';
}
/*Si el ID del evento es diferente de vacío, se ejecuta la función de actualización*/
else if ($Form_Cursos and $id_cur!="") {
    actualizarCurso('curso', $nombre_cur, $fechaini_cur, $fechafin_cur, $cupos_cur, $estado_cur, 1, $id_cur);
    echo '<script> window.location.href="cursos.php"; </script>';
}


/*****************************************
INSERCIÓN Y ACTUALIZACIÓN DE LOS GRUPOS
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_Grupos = $_POST['form_grupos'];
$id_gru = $_POST['idgru'];

$nombre_gru = $_POST["nombre_gru"];
$nombrelider_gru = $_POST["nombrelider_gru"];
$fechacreacion_gru = strftime( "%Y-%m-%d-%H-%M-%S", time() );
$telefono_gru = $_POST["telefono_gru"];
$estado_gru = $_POST["estado_gru"];
$descripcion_gru = $_POST["descripcion_gru"];
$idiglesia_gru = $_POST["idiglesia_gru"];

/*Si el ID del evento es igual a vacío, se ejecuta la función de inserción*/
if ($Form_Grupos and $id_gru=="") {
    //echo '<script> alert("Insert3 '.$nombre_gru.'"); </script>';
    insertarGrupo('grupo', $nombre_gru, $nombrelider_gru, $fechacreacion_gru, $telefono_gru, "SI", $descripcion_gru, 1);
    echo '<script> window.location.href="grupos.php"; </script>';
}
/*Si el ID del evento es diferente de vacío, se ejecuta la función de actualización*/
else if ($Form_Grupos and $id_gru!="") {
    actualizarGrupo('grupo', $nombre_gru, $nombrelider_gru, $fechacreacion_gru, $telefono_gru, $estado_gru, $descripcion_gru, 1, $id_gru);
    echo '<script> window.location.href="grupos.php"; </script>';
}

/*****************************************
INSERCIÓN Y ACTUALIZACIÓN DE LAS AULAS
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_Aulas = $_POST['form_aulas'];
$id_aul = $_POST['idaul'];

$numero_aul = $_POST['numero_aul'];
$estado_aul = $_POST['estado_aul'];
$idiglesia_aul = $_POST['idiglesia_aul'];

/*Si el ID del evento es igual a vacío, se ejecuta la función de inserción*/
if ($Form_Aulas and $id_aul=="") {
    insertarAula("aula",$numero_aul,"SI", 1);
    echo '<script> window.location.href="aulas.php"; </script>';
}
/*Si el ID del evento es diferente de vacío, se ejecuta la función de actualización*/
else if ($Form_Aulas and $id_aul!="") {
    actualizarAula('aula', $idaula, $numero_aul, $estado_aul, 1);
    echo '<script> window.location.href="aulas.php"; </script>';
}

/*****************************************
REGISTRO DE USUARIOS
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_Registro = $_POST['form_registro'];
$nombre_usu = $_POST['nombre_usu'];
$correo_usu = $_POST['correo_usu'];
$contrasena_usu = $_POST['contrasena_usu'];

/*Si la variable $Form_Registro es igual a True, se ejecuta la función de registro*/
if ($Form_Registro) {
    resgistrarUsuario("registro", $nombre_usu, $correo_usu, $contrasena_usu, "SI", 1, 1);
     echo '<script> window.location.href="../maillocal/php/enviar.php?correo_usu='.$correo_usu.'"; </script>';
}

/*****************************************
INICIO DE SESIÓN
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_Login = $_POST['form_login'];
$correo= $_POST['correo'];
$contrasena = $_POST['contrasena'];

if ($Form_Login) {
    /*Se verifica en la base de datos que el usuario exista*/
	if (count(login("registro", $correo, md5($contrasena)))!=0) {
		$_SESSION['correo'] = $correo;
     	echo '<script> window.location.href="completarregistro.php"; </script>';
	}
	else{
		echo '<script> window.location.href="login.php"; </script>';
	}
    
}

/*****************************************
INSCRIPCION A CURSO
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_ins_curso = $_POST['form_ins_curso'];
$id_insCurso= $_POST['id_ins_curso'];
$id_userCurso = $_POST['id_insusuario'];

if ($Form_ins_curso) {
    inscripcionCurso("inscripcioncurso", $id_insCurso, $id_userCurso, "SI");
    echo '<script> window.location.href="inscripcioncurso.php"; </script>';
}

/*****************************************
INSCRIPCION A GRUPO
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_ins_grupo = $_POST['form_ins_grupo'];
$id_insGrupo= $_POST['id_ins_grupo'];
$id_userGrupo = $_POST['id_insusuario'];

echo '<script> alert('.$id_insGrupo.'); </script>';

if ($Form_ins_grupo) {
    inscripcionGrupo("inscripciongrupo", $id_insGrupo, $id_userGrupo, "SI");
    echo '<script> window.location.href="inscripciongrupo.php"; </script>';
}

/*****************************************
INSERCIÓN Y ACTUALIZACIÓN DE USUARIOS
******************************************/
/*Se reciben los datos enviados por POST*/
$Form_Usuarios = $_POST['form_usuarios'];
$id_usu = $_POST['idusu'];

$nombre_reg = $_POST['nombre_reg'];
$correo_reg = $_POST['correo_reg'];
$contrasena_reg = $_POST['contrasena_reg'];
$estado_reg = $_POST['estado_reg'];
$rol_reg = $_POST['rol_reg'];
$tipodoc_usu = $_POST['tipodoc_usu'];
$documento_usu = $_POST['documento_usu'];
$fechanac_usu = $_POST['fechanac_usu'];
$telefono_usu = $_POST['telefono_usu'];
$celular_usu = $_POST['celular_usu'];
$genero_usu = $_POST['genero_usu'];
$nacionalidad_usu = $_POST['nacionalidad_usu'];
$estadocivil_usu = $_POST['estadocivil_usu'];

/*Si el ID del usuario es igual a vacío, se ejecuta la función de inserción*/
if ($Form_Usuarios and $id_usu=="") {
    resgistrarUsuario("registro", $nombre_reg, $correo_reg, $contrasena_reg, "SI", 1, 1);
    $idreg = 1;
    insertarUsuario("usuario", $tipodoc_usu, $documento_usu, $fechanac_usu, $telefono_usu, $celular_usu, "SI", $genero_usu, $nacionalidad_usu, $estadocivil_usu, $idreg);
    echo '<script> window.location.href="usuarios.php"; </script>';
}
/*Si el ID del evento es diferente de vacío, se ejecuta la función de actualización*/
else if ($Form_Aulas and $id_aul!="") {
    actualizarAula('aula', $idaula, $numero_aul, $estado_aul, 1);
    echo '<script> window.location.href="aulas.php"; </script>';
}

?>