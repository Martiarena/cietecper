<?php include "cms/modulos/conexion.php" ?>
<?php include "modulos/session-core.php"; ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
	<?php include "includes/head.php"; ?>
</head>
<body id="page-top">
<!-- Outer-wrap -->
<div class="outer-wrap">
	<div class="container">
		<?php $page = "inicio"; include "includes/menu.php"; ?>
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
		
			<!-- Intro Slider -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="intro">
						<div id="intro-slider" class="owl-carousel owl-theme">
							<?php
								$consultarBanner = "SELECT * FROM banners WHERE estado='activo' ORDER BY orden";
								$resultadoBanner = mysqli_query($enlaces,$consultarBanner) or die('Consulta fallida: ' . mysqli_error($enlaces));
								while($filaBan = mysqli_fetch_array($resultadoBanner)){
									$xImagen		= $filaBan['imagen'];
							?>
							<div class="item"><img src="cms/images/banner/<?php echo $xImagen; ?>" class="img-responsive" alt=""></div>
							<?php
							}
								mysqli_free_result($resultadoBanner);
							?>
						</div>
					</div>
				</div>
			</div>

			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="welcome" class="text-center">
						<h3>Pedro Oswaldo Valdivia Maldonado</h3>
						<h5>La presente Página ha sido creada para intercambiar información con los ciudadanos del mundo</h5>
						<?php
							$consultarCot = 'SELECT * FROM contacto';
							$resultadoCot = mysqli_query($enlaces,$consultarCot) or die('Consulta fallida: ' . mysqli_error($enlaces));
							while($filaCot = mysqli_fetch_array($resultadoCot)){
								$xCv		= $filaCot['cv'];
						?>
						<?php if (isset($xCv)) { ?><a href="cms/archivos/cv/<?php echo $xCv; ?>" target="_blank" class="btn-default btn-center"><i class="fa fa-download"></i> Curriculum Vitae</a><?php } ?>
						<?php
							}
							mysqli_free_result($resultadoCot);
						?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12" id="vertical-tabs" data-animated="0">
						<div class="row">
							<div class="col-md-12">
								<h3 class="titulo">Generalidades</h3>
							</div>
						</div>
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<?php
								$consultargeneralidades = "SELECT * FROM generalidades ORDER BY orden";
								$resultadogeneralidades = mysqli_query($enlaces,$consultargeneralidades) or die('Consulta fallida: ' . mysqli_error($enlaces));
								while($filaGen = mysqli_fetch_array($resultadogeneralidades)){
									$xCodigo		= $filaGen['cod_generalidad'];
									$xTitulo		= $filaGen['titulo'];
									$xDescripcion	= $filaGen['descripcion'];
									$xOrden			= $filaGen['orden'];
									$xEstado		= $filaGen['estado'];
							?>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading<?php echo $xCodigo; ?>">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $xCodigo; ?>" aria-expanded="true" aria-controls="collapse<?php echo $xCodigo; ?>">
											<?php echo $xTitulo; ?>
										</a>
									</h4>
								</div>
								<div id="collapse<?php echo $xCodigo; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $xCodigo; ?>">
									<div class="panel-body">
										 <?php echo $xDescripcion; ?>
									</div>
								</div>
							</div>
							<?php
								}
								mysqli_free_result($resultadogeneralidades);
							?>
						</div>
					</div>
				</div>
			</div>

			<!-- Generalidades -->
			<div class="row">
				<div class="col-md-12">
					<div id="blog" data-animated="0">
						<div class="">
							<div class="col-md-12">
								<h3 class="titulo">Artículos de Reflexión</h3>
							</div>
						</div>
						<div id="m-blog" class="owl-carousel owl-theme">
							<?php
			        			$consultararticulos = "SELECT * FROM articulos WHERE estado='Activo' ORDER BY fecha DESC LIMIT 10";
			                    $resultadoarticulos = mysqli_query($enlaces,$consultararticulos) or die('Consulta fallida: ' . mysqli_error($enlaces));
			                    while($filaArt = mysqli_fetch_array($resultadoarticulos)){
			                        $xCodigoA		= $filaArt['cod_articulo'];
									$xTitulo		= $filaArt['titulo'];
			                        $xImagen		= $filaArt['imagen'];
			                        $xDescripcion	= $filaArt['descripcion'];
			                        $xFecha			= $filaArt['fecha'];
							?>
							<div class="item">
								<div class="mb-thumb">
									<img src="cms/images/articulos/<?php echo $xImagen; ?>" class="img-responsive" alt=""/>
									<div class="date">
										<?php $day = date('d', strtotime($xFecha)); 
										echo $day; ?>
										<span><?php 
											$month = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
											echo $month[date('n', strtotime($xFecha))-1]
										?></span>
									</div>
									<span class="rmore"><a href="articulo.php?cod_articulo=<?php echo $xCodigoA; ?>">Ver más</a></span>
								</div>
								<h4><a href="articulo.php?cod_articulo=<?php echo $xCodigoA; ?>"><?php 
										$strCut = substr($xTitulo,0,72);
										echo strip_tags($strCut); ?></a></h4>

								<p class="text-justify"><?php 
									$xDescripcion_cl = strip_tags($xDescripcion);
									$strCut = substr($xDescripcion_cl,0,170);
									$xDescripcion_cl = substr($strCut,0,strrpos($strCut, ' ')).'...';
									echo $xDescripcion_cl;
								?></p>
							</div>
							<?php
                                }
                                mysqli_free_result($resultadoarticulos);
                            ?>
						</div>
					</div>
				</div>
			</div>
