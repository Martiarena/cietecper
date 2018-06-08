<?php include "cms/modulos/conexion.php" ?>
<?php include "modulos/session-core.php"; ?>

<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
	<?php include("includes/head.php"); ?>
</head>
<body id="page-top">
<!-- Outer-wrap -->
<div class="outer-wrap">
	<div class="container">
		<?php $page = "cursos"; include("includes/menu.php"); ?>
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
			<!-- Page Header -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="page-header">
						<h3><span>Cursos</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><strong>Cursos</strong></li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Blog Post Content -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="m-curso-content">
						<div class="row">
							<?php
								$consultarcursos = "SELECT * FROM cursos WHERE estado='Activo' ORDER BY orden";
								$resultadocursos = mysqli_query($enlaces, $consultarcursos);
								$total_registros = mysqli_num_rows($resultadocursos);
								$registros_por_paginas = 6;
								$total_paginas = ceil($total_registros/$registros_por_paginas);
								$pagina = intval(isset($_GET['p']) ? $_GET['p'] : null );

								if($pagina<1 or $pagina>$total_paginas){
									$pagina=1;
								}

								$posicion = ($pagina-1)*$registros_por_paginas;
								$limite = "LIMIT $posicion, $registros_por_paginas";

								$consultarcursos = "SELECT * FROM cursos ORDER BY orden ASC $limite";
			    				$resultadocursos = mysqli_query($enlaces,$consultarcursos) or die('Consulta fallida: ' . mysqli_error($enlaces));
			    				while($filaCur = mysqli_fetch_array($resultadocursos)){
			        				$xCodigo		= $filaCur['cod_curso'];
									$xTitulo		= $filaCur['titulo'];
			                       	$xImagen		= $filaCur['imagen'];
			                       	$xPrecio_normal	= $filaCur['precio_normal'];
			               	?>
			               	<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
								<div class="product-wrap">
									<div class="pw-price">S/. <?php echo number_format($xPrecio_normal,2); ?></div>
									<?php if($xImagen!=""){ ?>
										<img src="cms/images/productos/<?php echo $xImagen; ?>" class="img-responsive img_curso" alt=""/>
									<?php }else{ ?>
										<img src="cms/images/producto/curso.jpg" class="img-responsive img-curso" alt=""/>
			            			<?php } ?>
									<div class="pw-inner">
										<h4><?php echo $xTitulo; ?></h4>
										<ul>
											<li><a href="curso.php?cod_curso=<?php echo $xCodigo; ?>"><span><i class="fa fa-search"></i></span></a></li>
											<?php if($xAlias!=""){ ?>
											<li>
												<form name="fcarrito<?php echo $xCodigo; ?>" action="verificar.php" method="post">
													<input type="hidden" name="cod_curso" id="cod_curso" value="<?php echo $xCodigo; ?>" />
													<input type="hidden" name="cantidad" id="cantidad" value="1" />
                            						<button class="btn-carrito-mas" type="input"><span><i class="fa fa-shopping-cart"></i></span></button>
												</form>
											</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
							<?php
                               	}
                               	mysqli_free_result($resultadocursos);
                            ?>
							<?php		
								$paginas_mostrar = 3;
								if ($total_paginas>1){
								echo "<div class='row'>
									<div class='page-nav' data-animated='0'>
										<ul>";
								if($pagina>1){
									echo "<li><a href='?p=".($pagina-1)."'><span>&laquo;</span></a></li>";
								}
								for($i=$pagina; $i<=$total_paginas && $i<=($pagina+$paginas_mostrar); $i++){
									if($i==$pagina){
										echo "<li class='active'><a><strong><span>$i</span></strong></a></li>";
									}else{
										echo "<li><a href='?p=$i'><span>$i</span></a></li>";
									}
								}
								if(($pagina+$paginas_mostrar)<$total_paginas){
									echo "<li><span>...</span></li>";
								}
								if($pagina<$total_paginas){
									echo "	<li><a href='?p=".($pagina+1)."'><span>&raquo;</span></a></li>";
								}
								echo "	</ul></div></div>";
								}
							?>
							<div class="col-md-12" data-animated="0">
								<p style="margin-top: 1em; margin-bottom: 1em;"><a class="btn-more" href="index.php">&laquo; Volver al inicio</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Blog Post Content -->			
			<?php include("includes/footer-contact.php"); ?>
			<!-- Footer - copyright -->
			<?php include("includes/footer.php"); ?>
		</div>
		<!-- Right Main Content - END -->
	</div>
</div>

</body>
</html>