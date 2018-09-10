<?php 
session_start();
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
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
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
					<img width="45px" height="45px" src="images/logops1.png" alt="">
					<span style="color: #fff">Parish System</span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="#">Inicio</a></li>
						<li class="main_nav_item"><a href="#nosotros">Nosotros</a></li>
						<li class="main_nav_item"><a href="#cursos">Cursos</a></li>
						<li class="main_nav_item"><a href="#eventos">Eventos</a></li>
						<li class="main_nav_item"><?php if(isset($_SESSION['correoUser'])){echo '<a href="../p-cerrarsesion.php">Cerrar sesión</a>';}else{echo '<a href="../p-login.php">Iniciar sesión</a>';} ?></a>
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
					</div><?php echo nombreUsuario(); ?>
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
					<li class="menu_item menu_mm"><a href="#">Inicio</a></li>
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

				<div class="menu_copyright menu_mm">Parish Systema Todos los derechos reservados</div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<div class="home">

		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(../../assets/images/church.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Inscripción a cursos</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/evento1.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Alabanza</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/calendario.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Calendario de eventos</h1>
						</div>
					</div>
				</div>

			</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><img width="50px" height="50px" src="images/prev.png"></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><img width="50px" height="50px" src="images/next.png"></div>
		</div>

	</div>
	<!-- page content nuevo evento 
	<div class="hero_boxes">
		<div class="hero_boxes_inner">
			<div class="container">
				<div class="row">

					<div class="col-lg-4 hero_box_col">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/earth-globe.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Online Courses</h2>
								<a href="courses.html" class="hero_box_link">view more</a>
							</div>
						</div>
					</div>

					<div class="col-lg-4 hero_box_col">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/books.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Our Library</h2>
								<a href="courses.html" class="hero_box_link">view more</a>
							</div>
						</div>
					</div>

					<div class="col-lg-4 hero_box_col">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/professor.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Our Teachers</h2>
								<a href="teachers.html" class="hero_box_link">view more</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	-->

	<!-- Popular -->

	<div id="cursos" class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Cursos disponibles</h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes">

			<?php   
	          //Consulta de los grupos
	          $resultado = consultar("curso","SI");

	              foreach ($resultado as $row) {
	                  echo '<!-- Popular Course Item -->
							<div class="col-lg-4 course_box">
								<div class="card">
									<img class="card-img-top" src="../../assets/images/cursos/'.$row["imgcurso"].'" alt="Curso">
									<div class="card-body text-center">
										<div class="card-title"><a href="courses.html">'.$row["curso"].'</a></div>
										<div class="card-text">'.$row["fechaini"].' - '.$row["fechafin"].'</div>
									</div>
									<form id="" data-parsley-validate class="form-horizontal form-label-left" method="post" action="../crud_cursos.php" enctype="multipart/form-data">
									 <div class="form-group text-center">
			                          <div class="col-md-6 col-sm-6 col-xs-12">
			                            <button type="submit" class="btn">INSCRÍBETE</button>
			                            <input type="hidden" name="form_in_curso" id="form_in_curso" value="true"/>
			                            <input type="hidden" name="idcurso" id="idcurso" value="'.$row["idcurso"].'"/>
			                            <input type="hidden" name="idusuario" id="idusuario" value="'.DatoREQDB("idusuario","usuario","idregistro='".DatoREQDB("idregistro","registro","correo='".$_SESSION['correoUser']."'")."'").'"/>
			                          </div>
			                          </form>
			                      </div>
								</div>
							</div>
	                  ';
	              }
	          ?>
			</div>
		</div>		
	</div>

	<!-- Nosotros -->

	<div id="nosotros" class="register">

		<div class="container-fluid">
			
			<div class="row row-eq-height">
				<div class="col-lg-6 nopadding">
					
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Nosotros</h1>
							<p align="left" class="register_text">Somos una empresa sin ánimo de lucro fundada hace más de 100 años. Actualmente estamos al frente de la funda´ción mis pequeños amores y hacemos labores sociales con aydua de la alcaldìa.</p>
							<div class="button button_1 register_button mx-auto trans_200"><a href="#">Conoce más</a></div>
						</div>
					</div>

				</div>

				<div class="col-lg-6 nopadding">
					
					<!-- Search -->

					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
						<div class="search_content text-center">
							<h1 class="search_title">Contáctenos</h1>
							<form id="search_form" class="search_form" action="post">
								<input id="nombres_con" name="nombres_con" class="input_field search_form_name" type="text" placeholder="Nombre completo" required="required" data-error="Este campo es requerido">
								<input id="correo_con" name="correo_con" class="input_field search_form_category" type="email" placeholder="Correo electrónico">
								<input id="telefono_con" name="telefono_con" class="input_field search_form_degree" type="text" placeholder="Teléfono de contacto">
								<button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Enviar datos</button>
							</form>
						</div> 
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Services -->


	<!-- Events -->

	<div id="eventos" class="events page_section">
		<div class="container">
			
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Próximos eventos</h1>
					</div>
				</div>
			</div>
			
			<div class="event_items">

				<!-- Event Item -->
				<?php   
	          //Consulta de los grupos
	          $resultado = consultar("evento","SI");

	              foreach ($resultado as $row) {
	                  echo '<!-- Event Item -->
							<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">'.substr($row["fechainicial"], 8, 4).'</div>
									<div class="event_month">'.obtenerFechaEnLetra($row["fechainicial"]).'</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">'.$row["evento"].'</a></div>
									<div class="event_location">'.$row["lugar"].'</div>
									<p>'.$row["descripcion"].'</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<img src="../../assets/images/eventos/'.$row["imgevento"].'" alt="Evento">
								</div>
							</div>

						</div>	
					</div>
				</div>
	                  ';
	              }
	          ?>				

			</div>
				
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			
			<!-- Newsletter

			<div class="newsletter">
				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Subscribe to newsletter</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col text-center">
						<div class="newsletter_form_container mx-auto">
							<form action="post">
								<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
									<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Email Address" required="required" data-error="Valid email is required.">
									<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>  -->

			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-4 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<img width="45px" height="45px" src="images/logops1.png" alt="">
								<span>Parish System</span>
							</div>
						</div>

						<p class="footer_about_text">Sistema de gestión parroquial que le permite administrar de la mejor forma los procesos administrativos de su iglesia.</p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-4  footer_col">
						<div class="footer_column_title">Menú</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Inicio</a></li>
								<li class="footer_list_item"><a href="#nosotros">Nosotros</a></li>
								<li class="footer_list_item"><a href="#cursos">Cursos</a></li>
								<li class="footer_list_item"><a href="#eventos">Eventos</a></li>
								<li class="footer_list_item"><a href="../p-login.php">Iniciar sesión</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Usefull Links -->


					<!-- Footer Column - Contact -->

					<div class="col-lg-4 footer_col">
						<div class="footer_column_title">Contacto</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									Bosa Holanda, Bogotá D.C
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									0034 37483 2445 322
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>sanjuannepomuceno@gmail.com
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> |Todos los derechos reservados| Parish System |<i class="fa fa-home" aria-hidden="true"></i> desarrollado por <a href="" target="_blank">Parish System Company</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>

		</div>
	</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

</body>
</html>