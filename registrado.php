<?php include "cms/modulos/conexion.php" ?>
<?php include "modulos/session-core.php"; ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
	<?php include("includes/head.php"); ?>
	<meta http-equiv="refresh" content="15;URL=index.php">
</head>
<body id="page-top">
<!-- Outer-wrap -->
<div class="outer-wrap">
	<div class="container">
		<?php include("includes/menu.php"); ?>
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
			<!-- Page Header -->
			<div class="row">
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
								<div class="alert alert-success text-center">
									<h3>Bienvenido a <?php echo $xTitulo; ?></h3>
                					<p>Gracias por registrarse como cliente, <span class="label label-success">un email ha sido enviado al correo registrado</span> con sus datos de usuario para que pueda loguearse y puede hacer uso del sistema de carrito de compras para realizar pagos de nuestros cursos v&iacute;a web y actualizar sus datos de perfil.</p>
                				</div>
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