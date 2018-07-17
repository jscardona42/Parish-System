<?php
session_start();
include 'functions/functions.php';
ini_set('error_reporting',0);

/**************************
        Insertar Eventos
***************************/
$Form_Eventos = $_POST['form_eventos'];
$id_eve = $_POST['ideve'];

$nombre_eve = $_POST['nombre_eve'];
$fechainicial_eve = $_POST['fechainicial_eve'];
$fechafinal_eve = $_POST['fechafinal_eve'];
$estado_eve = $_POST['estado_eve'];
$descripcion_eve = $_POST['descripcion'];

if ($Form_Eventos and $id_eve=="") {
    insertarEvento("evento",$nombre_eve, $fechainicial_eve, $fechafinal_eve, "SI", $descripcion_eve, 1);
    echo '<script> window.location.href="eventos.php"; </script>';
}
else if ($Form_Eventos and $id_eve!="") {
    actualizarEvento('evento', $nombre_eve, $fechainicial_eve, $fechafinal_eve, $estado_eve, $descripcion_eve, $id_eve);
    echo '<script> window.location.href="eventos.php"; </script>';
}

/**************************
        Insertar Cursos
***************************/
$Form_Cursos = $_POST['form_cursos'];
$id_cur = $_POST['idcur'];

$nombre_cur = $_POST['nombre_cur'];
$cupos_cur = $_POST['cupos_cur'];
$estado_cur = $_POST['estado_cur'];

if ($Form_Cursos and $id_cur=="") {
    //echo '<script> alert("Insert '.$cupos_cur.'"); </script>';
    insertarCurso("curso",$nombre_cur, $cupos_cur,"SI");
    echo '<script> window.location.href="cursos.php"; </script>';
}
else if ($Form_Cursos and $id_cur!="") {
    actualizarCurso('curso', $nombre_cur, $cupos_cur, $estado_cur, $id_cur);
    echo '<script> window.location.href="cursos.php"; </script>';
}


/**************************
        Insertar Grupos
***************************/
$Form_Grupos = $_POST['form_grupos'];
$id_gru = $_POST['idgru'];

$nombre_gru = $_POST["nombre_gru"];
$nombrelider_gru = $_POST["nombrelider_gru"];
$fechacreacion_gru = strftime( "%Y-%m-%d-%H-%M-%S", time() );
$telefono_gru = $_POST["telefono_gru"];
$estado_gru = $_POST["estado_gru"];
$descripcion_gru = $_POST["descripcion_gru"];
$idiglesia_gru = $_POST["idiglesia_gru"];


if ($Form_Grupos and $id_gru=="") {
    //echo '<script> alert("Insert3 '.$nombre_gru.'"); </script>';
    insertarGrupo('grupo', $nombre_gru, $nombrelider_gru, $fechacreacion_gru, $telefono_gru, "SI", $descripcion_gru, 1);
    echo '<script> window.location.href="grupos.php"; </script>';
}
else if ($Form_Grupos and $id_gru!="") {
    echo '<script> alert("Insert3 '.$nombre_gru.'"); </script>';
    actualizarGrupo('grupo', $nombre_gru, $nombrelider_gru, $fechacreacion_gru, $telefono_gru, $estado_gru, $descripcion_gru, 1, $id_gru);
    echo '<script> window.location.href="grupos.php"; </script>';
}

/**************************
        Insertar Aulas
***************************/
$Form_Aulas = $_POST['form_aulas'];
$id_aul = $_POST['idaul'];

$numero_aul = $_POST['numero_aul'];
$estado_aul = $_POST['estado_aul'];
$idiglesia_aul = $_POST['idiglesia_aul'];

if ($Form_Aulas and $id_aul=="") {
    //echo '<script> alert("Insert '.$numero_aul.'"); </script>';
    insertarAula("aula",$numero_aul,"SI", 1);
    echo '<script> window.location.href="aulas.php"; </script>';
}
else if ($Form_Aulas and $id_aul!="") {
    actualizarAula('aula', $numero_aul, $estado_aul, 1, $id_aul);
    echo '<script> window.location.href="cursos.php"; </script>';
}

/**************************
        Insertar Usuarios
***************************/
$Form_Registro = $_POST['form_registro'];
$nombre_usu = $_POST['nombre_usu'];
$correo_usu = $_POST['correo_usu'];
$contrasena_usu = $_POST['contrasena_usu'];

if ($Form_Registro) {
    insertarUsuario("usuario", $nombre_usu,"", $correo_usu, $contrasena_usu,"" ,"" ,"" ,"" ,"" ,"" ,"" ,"" ,"" ,"" ,"" ,"" ,"" ,"" ,"" );

    //Mail


     echo '<script> window.location.href="../maillocal/php/enviar.php?correo_usu='.$correo_usu.'"; </script>';
}

//Consultar usuarios
$Form_Login = $_POST['form_login'];
$correo= $_POST['correo'];
$contrasena = $_POST['contrasena'];
if ($Form_Login) {
	if (count(login("usuario", $correo, md5($contrasena)))!=0) {
		$_SESSION['correo'] = $correo;
     	echo '<script> window.location.href="completarregistro.php"; </script>';
	}
	else{
		echo '<script> window.location.href="login.php"; </script>';
	}
    
}
?>