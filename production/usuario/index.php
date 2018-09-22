	<?php
      include 'headeruser.php';
     ?>

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

	<?php
      include 'footeruser.php';
     ?>