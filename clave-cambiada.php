<?php include "cms/modulos/conexion.php"; ?>
<?php include "modulos/verificar-ingreso-cliente.php"; ?>
<?php
$varCliente = $_SESSION['IdCliente'];
$consultaClientes = "SELECT * FROM clientes WHERE cod_cliente='$varCliente'";
$ejecutarClientes = mysqli_query($enlaces,$consultaClientes) or die('Consulta fallida: ' . mysqli_error($enlaces));
$filaCli = mysqli_fetch_array($ejecutarClientes);
$cod_cliente		= $filaCli['cod_cliente'];
$email				= $filaCli['email'];
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
						<h3><span>Clave Cambiada</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><strong>Clave Cambiada</strong></li>
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
								<h4>Clave Cambiada con &Eacute;xito</h4>
								<p><strong>Hola <?php echo utf8_decode($xAlias); ?> Tus clave se cambi&oacute; con &eacute;xito</strong></p>
								<p>Un correo con todos sus datos ha sido enviado a <?php echo $email; ?>.<br>
								No olvide inciar sesi&oacute;n con su nueva contrase&ntilde;a</p>
								<p><a href="perfil.php" class="btn-more">Volver al Perfil</a> | <a href="cerrar-sesion.php" class="btn_green_1">CERRAR SESION</a></p>
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