<?php include "cms/modulos/conexion.php" ?>
<?php include "modulos/verificar-ingreso-cliente.php"; ?>
<?php
	$_SESSION['IdCliente']=$xCodCliente;
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
	<?php include("includes/head.php"); ?>
	<meta http-equiv="refresh" content="10;URL=index.php">
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
						<h3><span>Bienvenido</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><strong>Bienvenido</strong></li>
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
								<h4>Bienvenido a <?php echo $xTitulo; ?></h4>
								<p>Hola <strong><?php echo $xAlias; ?></strong> a partir de estos momentos Ud. puede hacer uso del sistema de carrito de compras para realizar pagos de nuestros cursos v&iacute;a web y actualizar sus datos de perfil.</p>
                				<p><a class="btn-more" href="index.php">&laquo; Volver al inicio</a></p>
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