<?php 
session_start(); // este por si no la has iniciado en la pagina que planeas destruirla, de lo contrario no te destruirá nada
unset($_SESSION['correoUser']);
echo '<script> window.location.href="index.php"; </script>';
?>