<!-- 
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12" id="vertical-tabs" data-animated="0">
						<div class="row">
							<div class="col-md-10">
								<h3 class="titulo">Asesoría y Consultoría</h3>
							</div>
							<div class="col-md-2">
								<a class="btn-todos" href="#">Ver todos &raquo;</a>
							</div>
						</div>
						<div id="verticalTab">
							<ul class="resp-tabs-list">
								<li><i class="fa fa-laptop"></i> Suspendisse ac finibus</li>
								<li><i class="fa fa-suitcase"></i> Odio et tempus</li>
								<li><i class="fa fa-youtube-play"></i> Proin tempus blandit</li>
							</ul>
							<div class="resp-tabs-container">
								<div>
									<p>La Comunicación, como proceso natural, nos ayuda a intercambiar Información con las personas y nuestro ambiente. Actualmente las Tecnologías Electrónicas de Comunicación nos permiten este intercambio a la velocidad de la luz, en "tiempo real", a cualquier distancia, en grandes cantidades, y a bajos costos; ello requiere elaborar y procesar la Información con Tecnologías adecuadas que nos permitan aprovechar estas ventajas.</p>
								</div>
								<div>
									<p>Curabitur mauris lorem, egestas sit amet interdum vel, pretium nec quam. Nullam non vestibulum ligula. Fusce eget faucibus mauris, nec ornare orci. Fusce ac magna at turpis tempor iaculis.</p>
									<p>Praesent scelerisque sed leo id pellentesque. Donec ipsum nibh, feugiat id neque sed, posuere malesuada nibh. Integer consequat dolor a ligula condimentum ultricies. Nam pellentesque magna ut condimentum elementum. Etiam sit amet orci euismod, mollis risus eu, sagittis magna. Proin vel metus blandit diam accumsan ornare. Sed a quam odio. Sed ut erat nec purus ultrices ultricies.</p>
								</div>
								<div>
									<p>Integer lacinia commodo est, nec consequat dui fermentum nec. Quisque dapibus magna sit amet sapien tincidunt, vitae condimentum mauris lacinia. Vestibulum eu porta nibh. Curabitur aliquam metus bibendum dolor feugiat, cursus facilisis lectus maximus. Ut porta neque sit amet enim viverra, eu tincidunt ex hendrerit.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non est non tellus sollicitudin sollicitudin. Donec fermentum id dolor eget posuere. Morbi malesuada lacus non urna mattis vulputate. Nulla id fermentum velit, vel aliquet tortor.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
-->
			
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12" id="m-products" data-animated="0">
						<div class="row">
							<div class="col-md-12">
								<h3 class="titulo">Cursos y Capacitaciones</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="product-wrap">
									<div class="pw-price">$152.00</div>
									<img src="http://lorempixel.com/240/200" class="img-responsive" alt=""/>
									<div class="pw-inner">
										<h4>Curso #1</h4>
										<ul>
											<li><a href="#"><span><i class="fa fa-search"></i></span></a></li>
											<li><a href="#"><span><i class="fa fa-shopping-cart"></i></span></a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="product-wrap">
									<div class="pw-price">$170.00</div>
									<img src="http://lorempixel.com/240/200" class="img-responsive" alt=""/>
									<div class="pw-inner">
										<h4>Curso #2</h4>
										<ul>
											<li><a href="#"><span><i class="fa fa-search"></i></span></a></li>
											<li><a href="#"><span><i class="fa fa-shopping-cart"></i></span></a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="product-wrap">
									<div class="pw-price">$259.99</div>
									<img src="http://lorempixel.com/240/200" class="img-responsive" alt=""/>
									<div class="pw-inner">
										<h4>Curso #3</h4>
										<ul>
											<li><a href="#"><span><i class="fa fa-search"></i></span></a></li>
											<li><a href="#"><span><i class="fa fa-shopping-cart"></i></span></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- 
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12" id="icons-wrap" data-animated="0">
						<h3>Enlaces de Interés</h3>
						<ul>
							<li><i class="fa fa-angle-double-right"></i> Algunas Reflexiones sobre el uso de la Tecnología en la Educación</li>
							<li><i class="fa fa-angle-double-right"></i> Jaramillo V et Al</li>
							<li><i class="fa fa-angle-double-right"></i> Cambios necesarios en la educación</li>
							<li><i class="fa fa-angle-double-right"></i> La Educacion en Finlandia</li>
							<li><i class="fa fa-angle-double-right"></i> El sistema educativo es un freno a la creatividad</li>
						</ul>
					</div>
				</div>
			</div>-->
			<?php include("includes/footer-contact.php"); ?>
			<?php include("includes/footer.php"); ?>
		</div>
	</div>
</div>
</body>
</html>