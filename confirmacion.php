<?php include "cms/modulos/conexion.php"; ?>
<?php include "modulos/verificar-ingreso-cliente.php"; ?>
<?php
	$_SESSION['IdCliente']=$xCodCliente;
	if($_SESSION['IdProducto']==""){
		$link = "cursos.php";
	}else{
		$link = "curso.php?cod_curso=".$_SESSION['IdProducto'];
	}
?>
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
						<h3><span>Confirmaci&oacute;n</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><strong>Confirmaci&oacute;n</strong></li>
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
								<h4>Envio de Pedido Finalizado con &Eacute;xito</h4>
								<p><strong>Hola <?php echo utf8_decode($xAlias); ?> Tus pedidos se enviaron con &eacute;xito</strong></p>
								<p>En breves momentos me podr&eacute; en contacto con Ud.</p>
                				<p><a href="cursos.php" class="btn-more" style="display: inline-block;">Ver Otro Curso</a> | <a href="cerrar-sesion.php" class="btn_green" style="display: inline-block;">Cerrar Sesi&oacute;n</a></p>
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