<?php
session_start();
include 'functions/functions.php';
//ini_set('error_reporting',0);

//Insertar eventos	
$Form_Eventos = $_POST['form_eventos'];
$id_eve = $_POST['ideve'];

$nombre_eve = $_POST['nombre_eve'];
$fechainicial_eve = $_POST['fechainicial_eve'];
$fechafinal_eve = $_POST['fechafinal_eve'];
$descripcion_eve = $_POST['descripcion'];

if ($Form_Eventos and $id_eve=="") {
    insertarEvento("evento",$nombre_eve, $fechainicial_eve, $fechafinal_eve, 1, $descripcion_eve, 1);
    echo '<script> alert("Insert '.$id_eve.'"); </script>';
    echo '<script> window.location.href="eventos.php"; </script>';
}

if ($Form_Eventos and $id_eve!="") {
    actualizarEvento('evento', $nombre_eve, $fechainicial_eve, $fechafinal_eve, $descripcion_eve, $id_eve);
    echo '<script> window.location.href="eventos.php"; </script>';
}

//Insertar usuarios
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
     	echo '<script> window.location.href="eventos.php"; </script>';
	}
	else{
		echo '<script> window.location.href="login.php"; </script>';
	}
    
}
?>