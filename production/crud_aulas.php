<?php
session_start();
include '../assets/functions/functions.php';
ini_set('error_reporting',0);

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
    echo '<script> window.location.href="p-aulas.php"; </script>';
}
/*Si el ID del evento es diferente de vacío, se ejecuta la función de actualización*/
else if ($Form_Aulas and $id_aul!="") {
    actualizarAula('aula', $idaula, $numero_aul, $estado_aul, 1);
    echo '<script> window.location.href="p-aulas.php"; </script>';
}

?>