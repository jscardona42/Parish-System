<?php
include 'conexion.php';

	/********************************************
    Función para consultar un dato
	*********************************************/
	function DatoREQDB($campDB,$namTable,$PosDB){
	$conexion = new Conexion();
	$sql = $conexion->prepare("SELECT ".$campDB." FROM ".$namTable." where ".$PosDB."");
	$sql->execute();
	$resultado = $sql->fetchAll();

	foreach ($resultado as $row) {
			$dato=$row[$campDB];
	  	}
	  	return $dato;
	}

	/********************************************
    Función para consultar
	*********************************************/
	function consultar($tabla,$estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare('SELECT * FROM '.$tabla.' where estado="'.$estado.'"');
		$sql->execute();
	    $resultado = $sql->fetchAll();

	      	return $resultado;
	}

	/********************************************
    Función para consultar por ID
	*********************************************/
	function editar($tabla,$campo,$id){
		$conexion = new Conexion();
		$sql = $conexion->prepare('SELECT * FROM '.$tabla.' where '.$campo.'="'.$id.'"');
		$sql->execute();
	      	$resultado = $sql->fetchAll();

	      	return $resultado;
	}

	/********************************************
    Función para crear un nuevo evento
	*********************************************/
	function insertarEvento($tabla,$nombre, $fechainicial, $fechafinal, $lugar_eve, $imgevento, $estado, $descripcion, $idiglesia){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (evento, fechainicial, fechafinal, lugar, imgevento, estado, descripcion, idiglesia) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bindParam(1, $nombre);
        $sql->bindParam(2, $fechainicial);
        $sql->bindParam(3, $fechafinal);
        $sql->bindParam(4, $lugar_eve);
        $sql->bindParam(5, $imgevento);
        $sql->bindParam(6, $estado);
        $sql->bindParam(7, $descripcion);
        $sql->bindParam(8, $idiglesia);

        // Excecute
        $sql->execute();
	}

	/********************************************
    Función para actualizar los datos de un evento
	*********************************************/
	function actualizarEvento($tabla, $nombre_eve, $fechainicial, $fechafinal, $lugar_eve, $imgevento, $estado, $descripcion, $id_eve){
		$conexion = new Conexion();
		$sql = $conexion->prepare("UPDATE ".$tabla." set evento=?, fechainicial=?,fechafinal=?, lugar=?, imgevento=?, estado=?, descripcion=? where idevento=?");
		$sql->bindParam(1, $nombre_eve);
		$sql->bindParam(2, $fechainicial);
		$sql->bindParam(3, $fechafinal);
		$sql->bindParam(4, $lugar_eve);
        $sql->bindParam(5, $imgevento);
		$sql->bindParam(6, $estado);
		$sql->bindParam(7, $descripcion);
        $sql->bindParam(8, $id_eve);
		// Excecute
        $sql->execute();
	}

	/********************************************
    Función para crear un nuevo curso
	*********************************************/
	function insertarCurso($tabla,$nombre, $fechaini, $fechafin, $cupos, $imgcurso, $estado, $idiglesia){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO ".$tabla." (curso, fechaini, fechafin, cupos, imgcurso, estado, idiglesia) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bindParam(1, $nombre);
        $sql->bindParam(2, $fechaini);
        $sql->bindParam(3, $fechafin);
        $sql->bindParam(4, $cupos);
        $sql->bindParam(5, $imgcurso);
        $sql->bindParam(6, $estado);
        $sql->bindParam(7, $idiglesia);

        // Excecute
        $sql->execute();
	}

	/********************************************
    Función para actualizar los datos de un curso
	*********************************************/
	function actualizarCurso($tabla, $nombre_cur, $fechaini_cur, $fechafin_cur, $cupos_cur, $imgcurso, $estado_cur, $idiglesia_cur, $id_cur){
		$conexion = new Conexion();
		$sql = $conexion->prepare("UPDATE ".$tabla." set curso=?, fechaini=?, fechafin=?, cupos=?, imgcurso=?, estado=?, idiglesia=? where idcurso=?");
		$sql->bindParam(1, $nombre_cur);
		$sql->bindParam(2, $fechaini_cur);
		$sql->bindParam(3, $fechafin_cur);
		$sql->bindParam(4, $cupos_cur);
		$sql->bindParam(5, $imgcurso);
		$sql->bindParam(6, $estado_cur);
		$sql->bindParam(7, $idiglesia_cur);
		$sql->bindParam(8, $id_cur);
		// Excecute
        $sql->execute();
	}

	/********************************************
    Función para crear un nuevo grupo
	*********************************************/
	function insertarGrupo($tabla, $nombre_gru, $nombrelider_gru, $fechacreacion_gru, $telefono_gru, $estado_gru, $descripcion_gru, $idiglesia_gru){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (grupo, nombrelider,fechacreacion,telefono,estado,descripcion,idiglesia) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bindParam(1, $nombre_gru);
        $sql->bindParam(2, $nombrelider_gru);
        $sql->bindParam(3, $fechacreacion_gru);
        $sql->bindParam(4, $telefono_gru);
        $sql->bindParam(5, $estado_gru);
        $sql->bindParam(6, $descripcion_gru);
        $sql->bindParam(7, $idiglesia_gru);

        // Excecute
        $sql->execute();
	}

	/********************************************
    Función para actualizar los datos de un grupo
	*********************************************/
	function actualizarGrupo($tabla, $nombre_gru, $nombrelider_gru, $fechacreacion_gru, $telefono_gru, $estado_gru, $descripcion_gru, $idiglesia_gru, $id_gru){
		$conexion = new Conexion();
		$sql = $conexion->prepare("UPDATE ".$tabla." set grupo=?, nombrelider=?, fechacreacion=?, telefono=?, estado=?, descripcion=?, idiglesia=? where idgrupo=?");
		$sql->bindParam(1, $nombre_gru);
        $sql->bindParam(2, $nombrelider_gru);
        $sql->bindParam(3, $fechacreacion_gru);
        $sql->bindParam(4, $telefono_gru);
        $sql->bindParam(5, $estado_gru);
        $sql->bindParam(6, $descripcion_gru);
        $sql->bindParam(7, $idiglesia_gru);
        $sql->bindParam(8, $id_gru);
		// Excecute
        $sql->execute();
	}

	/********************************************
    Función para crear una nueva aula
	*********************************************/
	function insertarAula($tabla,$numero, $estado, $idiglesia){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (numeroaula, estado, idiglesia) VALUES (?, ?, ?)");
        $sql->bindParam(1, $numero);
        $sql->bindParam(2, $estado);
        $sql->bindParam(3, $idiglesia);

        // Excecute
        $sql->execute();
	}

	/********************************************
    Función para actualizar los datos de un aula
	*********************************************/
	function actualizarAula($tabla, $numero_aul, $estado_aul, $idiglesia_aul, $id_aul){
		$conexion = new Conexion();
		$sql = $conexion->prepare("UPDATE ".$tabla." set numeroaula=?, estado=?, idiglesia=? where idaula=?");
		$sql->bindParam(1, $numero_aul);
		$sql->bindParam(2, $estado_aul);
		$sql->bindParam(3, $idiglesia_aul);
        $sql->bindParam(4, $id_aul);
		// Excecute
        $sql->execute();
	}

	/********************************************
    Función crear un usuario
	*********************************************/
	function registrarUsuario($tabla, $nombre, $correo, $contrasena, $estado,  $idrol, $idiglesia){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (nombres, correo, contrasena, estado, idrol, idiglesia) VALUES (?, ?, ?, ?, ?, ?)");

		$sql->bindParam(1, $nombre);
        $sql->bindParam(2, $correo);
        $sql->bindParam(3, md5($contrasena));
        $sql->bindParam(4, $estado);
        $sql->bindParam(5, $idrol);
        $sql->bindParam(6, $idiglesia);

        // Excecute
        $sql->execute();
	}

	/********************************************
    Función actualizar registro
	*********************************************/
	function actualizarRegistro($tabla, $nombre, $correo, $contrasena, $estado,  $idrol, $idiglesia, $idregistro){
		$conexion = new Conexion();
		$sql = $conexion->prepare("UPDATE ".$tabla." set nombres=?, correo=?, contrasena=?, estado=?, $idrol, idiglesia=? where idregistro=?");
		$sql->bindParam(1, $nombre);
		$sql->bindParam(2, $correo);
		$sql->bindParam(3, $contrasena);
        $sql->bindParam(4, $estado);
        $sql->bindParam(5, $idrol);
        $sql->bindParam(6, $idiglesia);
        $sql->bindParam(7, $idregistro);
		// Excecute
        $sql->execute();
	}


	/********************************************
    Función para iniciar sesión
	*********************************************/
	function login($tabla, $correo, $contrasena){
		$conexion = new Conexion();
		$sql = $conexion->prepare('SELECT * FROM '.$tabla.' where correo="'.$correo.'" and contrasena="'.$contrasena.'"');
		$sql->execute();
	      	$resultado = $sql->fetchAll();

	      	return $resultado;
	}

	/********************************************
    InscripcionCurso
	*********************************************/
	function inscripcionCurso($tabla, $idcurso, $idusuario, $nota, $estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (idcurso, idusuario, nota, estado) VALUES (?, ?, ?, ?)");

		$sql->bindParam(1, $idcurso);
        $sql->bindParam(2, $idusuario);
        $sql->bindParam(3, $nota);
        $sql->bindParam(4, $estado);

        // Excecute
        $sql->execute();
	}

	/********************************************
    InscripcionGrupo
	*********************************************/
	function inscripcionGrupo($tabla, $idgrupo, $idusuario, $estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (idgrupo, idusuario, estado) VALUES (?, ?, ?)");

		$sql->bindParam(1, $idgrupo);
        $sql->bindParam(2, $idusuario);
        $sql->bindParam(3, $estado);

        // Excecute
        $sql->execute();
	}



	/********************************************
    Procedimientos almacenados
	********************************************
	function insertarAula($tabla,$numero, $estado, $idiglesia){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL insertarAula(?, ?, ?)");
        $sql->bindParam(1, $numero);
        $sql->bindParam(2, $estado);
        $sql->bindParam(3, $idiglesia);

        // Excecute
        $sql->execute();
	}

	function actualizarAula($tabla, $idaula, $numero_aul, $estado_aul, $idiglesia_aul){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL actualizarAula(?, ?, ?, ?)");
		$sql->bindParam(1, $id_aul);
		$sql->bindParam(2, $numero_aul);
		$sql->bindParam(3, $estado_aul);
		$sql->bindParam(4, $idiglesia_aul);
		// Excecute
        $sql->execute();
	}*/

	/********************************************
    Inscribir Uusario
	*********************************************/
	function insertarUsuario($tabla, $tipodoc_usu, $documento_usu, $fechanac_usu, $telefono_usu, $celular_usu, $estado_usu, $idgenero_usu, $idnacionalidad_usu, $idestadocivil_usu, $idregistro_usu){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("INSERT INTO $tabla (idtipodoc, documento, fechanac, telefonofijo, celular, estado, idgenero, idnacionalidad, idestadocivil, idregistro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

		$sql->bindParam(1, $tipodoc_usu);
        $sql->bindParam(2, $documento_usu);
        $sql->bindParam(3, $fechanac_usu);
        $sql->bindParam(4, $telefono_usu);
        $sql->bindParam(5, $celular_usu);
        $sql->bindParam(6, $estado_usu);
        $sql->bindParam(7, $idgenero_usu);
        $sql->bindParam(8, $idnacionalidad_usu);
        $sql->bindParam(9, $idestadocivil_usu);
        $sql->bindParam(10, $idregistro_usu);

        // Excecute
        $sql->execute();

	}

	/********************************************
    Configuración
	*********************************************/

	/*Insertar Tipo de documento*/
	function insertarTipoDoc($tabla, $tipodoc, $estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (tipodoc, estado) VALUES (?, ?)");

		$sql->bindParam(1, $tipodoc);
        $sql->bindParam(2, $estado);

        // Excecute
        $sql->execute();
	}

	/*Actualizar Tipo de documento*/
	function actualizarTipoDoc($tabla, $tipodoc, $estado, $idtipodoc){
		$conexion = new Conexion();

		$sql = $conexion->prepare("UPDATE ".$tabla." set  tipodoc=?, estado=? where idtipodoc=?");
		$sql->bindParam(1, $tipodoc);
		$sql->bindParam(2, $estado);
		$sql->bindParam(3, $idtipodoc);
		// Excecute
        $sql->execute();
	}

	/*Actualizar Tipo de documento*/
	function desactivarTipoDoc($tabla, $tipodoc, $estado, $idtipodoc){
		$conexion = new Conexion();

		$sql = $conexion->prepare("UPDATE ".$tabla." set  tipodoc=?, estado=? where idtipodoc=?");
		$sql->bindParam(1, $tipodoc);
		$sql->bindParam(2, $estado);
		$sql->bindParam(3, $idtipodoc);
		// Excecute
        $sql->execute();
	}

	/*Insertar Estado civil*/
	function insertarEstadocivil($tabla, $estadocivil, $estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (estadocivil, estado) VALUES (?, ?)");

		$sql->bindParam(1, $estadocivil);
        $sql->bindParam(2, $estado);

        // Excecute
        $sql->execute();
	}

	/*Actualizar Estado civil*/
	function actualizarEstadocivil($tabla, $estadocivil, $estado, $idestadocivil){
		$conexion = new Conexion();

		$sql = $conexion->prepare("UPDATE ".$tabla." set  estadocivil=?, estado=? where idestadocivil=?");
		$sql->bindParam(1, $estadocivil);
		$sql->bindParam(2, $estado);
		$sql->bindParam(3, $idestadocivil);
		// Excecute
        $sql->execute();
	}

	/*Insertar Nacionalidad*/
	function insertarNacionalidad($tabla, $nacionalidad, $estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (nacionalidad, estado) VALUES (?, ?)");

		$sql->bindParam(1, $nacionalidad);
        $sql->bindParam(2, $estado);

        // Excecute
        $sql->execute();
	}

	/*Actualizar Nacionalidad*/
	function actualizarNacionalidad($tabla, $nacionalidad, $estado, $idnacionalidad){
		$conexion = new Conexion();

		$sql = $conexion->prepare("UPDATE ".$tabla." set  nacionalidad=?, estado=? where idnacionalidad=?");
		$sql->bindParam(1, $nacionalidad);
		$sql->bindParam(2, $estado);
		$sql->bindParam(3, $idnacionalidad);
		// Excecute
        $sql->execute();
	}

	/*Insertar Genero*/
	function insertarGenero($tabla, $genero, $estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (genero, estado) VALUES (?, ?)");

		$sql->bindParam(1, $genero);
        $sql->bindParam(2, $estado);

        // Excecute
        $sql->execute();
	}

	/*Actualizar Genero*/
	function actualizarGenero($tabla, $genero, $estado, $idgenero){
		$conexion = new Conexion();

		$sql = $conexion->prepare("UPDATE ".$tabla." set  genero=?, estado=? where idgenero=?");
		$sql->bindParam(1, $genero);
		$sql->bindParam(2, $estado);
		$sql->bindParam(3, $idgenero);
		// Excecute
        $sql->execute();
	}

	function ultimoID($tabla,$campo){
		$conexion = new Conexion();
		$sql = $conexion->prepare('SELECT MAX('.$campo.') FROM '.$tabla.'');
		$sql->execute();
		$resultado = $sql->fetchAll();

	    foreach ($resultado as $row) {
			$dato=$row[0];
	  	}
	  	return $dato;	
	}

	/*Generar Código*/
	function generarCodigo($tabla, $codigo){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (codigo) VALUES (?)");

		$sql->bindParam(1, $codigo);

        // Excecute
        $sql->execute();
	}

	/*Validar Código*/
	function validarCodigo($tabla, $codigo, $idcodigo){
		$conexion = new Conexion();
		$sql = $conexion->prepare('SELECT * FROM $tabla where codigo="'.$codigo.'" and idcodigo='.$idcodigo.'');
		$sql->execute();
	    $resultado = $sql->fetchAll();

	      	return $resultado;
	}

	/*Generar código aleatorio*/
	function codigoAleatorio($longitud) {
	 $key = '';
	 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
	 $max = strlen($pattern)-1;
	 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	 return $key;
	}

	function obtenerFechaEnLetra($fecha){
	    $dia= conocerDiaSemanaFecha($fecha);
	    $num = date("j", strtotime($fecha));
	    $anno = date("Y", strtotime($fecha));
	    $mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
	    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
	    return $mes;
	}

	function conocerDiaSemanaFecha($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
}

	function nombreUsuario(){
		$primernombre = DatoREQDB("nombres","registro","correo='".$_SESSION['correoUser']."'");
		$nombreUsuario = explode(" ",$primernombre);
		return $nombreUsuario[0]." ".$nombreUsuario[1];
	}

?>