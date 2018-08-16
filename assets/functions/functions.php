<?php
require_once 'conexion.php';

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
	function insertarEvento($tabla,$nombre, $fechainicial, $fechafinal, $estado, $descripcion, $idiglesia){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (nombre, fechainicial, fechafinal, estado, descripcion, idiglesia) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->bindParam(1, $nombre);
        $sql->bindParam(2, $fechainicial);
        $sql->bindParam(3, $fechafinal);
        $sql->bindParam(4, $estado);
        $sql->bindParam(5, $descripcion);
        $sql->bindParam(6, $idiglesia);

        // Excecute
        $sql->execute();
	}

	/********************************************
    Función para actualizar los datos de un evento
	*********************************************/
	function actualizarEvento($tabla, $nombre_eve, $fechainicial, $fechafinal, $estado, $descripcion, $id_eve){
		$conexion = new Conexion();
		$sql = $conexion->prepare("UPDATE ".$tabla." set nombre=?, fechainicial=?,fechafinal=?, estado=?, descripcion=? where idevento=?");
		$sql->bindParam(1, $nombre_eve);
		$sql->bindParam(2, $fechainicial);
		$sql->bindParam(3, $fechafinal);
		$sql->bindParam(4, $estado);
		$sql->bindParam(5, $descripcion);
        $sql->bindParam(6, $id_eve);
		// Excecute
        $sql->execute();
	}

	/********************************************
    Función para crear un nuevo curso
	*********************************************/
	function insertarCurso($tabla,$nombre, $cupos, $idiglesia, $estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (nombre, cupos, idiglesia, estado) VALUES (?, ?, ?, ?)");
        $sql->bindParam(1, $nombre);
        $sql->bindParam(2, $cupos);
        $sql->bindParam(3, $idiglesia);
        $sql->bindParam(4, $estado);

        // Excecute
        $sql->execute();
	}

	/********************************************
    Función para actualizar los datos de un curso
	*********************************************/
	function actualizarCurso($tabla, $nombre_cur, $cupos_cur, $idiglesia_cur, $estado_cur, $id_cur){
		$conexion = new Conexion();
		$sql = $conexion->prepare("UPDATE ".$tabla." set nombre=?, cupos=?, idiglesia=?, estado=? where idcurso=?");
		$sql->bindParam(1, $nombre_cur);
		$sql->bindParam(2, $cupos_cur);
		$sql->bindParam(3, $idiglesia_cur);
		$sql->bindParam(4, $estado_cur);
        $sql->bindParam(5, $id_cur);
		// Excecute
        $sql->execute();
	}

	/********************************************
    Función para crear un nuevo grupo
	*********************************************/
	function insertarGrupo($tabla, $nombre_gru, $nombrelider_gru, $fechacreacion_gru, $telefono_gru, $estado_gru, $descripcion_gru, $idiglesia_gru){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (nombre, nombrelider,fechacreacion,telefono,estado,descripcion,idiglesia) VALUES (?, ?, ?, ?, ?, ?, ?)");
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
		$sql = $conexion->prepare("UPDATE ".$tabla." set nombre=?, nombrelider=?, fechacreacion=?, telefono=?, estado=?, descripcion=?, idiglesia=? where idgrupo=?");
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
	********************************************
	function insertarAula($tabla,$numero, $estado, $idiglesia){
		$conexion = new Conexion();
		echo '<script> alert("Insert '.$numero_aul.'"); </script>';
		$sql = $conexion->prepare("INSERT INTO $tabla (numeroaula, estado, idiglesia) VALUES (?, ?, ?)");
        $sql->bindParam(1, $numero);
        $sql->bindParam(2, $estado);
        $sql->bindParam(3, $idiglesia);

        // Excecute
        $sql->execute();
	}*/

	/********************************************
    Función para actualizar los datos de un aula
	********************************************
	function actualizarAula($tabla, $numero_aul, $estado_aul, $idiglesia_aul, $id_aul){
		$conexion = new Conexion();
		$sql = $conexion->prepare("UPDATE ".$tabla." set numeroaula=?, estado=?, idiglesia=? where idaula=?");
		$sql->bindParam(1, $numero_aul);
		$sql->bindParam(2, $estado_aul);
		$sql->bindParam(3, $idiglesia_aul);
        $sql->bindParam(4, $id_aul);
		// Excecute
        $sql->execute();
	}*/

	/********************************************
    Función crear un usuario
	*********************************************/
	function resgistrarUsuario($tabla, $nombre, $correo, $contrasena, $estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (nombre, correo, contrasena, estado) VALUES (?, ?, ?, ?)");

		$sql->bindParam(1, $nombre);
        $sql->bindParam(2, $correo);
        $sql->bindParam(3, md5($contrasena));
        $sql->bindParam(4, $estado);

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
    Procedimientos almacenados
	*********************************************/
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
	}


?>