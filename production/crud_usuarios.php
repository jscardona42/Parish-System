<?php
session_start();
include '../assets/functions/functions.php';
ini_set('error_reporting',0);


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
    generarCodigo("codigo", codigoAleatorio(6));
    registrarUsuario("registro", $nombre_usu, $correo_usu, $contrasena_usu, "SI", 2, 1);
    
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

        if (DatoREQDB("idrol","registro","correo='".$correo."'")==1) {
            $_SESSION['correo'] = $correo;
            echo '<script> window.location.href="p-index.php"; </script>';
        }
        elseif(DatoREQDB("idrol","registro","correo='".$correo."'")==2){
            $_SESSION['correoUser'] = $correo;
            echo '<script> window.location.href="usuario/"; </script>';
        }
     	
	}
	else{
		echo '<script> window.location.href="p-login.php"; </script>';
	}
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
    registrarUsuario("registro", $nombre_reg, $correo_reg, $contrasena_reg, "SI", 1, 1);
    $idreg = ultimoID("registro","idregistro");
   
    insertarUsuario("usuario", $tipodoc_usu, $documento_usu, $fechanac_usu, $telefono_usu, $celular_usu, "SI", $genero_usu, $nacionalidad_usu, $estadocivil_usu, $idreg);
    echo '<script> window.location.href="p-usuarios.php"; </script>';

}/*elseif($Form_Usuarios and $id_usu!=""){
    actualizarRegistro("registro", $nombre_reg, $correo_reg, $contrasena_reg, "SI", 1, 1, $id_usu);
    $idreg = ultimoID("registro","idregistro");
    actualizarUsuario("usuario", $tipodoc_usu, $documento_usu, $fechanac_usu, $telefono_usu, $celular_usu, "SI", $genero_usu, $nacionalidad_usu, $estadocivil_usu, $idreg);
}*/


//Formulario de validacion
$Form_Validar = $_POST['form_validar'];
$codigo = $_POST['codigo'];
$idcodigo = ultimoID("codigo","idcodigo");

if ($Form_Validar and $codigo!=''){

    if (DatoREQDB("codigo","codigo","codigo='".$codigo."' and idcodigo='".$idcodigo."'")!='') {
        echo '<script> window.location.href="usuario/"; </script>';
    }
    else{
        echo '<script> alert("El codigo es incorrecto"); </script>';
        echo '<script> window.location.href="../maillocal/php/validar.php"; </script>';
    }
}

?>