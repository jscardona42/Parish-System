<?php
require_once 'conexion.php';

	function consultar($tabla,$estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare('SELECT * FROM '.$tabla.' where estado="'.$estado.'"');
		$sql->execute();
	      	$resultado = $sql->fetchAll();

	      	return $resultado;
	}


	function editar($tabla,$id){
		$conexion = new Conexion();
		$sql = $conexion->prepare('SELECT * FROM '.$tabla.' where idevento="'.$id.'"');
		$sql->execute();
	      	$resultado = $sql->fetchAll();

	      	return $resultado;
	}

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

	function actualizarEvento($tabla, $nombre_eve, $fechainicial, $fechafinal, $descripcion, $id_eve){
		$conexion = new Conexion();
		$sql = $conexion->prepare("UPDATE ".$tabla." set nombre=?, fechainicial=?,fechafinal=?, descripcion=? where idevento=?");
		$sql->bindParam(1, $nombre_eve);
		$sql->bindParam(2, $fechainicial);
		$sql->bindParam(3, $fechafinal);
		$sql->bindParam(4, $descripcion);
        $sql->bindParam(5, $id_eve);
		// Excecute
        $sql->execute();

        if($sql->execute()){
			echo "Successfully updated Profile";
		}// End of if profile is ok 
		else{
			print_r($sql->errorInfo()); // if any error is there it will be posted
			$msg=" Database problem, please contact site admin ";
		}
	}

	function insertarUsuario($tabla, $nombre, $documento, $correo, $contrasena, $direccion, $telefono, $celular, $fechanac, $idtipodoc, $idgrupo, $idnacionalidad, $idprofesion, $idgenero, $idestadocivil, $idiglesia, $idpais, $iddepartamento, $idciudad, $estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("INSERT INTO $tabla (nombre, documento, correo, contrasena, direccion, telefono, celular, fechanac, idtipodoc, idgrupo, idnacionalidad, idprofesion, idgenero, idestadocivil, idiglesia, idpais, iddepartamento, idciudad, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

		$sql->bindParam(1, $nombre);
        $sql->bindParam(2, $documento);
        $sql->bindParam(3, $correo);
        $sql->bindParam(4, md5($contrasena));
        $sql->bindParam(5, $direccion);
        $sql->bindParam(6, $telefono);
        $sql->bindParam(7, $celular);
        $sql->bindParam(8, $fechanac);
        $sql->bindParam(9, $idtipodoc);
        $sql->bindParam(10, $idgrupo);
        $sql->bindParam(11, $idnacionalidad);
        $sql->bindParam(12, $idprofesion);
        $sql->bindParam(13, $idgenero);
        $sql->bindParam(14, $idestadocivil);
        $sql->bindParam(15, $idiglesia);
        $sql->bindParam(16, $idpais);
        $sql->bindParam(17, $iddepartamento);
        $sql->bindParam(18, $idciudad);
        $sql->bindParam(19, $estado);

        // Excecute
        $sql->execute();
	}

	function login($tabla, $correo, $contrasena){
		$conexion = new Conexion();
		$sql = $conexion->prepare('SELECT * FROM '.$tabla.' where correo="'.$correo.'" and contrasena="'.$contrasena.'"');
		$sql->execute();
	      	$resultado = $sql->fetchAll();

	      	return $resultado;
	}


?>