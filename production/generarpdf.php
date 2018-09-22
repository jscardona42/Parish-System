<?php 
session_start();

include '../assets/functions/functions.php';
ini_set('error_reporting',0);
?>

<?php 
$id_insc = base64_decode($_GET['id_insc']);

$editar = editar("inscripcioncurso","idinscripcioncurso",$id_insc);
	
foreach ($editar as $row) {
	 $curso_insc = $row["idcurso"];
	 $usuario_insc = $row["idusuario"];
	 $nota_insc = $row["nota"];
}
$nombre_usuario = DatoREQDB("nombres","registro","idregistro=".DatoREQDB("idregistro","usuario","idusuario=".$row["idusuario"]."")."");
$nombre_curso = DatoREQDB("curso","curso","idcurso=".$row["idcurso"]."");

?>
<div style="text-align: center">
<div style="width: 900px; height: 92%; border:2px solid #000; border-radius: 10px; " >
    <div style="width: 100%; height: 100%; border:2px solid #ef1e1e; border-radius: 10px; ">
    	<h1 style="padding-top: 80px; padding-bottom: 20px">IGLESIA SAN JUAN NEPOMUCENO</h1>
    	<h3>Este diploma se otorga a:</h3>
    	<h1 style="font-size: 60px"><?php echo $nombre_usuario; ?></h1>
    	<p style="font-size: 20px"><?php echo $nombre_curso; ?></p>
    	<h3>5 de enero de 2018</h3>
    </div>
</div>
</div>
<p><a href="pdf.php">Ver tabla en PDF</a></p>