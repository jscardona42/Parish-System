<?php session_start();
include '../../assets/functions/functions.php';
ini_set('error_reporting',0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Parish System</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../assets/styles/bootstrap4/bootstrap.min.css">
<link href="../../plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../../assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../../assets/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../../assets/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../../assets/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/styles.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/responsive.css">
</head>
<body>
<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center" style="">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img width="30px" height="30px" src="images/logops2.png" alt="">
					<span style="color: #fff">Parish System</span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="index.php">Inicio</a></li>
						<li class="main_nav_item"><a href="index.php#nosotros">Nosotros</a></li>
						<li class="main_nav_item"><a href="index.php#cursos">Cursos</a></li>
						<li class="main_nav_item"><a href="index.php#eventos">Eventos</a></li>
						<li class="main_nav_item"><?php if(isset($_SESSION['correoUser'])){echo '<a href="cerrarsesionuser.php">Cerrar sesión</a>';}else{echo '<a href="../p-login.php">Iniciar sesión</a>';} ?></a>
						</li>

					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<img src="images/phone-call.svg" alt="">
			<span style="color: #000">
				 <div style="<?php if(isset($_SESSION['correoUser'])){echo 'display: none';}else{echo 'display: block';} ?>">
					<div class="footer_contact_icon">
						<img src="images/smartphone.svg" alt="Teléfono">
					</div>320 234 5676
				</div>
				<div style="<?php if(isset($_SESSION['correoUser'])){echo 'display: block';}else{echo 'display: none';} ?>">
					<div class="footer_contact_icon">
						<img src="images/user.png" alt="Usuario">
					</div><a href="completarregistro.php"><?php echo nombreUsuarioF(); ?></a>
				</div>
			</span>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>
	
	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="index.php">Inicio</a></li>
					<li class="menu_item menu_mm"><a href="#nosotros">Nosotros</a></li>
					<li class="menu_item menu_mm"><a href="#cursos">Cursos</a></li>
					<li class="menu_item menu_mm"><a href="#eventos">Eventos</a></li>
					<li class="menu_item menu_mm"><a href="../p-login.php">Iniciar sesión</a></li>
				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Parish System Company Todos los derechos reservados</div>
			</div>

		</div>

	</div>
	
	<!-- Home -->