<?php
session_start();
include '../assets/functions/functions.php';
ini_set('error_reporting',0);

/*****************************************
DESACTIVAR CONFIGURACION
******************************************/
/*Tipo de documento*/
$Form_Tipodoc = $_POST['form_tipodoc'];
$tipodoc_td = $_POST['tipodoc_td'];
$tipodoc = $_POST['tipodoc'];
$id_tipodoc = DatoREQDB("idtipodoc","tipodoc","tipodoc='".$tipodoc_td."'");
echo '<script> alert('.$Form_Tipodoc.'); </script>';

if($Form_Tipodoc and $tipodoc_td!=""){
	desactivarTipoDoc("tipodoc", $tipodoc, "NO", $id_tipodoc);
   	echo '<script> window.location.href="configuracion.php"; </script>';
}

?>