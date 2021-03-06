<?php include "modulos/conexion.php"; ?>
<?php include "modulos/verificar.php"; ?>
<?php include "modulos/clean.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/head.php"); ?>
</head>
<body>
	<div id="loading">
		<div>
			<div></div>
		    <div></div>
		    <div></div>
		</div>
	</div>
	<div id="wrapper">
        <?php $menu = "contacto"; $page = "contacto"; include("includes/header.php") ?>
		<div id="content" class="clearfix">
	        <div class="header">
				<h1 class="page-title">Contacto</h1>
			</div>
			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Contacto <i class="fa fa-caret-right"></i> Datos de Contacto
			</div>
			<div class="wrp clearfix">
				<?php $page = "contacto"; include("includes/menu-contacto.php"); ?>
                <div class="fluid">
					<div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-th"></i> <strong>Datos de Contacto</strong>
							</div>
						</div>
						<div class="widget-content">
							<div class="alert alert-info alert-dismissible" role="alert">
                            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Al final est&aacute; el correo que recibe los mensajes del formulario.
							</div>
                            <?php
								$consultarCot = 'SELECT * FROM contacto';
								$resultadoCot = mysqli_query($enlaces,$consultarCot) or die('Consulta fallida: ' . mysqli_error($enlaces));
								while($filaCot = mysqli_fetch_array($resultadoCot)){
									$xCodigo		= $filaCot['cod_contact'];
									$xPhone			= utf8_encode($filaCot['phone']);
									$xMobile		= utf8_encode($filaCot['mobile']);
									$xEmail			= utf8_encode($filaCot['email']);
									$xCv			= $filaCot['cv'];
							?>
							<ul class="list-group">
								<li class="list-group-item">
									<p><strong>Email:</strong></p>
									<p><?php echo $xEmail; ?></p>
								</li>
								<li class="list-group-item">
                                    <p><strong>Whatsapp:</strong></p>
                                    <p><?php echo $xPhone; ?></p>
								</li>
								<li class="list-group-item">
									<p><strong>Celular:</strong></p>
									<p><?php echo $xMobile; ?></p>
								</li>
							</ul>
                            <a href="contacto-edit.php?cod_contact=<?php echo $xCodigo; ?>" class="btn btn-green"><i class="fa fa-refresh"></i> Editar Contacto</a>
							<?php
								}
								mysqli_free_result($resultadoCot);
							?>
						</div>
                    </div>
				</div>
			</div>
		</div>
		<?php include("includes/footer.php") ?>
	</div>
</body>
</html>