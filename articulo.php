<?php include "cms/modulos/conexion.php" ?>
<?php include "modulos/session-core.php"; ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php include("includes/head.php"); ?>
<?php $cod_articulo		= $_REQUEST['cod_articulo']; ?>
<body id="page-top">
<!-- Outer-wrap -->
<div class="outer-wrap">
	<div class="container">
	
		<?php include("includes/menu.php"); ?>
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
		
			<!-- Page Header -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="page-header">
						<h3><span>Artículos</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><a href="articulos.php">Artículos</a></li>
							<?php 
								$consultaarticulo = "SELECT * FROM articulos WHERE cod_articulo='$cod_articulo'";
								$ejecutararticulo = mysqli_query($enlaces,$consultaarticulo) or die('Consulta fallida: ' . mysqli_error($enlaces));
								$filaArt = mysqli_fetch_array($ejecutararticulo);
									$cod_articulo	= $filaArt['cod_articulo'];
									$titulo			= $filaArt['titulo'];
									$imagen			= $filaArt['imagen'];
									$categoria		= $filaArt['categoria'];
									$fecha			= $filaArt['fecha'];
									$descripcion	= $filaArt['descripcion'];
									$autor			= $filaArt['autor'];
							?>
							<li><?php echo $titulo; ?></li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Blog Post Content -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="m-blog-content">
						
						<div class="row">
							<div class="col-md-12">
								<article class="item">
									<div class="mb-thumb">
										<img src="cms/images/articulos/<?php echo $imagen; ?>" class="img-responsive" alt=""/>
									</div>
									<h4><?php echo $titulo; ?></h4>
									<div class="blog-meta">
										<?php if(!empty($categoria)){ ?><span><i class="fa fa-book"></i> <?php echo $categoria; ?></span><?php } ?>
										<span><i class="fa fa-user"></i> <?php echo $autor; ?></span>
									</div>
									<div class="texto-articulo">
										<?php echo $descripcion; ?>
									</div>
									<hr>
									<p><a class="btn-more" href="articulos.php">&laquo; Volver a Artículos</a></p>
								</article>
							</div>
						</div>

					</div>
				</div>
			</div>
			<?php include("includes/footer.php"); ?>
		</div>
		<!-- Right Main Content - END -->
	</div>
</div>
<!-- Outer-wrap - END -->

</body>
</html>