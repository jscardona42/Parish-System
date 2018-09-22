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

if(count(editar("registro","correo",$correo_usu))!=0){
    echo '<script> alert("El usuario ya se encuentra registrado"); </script>';
    echo '<script> window.location.href="p-login.php"; </script>';

}elseif (count(editar("registro","correo",$correo_usu))==0) {

    /*Si la variable $Form_Registro es igual a True, se ejecuta la función de registro*/
    if ($Form_Registro) {
        generarCodigo("codigo", codigoAleatorio(6));
        registrarUsuario("registro", $nombre_usu, $correo_usu, $contrasena_usu, "SI", 2, 1);
        
        echo '<script> window.location.href="../maillocal/php/enviar.php?correo_usu='.base64_encode($correo_usu).'"; </script>';
    }
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
        echo '<script> alert("El usuario o la contraseña son incorrectos"); </script>';
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
$estado_reg = $_POST['estado_reg'];
$rol_reg = $_POST['rol_reg'];
$tipodoc_usu = $_POST['tipodoc_usu'];
$documento_usu = $_POST['documento_usu'];
$fechanac_usu = $_POST['fechanac_usu'];
$telefono_usu = $_POST['telefono_usu'];
$celular_usu = $_POST['celular_usu'];
$estado_usu = $_POST['estado_usu'];
$genero_usu = $_POST['genero_usu'];
$nacionalidad_usu = $_POST['nacionalidad_usu'];
$estadocivil_usu = $_POST['estadocivil_usu'];

if ($rol_reg==2) {
        $correoUsuario = $_SESSION['correoUser'];
}
elseif ($rol_reg==1) {
    $correoUsuario = $_SESSION['correo'];
}
$contrasena_reg = DatoREQDB("contrasena","registro","correo='".$correoUsuario."'");

if($Form_Usuarios and $id_usu!=""){
    $idreg = ultimoID("registro","idregistro");
    $idusuario = DatoREQDB("idusuario","usuario","idregistro='".DatoREQDB("idregistro","registro","correo='".$correoUsuario."'")."'");

    actualizarRegistro("registro", $nombre_reg, $correo_reg, $contrasena_reg, "SI", $rol_reg, 1, $idreg);

    actualizarUsuario("usuario", $tipodoc_usu, $documento_usu, $fechanac_usu, $telefono_usu, $celular_usu, $estado_usu, $genero_usu, $nacionalidad_usu, $estadocivil_usu, $idreg, $idusuario);
    echo '<script> window.location.href="p-usuarios.php"; </script>';
}

//Verificar si el usuario existe
if(count(editar("registro","correo",$correo_usu))!=0){
    echo '<script> alert("El usuario ya se encuentra registrado"); </script>';
    echo '<script> window.location.href="p-login.php"; </script>';

}elseif (count(editar("registro","correo",$correo_usu))==0) {

    /*Si el ID del usuario es igual a vacío, se ejecuta la función de inserción*/
    if ($Form_Usuarios and $id_usu=="") {
        registrarUsuario("registro", $nombre_reg, $correo_reg, $contrasena_reg, "SI", 1, 1);
        $idreg = ultimoID("registro","idregistro");
       
        insertarUsuario("usuario", $tipodoc_usu, $documento_usu, $fechanac_usu, $telefono_usu, $celular_usu, "SI", $genero_usu, $nacionalidad_usu, $estadocivil_usu, $idreg);
        echo '<script> window.location.href="p-usuarios.php"; </script>';
    }
}


//Formulario de validacion
$Form_Validar = $_POST['form_validar'];
$codigo = $_POST['codigo'];
$idcodigo = ultimoID("codigo","idcodigo");

if ($Form_Validar and $codigo!=''){

    if (DatoREQDB("codigo","codigo","codigo='".$codigo."' and idcodigo='".$idcodigo."'")!='') {
         echo '<script> alert("Registrado correctamente, por favor inicie sesión"); </script>';
        echo '<script> window.location.href="usuario/"; </script>';
    }
    else{
        echo '<script> alert("El codigo es incorrecto"); </script>';
        echo '<script> window.location.href="../maillocal/php/validar.php"; </script>';
    }
}

//Completar registro
$Form_Completar = $_POST['form_completar'];

$tipodoc_user = $_POST['tipodoc_usu'];
$documento_user = $_POST['documento_usu'];
$fechanac_user = $_POST['fechanac_usu'];
$telefono_user = $_POST['telefono_usu'];
$celular_user = $_POST['celular_usu'];
$genero_user = $_POST['genero_usu'];
$nacionalidad_user = $_POST['nacionalidad_usu'];
$estadocivil_user = $_POST['estadocivil_usu'];

if ($Form_Completar){
$correoUsuario = $_SESSION['correoUser'];

$IDreg = DatoREQDB("idregistro","registro","correo='".$correoUsuario."'");
   
    insertarUsuario("usuario", $tipodoc_user, $documento_user, $fechanac_user, $telefono_user, $celular_user, "SI", $genero_user, $nacionalidad_user, $estadocivil_user, $IDreg);
    echo '<script> alert("Registro exitoso"); </script>';
    echo '<script> window.location.href="usuario/"; </script>';
}
?>