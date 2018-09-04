<?php
session_start();
include '../assets/functions/functions.php';
ini_set('error_reporting',0);

/*****************************************
INSERCIÓN Y ACTUALIZACIÓN DE LA CONFIGURACION
******************************************/
/*Tipo de documento*/
$Form_Tipodoc = $_POST['form_tipodoc'];
$tipodoc_td = $_POST['tipodoc_td'];
$tipodoc = $_POST['tipodoc'];
$id_tipodoc = DatoREQDB("idtipodoc","tipodoc","tipodoc='".$tipodoc_td."'");

if ($Form_Tipodoc and $tipodoc_td=="") {
    insertarTipoDoc("tipodoc", $tipodoc, "SI");
    echo '<script> window.location.href="p-configuracion.php"; </script>';
}
else if($Form_Tipodoc and $tipodoc_td!=""){
    actualizarTipoDoc("tipodoc", $tipodoc, "SI", $id_tipodoc);
    echo '<script> window.location.href="p-configuracion.php"; </script>';
}

/*Estado civil*/
$Form_Estadocivil = $_POST['form_estadocivil'];
$estadocivil_es = $_POST['estadocivil_es'];
$estadocivil = $_POST['estadocivil'];

$id_estadocivil = DatoREQDB("idestadocivil","estadocivil","estadocivil='".$estadocivil_es."'");

if ($Form_Estadocivil and $estadocivil_es=="") {
    //echo '<script> alert('.$id_insGrupo.'); </script>';
    insertarEstadocivil("estadocivil", $estadocivil, "SI");
    echo '<script> window.location.href="p-configuracion.php"; </script>';
}
else if($Form_Estadocivil and $estadocivil_es!=""){
    actualizarEstadocivil("estadocivil", $estadocivil, "SI", $id_estadocivil);
    echo '<script> window.location.href="p-configuracion.php"; </script>';
}

/*Nacionalidad*/
$Form_Nacionalidad = $_POST['form_nacionalidad'];
$nacionalidad_na = $_POST['nacionalidad_na'];
$nacionalidad = $_POST['nacionalidad'];

$id_nacionalidad = DatoREQDB("idnacionalidad","nacionalidad","nacionalidad='".$nacionacilidad_na."'");

if ($Form_Nacionalidad and $nacionalidad_na=="") {
    //echo '<script> alert('.$id_insGrupo.'); </script>';
    insertarNacionalidad("nacionalidad", $nacionalidad, "SI");
    echo '<script> window.location.href="p-configuracion.php"; </script>';
}
else if($Form_Nacionalidad and $nacionalidad_na!=""){
    actualizarNacionalidad("nacionalidad", $nacionalidad, "SI", $id_nacionalidad);
    echo '<script> window.location.href="p-configuracion.php"; </script>';
}

/*Genero*/
$Form_Genero = $_POST['form_genero'];
$genero_ge = $_POST['genero_ge'];
$genero = $_POST['genero'];

$id_genero = DatoREQDB("idgenero","genero","genero='".$genero_ge."'");

if ($Form_Genero and $genero_ge=="") {
    //echo '<script> alert('.$id_insGrupo.'); </script>';
    insertarGenero("genero", $genero, "SI");
    echo '<script> window.location.href="p-configuracion.php"; </script>';
}
else if($Form_Genero and $genero_ge!=""){
    actualizarGenero("genero", $genero, "SI", $id_genero);
    echo '<script> window.location.href="p-configuracion.php"; </script>';
}
?>