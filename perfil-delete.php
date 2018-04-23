<?php include "cms/modulos/conexion.php"; ?>
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
								<h2 class="page-header">Datos de Perfil</h2>
            				</div>
        				</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                <div class="row">
				                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<p><?php echo utf8_decode($xAlias); ?> ¿Est&aacute; seguro que quiere eliminar su cuenta?</p>
										<p><strong>Nota: Esta acci&oacute;n no se puede deshacer.</strong></p>
										<p><a href="perfil-eliminar.php?cod_cliente=<?php echo $cod_cliente; ?>" class="btn_red">Eliminar Cuenta</a></p>
										<hr>
										<p><a href="perfil.php" class="btn-more">&laquo; Volver a su Perfil</a></p>
									</div>
				                </div>
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