<?php include "cms/modulos/conexion.php" ?>
<?php include "modulos/session-core.php"; ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
	<?php include "includes/head.php"; ?>
	<script>
		function Agregar(){
			document.fcarrito.action="verificar.php";
			valor=document.fcarrito.cantidad.value;
			if(isNaN(valor)||(valor=="")||(valor==0)){
				alert("Insertar una cantidad valida");
				return;
			}
			document.fcarrito.submit();
		}
	</script>
</head>
<body id="page-top">
	<!-- Outer-wrap -->
	<div class="outer-wrap">
		<div class="container">
			<?php $page = "inicio"; include "includes/menu.php"; ?>
			<!-- Right Main Content -->
			<div class="col-md-9 m-right">
				<!-- Intro Slider -->
				<div class="row">
					<div class="col-md-12">
						<div id="intro">
							<div id="intro-slider" class="owl-carousel owl-theme">
								<?php
									$consultarBanner = "SELECT * FROM banners WHERE estado='activo' ORDER BY orden";
									$resultadoBanner = mysqli_query($enlaces,$consultarBanner) or die('Consulta fallida: ' . mysqli_error($enlaces));
									while($filaBan = mysqli_fetch_array($resultadoBanner)){
										$xImagen		= $filaBan['imagen'];
										$xDescripcion 	= $filaBan['descripcion'];
								?>
								<div class="item">
									<img src="cms/images/banner/<?php echo $xImagen; ?>" class="img-responsive" alt="">
									<?php if($xDescripcion!=""){ ?>
									<div class="text-banner"><?php echo $xDescripcion; ?></div>
									<?php } ?>
								</div>
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

				<div class="row">
					<div class="col-md-12">
						<div id="blog" data-animated="0">
							<div class="">
								<div class="col-md-12">
									<h3 class="titulo">Art&iacute;culos de Reflexi&oacute;n</h3>
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
			
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12" id="m-products" data-animated="0">
							<div class="row">
								<div class="col-md-12">
									<h3 class="titulo">Cursos y Capacitaciones</h3>
								</div>
							</div>

							<div class="row">
								<?php
				                    $consultarCur = "SELECT * FROM cursos WHERE estado='Activo' ORDER BY orden ASC";
			    	                $resultadoCur = mysqli_query($enlaces, $consultarCur);
			        	            while($filaCur = mysqli_fetch_array($resultadoCur)){
			            	            $xCodigo		= $filaCur['cod_curso'];
			                        	$xTitulo		= $filaCur['titulo'];
			                        	$xImagen		= $filaCur['imagen'];
			                        	$xPrecio_normal	= $filaCur['precio_normal'];
				                ?>
								<div class="col-md-4">
									<div class="product-wrap">
										<div class="pw-price">S/. <?php echo number_format($xPrecio_normal,2); ?></div>
										<img src="cms/images/productos/<?php echo $xImagen; ?>" class="img-responsive img_curso" alt=""/>
										<div class="pw-inner">
											<h4><?php echo $xTitulo; ?></h4>
											<ul>
												<li><a href="curso.php?cod_curso=<?php echo $xCodigo; ?>"><span><i class="fa fa-search"></i></span></a></li>
												<?php if($xAlias!=""){ ?>
												<li><form name="fcarrito<?php echo $xCodigo; ?>" action="verificar.php" method="post">
													<input type="hidden" name="cod_curso" id="cod_curso" value="<?php echo $xCodigo; ?>" />
													<input type="hidden" name="cantidad" id="cantidad" value="1" />
                            						<button class="btn-carrito-mas" type="input"><span><i class="fa fa-shopping-cart"></i></span></button>
												</form></li>
												<?php } ?>
											</ul>
										</div>
									</div>
								</div>
								<?php
									}
									mysqli_free_result($resultadoCur); 
								?>
							</div>							
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12 animated-in" id="icons-wrap" data-animated="0">
							<h3>Enlaces de Inter&eacute;s</h3>
							<ul>
								<?php
						            $consultarEnlaces = "SELECT * FROM enlaces WHERE estado='Activo' ORDER BY orden";
						            $resultadoEnlaces = mysqli_query($enlaces,$consultarEnlaces) or die('Consulta fallida: ' . mysqli_error($enlaces));
						            while($filaEnl = mysqli_fetch_array($resultadoEnlaces)){
						            	$xTitulo		= $filaEnl['titulo'];
						                $xDescripcion	= $filaEnl['descripcion'];
						                $xEnlace		= $filaEnl['enlace'];
							    ?>
								<li <?php if($xDescripcion!=""){ ?> style="line-height: initial;" <?php } ?> ><i class="fa fa-play-circle"></i> <strong><?php echo $xTitulo; ?></strong><?php if($xDescripcion!=""){ ?><br><?php }?><?php echo $xDescripcion; ?></li>
								<?php
									}
									mysqli_free_result($resultadoEnlaces);
								?>
							</ul>
						</div>
					</div>
				</div>

				<?php include("includes/footer-contact.php"); ?>
				<?php include("includes/footer.php"); ?>
			</div>
		</div>
	</div>
</body>
</html>