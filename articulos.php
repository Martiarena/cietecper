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
		<?php $page = "articulos"; include("includes/menu.php"); ?>
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
			<!-- Page Header -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="page-header">
						<h3><span>Art&iacute;culos</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><strong>Art&iacute;culos</strong></li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Blog Post Content -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="m-blog-content">
						<div class="row">
							<?php
								$consultararticulos = "SELECT * FROM articulos WHERE estado='Activo' ORDER BY fecha";
								$resultadoarticulos = mysqli_query($enlaces, $consultararticulos);
								$total_registros = mysqli_num_rows($resultadoarticulos);
								$registros_por_paginas = 6;
								$total_paginas = ceil($total_registros/$registros_por_paginas);
								$pagina = intval(isset($_GET['p']) ? $_GET['p'] : null );

								if($pagina<1 or $pagina>$total_paginas){
									$pagina=1;
								}

								$posicion = ($pagina-1)*$registros_por_paginas;
								$limite = "LIMIT $posicion, $registros_por_paginas";

								$consultararticulos = "SELECT * FROM articulos ORDER BY fecha DESC $limite";
			    				$resultadoarticulos = mysqli_query($enlaces,$consultararticulos) or die('Consulta fallida: ' . mysqli_error($enlaces));
			    				while($filaArt = mysqli_fetch_array($resultadoarticulos)){
			        				$xCodigoA		= $filaArt['cod_articulo'];
									$xTitulo		= $filaArt['titulo'];
			                       	$xImagen		= $filaArt['imagen'];
			                       	$xDescripcion	= $filaArt['descripcion'];
			                       	$xFecha			= $filaArt['fecha'];
							?>
							<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" data-animated="0">
								<div class="item">
									<div class="mb-thumb">
										<?php if($xImagen!=""){ ?>
											<img src="cms/images/articulos/<?php echo $xImagen; ?>" class="img-responsive" alt=""/>
	            						<?php }else{ ?>
											<img src="cms/images/noticia.jpg" class="img-responsive" alt=""/>
			            				<?php } ?>
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
							</div>
							<?php
                               	}
                               	mysqli_free_result($resultadoarticulos);
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
								echo "	</ul></div></div><hr>";
								}
							?>
							<div class="col-md-12" data-animated="0">
								<p><a class="btn-more" href="index.php">&laquo; Volver al inicio</a></p>
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