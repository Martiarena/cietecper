<?php include "cms/modulos/conexion.php" ?>
<?php include "modulos/verificar-ingreso-cliente.php"; ?>
<?php
$varCliente = $_SESSION['IdCliente'];
/*$cambio		= $_REQUEST['cambio'];*/
$consultaClientes = "SELECT * FROM clientes WHERE cod_cliente='$varCliente'";
$ejecutarClientes = mysqli_query($enlaces,$consultaClientes) or die('Consulta fallida: ' . mysqli_error($enlaces));
$filaCli = mysqli_fetch_array($ejecutarClientes);
$cod_cliente		= $filaCli['cod_cliente'];
$nombres 			= $filaCli['nombres'];
$direccion			= $filaCli['direccion'];
$telefono			= $filaCli['telefono'];
$email				= $filaCli['email'];
$clave 				= $filaCli['clave'];
$sexo				= $filaCli['sexo'];
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
		<?php $page = "articulos"; include("includes/menu.php"); ?>
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
			<!-- Page Header -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="page-header">
						<h3><span>Datos de Usuario</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><strong>Perfil</strong></li>
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
								<h4 class="page-header">Datos de Usuario</h4>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<label><strong>Nombres:</strong></label>
									</div>
                    				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        				<?php echo $nombres; ?>
									</div>
                				</div>
				                <div class="row">
				                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				                        <label><strong>Direcci&oacute;n:</strong></label>
									</div>
				                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				                        <?php echo $direccion; ?>
				                    </div>
				                </div>
				                <div class="row">
				                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				                        <label><strong>Tel&eacute;fono:</strong></label>
									</div>
				                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				                        <?php echo $telefono; ?>
									</div>
				                </div>
				                <div class="row">
				                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<label><strong>Sexo:</strong></label>
									</div>
				                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
										<?php echo $sexo; ?>
				                    </div>
				                </div>
				                <div class="row">
				                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                        <p><a class="btn_green_1" href="perfil-editar.php?cod_cliente=<?php echo $cod_cliente; ?>">Cambiar Datos de Perfil</a></p>
				                    </div>
				                </div>
								<h4>Datos de la Cuenta</h4>
								<div class="row">
				                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				                        <label><strong>E-mail:</strong></label>
									</div>
				                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				                        <?php echo $email; ?>
				                    </div>
								</div>
				                <div class="row">
				                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				                        <label><strong>Clave:</strong></label>
									</div>
				                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				                        **************
									</div>
				                </div>
								<div class="row">
				                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				                        <p class="linea"><a class="btn_green_1" href="clave-editar.php?cod_cliente=<?php echo $cod_cliente; ?>">Cambiar Datos de Cuenta</a></p>
				                    </div>
				                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				                        <p style="float:right;"><a class="btn_red" href="perfil-delete.php">Eliminar Cuenta</a></p>
				                    </div>
				                </div>
								<hr>
								<p><a class="btn-more" href="articulos.php">&laquo; Volver al inicio</a></p>
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