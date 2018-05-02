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
        <?php $menu = "inicio"; $page = "curriculum"; include("includes/header.php") ?>
		<div id="content" class="clearfix">
	        <div class="header">
				<h1 class="page-title">P&aacute;gina de Inicio</h1>
			</div>
			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Inicio <i class="fa fa-caret-right"></i> Logo & CV
			</div>
			<div class="wrp clearfix">
            	<?php $page = "curriculum"; include("includes/menu-inicio.php"); ?>
                <div class="fluid">
					<div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-th"></i> <strong>Logotipo</strong>
							</div>
						</div>
						<div class="widget-content">
                            <?php
								$consultarMet = 'SELECT * FROM metatags';
								$resultadoMet = mysqli_query($enlaces,$consultarMet) or die('Consulta fallida: ' . mysqli_error($enlaces));
								while($filaMet = mysqli_fetch_array($resultadoMet)){
									$xCodigo		= $filaMet['cod_meta'];
									$xLogo			= $filaMet['logo'];
									$xEslogan		= utf8_encode($filaMet['slogan']);
									$xTitulo		= utf8_encode($filaMet['title']);
							?>
							<ul class="list-group">
                               	<li class="list-group-item">
                                    <p><strong>T&iacute;tulo de la web:</strong></p>
                                    <p><?php echo $xTitulo; ?></p>
								</li>
								<li class="list-group-item">
                                    <p><strong>Eslogan:</strong></p>
                                    <p><?php echo $xEslogan; ?></p>
								</li>
                               	<li class="list-group-item">
                                    <p><strong>Logotipo de la web:</strong></p>
                                    <p><img class="thumbnail img-responsive" src="images/meta/<?php echo $xLogo; ?>" />
                                    </p>
								</li>
							</ul>
                            <a href="logo-edit.php?cod_meta=<?php echo $xCodigo; ?>" class="btn btn-green"><i class="fa fa-refresh"></i> Editar Logotipo</a> 
							<?php
								}
								mysqli_free_result($resultadoMet);
							?>
						</div>
                    </div>
                </div>
                <div class="fluid">
                    <div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-th"></i> <strong>Hoja de Vida</strong>
							</div>
						</div>
						<div class="widget-content">
							<?php
								$consultarCot = 'SELECT * FROM contacto';
								$resultadoCot = mysqli_query($enlaces,$consultarCot) or die('Consulta fallida: ' . mysqli_error($enlaces));
								while($filaCot = mysqli_fetch_array($resultadoCot)){
									$xCodigo		= $filaCot['cod_contact'];
									$xCv			= $filaCot['cv'];
							?>
							<ul class="list-group">
								<li class="list-group-item">
									<p><strong>Su hoja de vida (Se muestra al inicio de la página):</strong></p>
									<p><a href="archivos/cv/<?php echo $xCv; ?>" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> <?php echo $xCv; ?></a></p>
								</li>
							</ul>
							<a href="cv-edit.php?cod_contact=<?php echo $xCodigo; ?>" class="btn btn-green"><i class="fa fa-refresh"></i> Editar Hoja de Vida</a> 
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