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
		<?php include("includes/menu.php"); ?>
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
			<!-- Page Header -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="page-header">
						<h3><span>Cancelaci&oacute;n</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><strong>Cancelaci&oacute;n</strong></li>
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
								<h3>Ha cancelado su pedido</h3>
								<p><b>No se cobrar&acute; a su cuenta por ello</b>, si olvid&oacute; algo m&aacute;s puede añadir otro curso desde la respectiva secci&oacute;n</p>
                				<p><a class="btn-more" href="index.php" style="display: inline-block;">Volver al Index</a> | <a href="cursos.php" class="btn_green" style="display: inline-block;">&laquo; Ir a Cursos</a></p>
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