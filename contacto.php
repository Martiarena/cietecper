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
		<?php $page = "contacto"; include("includes/menu.php"); ?>
		<div class="col-md-9 m-right">
			<!-- Page Header -->
			<div class="row">
				<div class="col-md-12">
					<div id="page-header" data-animated="0">
						<h3><span>Contacto</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li>Contacto</li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Contact Content -->
			<div class="row">
				<div class="col-md-12">
					<div id="contact-form">
						<div class="row">
							<div class="col-md-6" data-animated="0">
								<h3>Enlaces de Interés</h3>
								<div class="row">
									<div class="col-md-12" data-animated="0">
										<dl>
											<?php
						                        $consultarEnlaces = "SELECT * FROM enlaces WHERE estado='Activo' ORDER BY orden";
						                        $resultadoEnlaces = mysqli_query($enlaces,$consultarEnlaces) or die('Consulta fallida: ' . mysqli_error($enlaces));
						                        while($filaEnl = mysqli_fetch_array($resultadoEnlaces)){
						                            $xTitulo		= $filaEnl['titulo'];
						                            $xDescripcion	= $filaEnl['descripcion'];
						                            $xEnlace		= $filaEnl['enlace'];
							                ?>
											<dt><a href="<?php echo $xEnlace; ?>" target="_blank"><?php echo $xTitulo; ?></a></dt>
											<dd><?php echo $xDescripcion; ?></dd>
											<?php
												}
												mysqli_free_result($resultadoEnlaces);
											?>
										</dl>
									</div>
								</div>
							</div>
							
							<!-- Contact Form -->
							<div class="col-md-6" data-animated="0">
								<h3>Env&iacute;eme un mensaje</h3>
								<form class="contact-form" data-animated="0" id="contactForm" action="php/contact.php" method="post">
									<div class="mc-name">
										<input type="text" name="senderName" id="senderName" placeholder="Nombre" Required>
										<span><i class="fa fa-user"></i></span>
									</div>
									<div class="mc-email">
										<input type="email" name="senderEmail" id="senderEmail" placeholder="Dirección de Email" Required>
										<span><i class="fa fa-envelope-o"></i></span>
									</div>
									<div class="mc-website">
										<input type="text" name="subject" id="subject" placeholder="Asunto">
										<span><i class="fa fa-link"></i></span>
									</div>
									<div class="mc-message">
										<textarea name="message" id="message" placeholder="Mensaje" Required></textarea>
										<button type="submit"><span>Enviar</span></button>
									</div>
								</form>
								<div id="successMessage" class="successmessage">
									<p><span class="success-ico"></span> Mensaje enviado, le estaré contestando a la brevedad.</p>
								</div>
								<div id="failureMessage" class="errormessage">
									<p><span class="error-ico"></span> Hubo un problema al enviar el mensaje, int&eacute;ntelo de nuevo o mas tarde.</p>
								</div>
								<div id="incompleteMessage" class="statusMessage">
									<p>Por favor complete todos los campos antes de enviar un mensaje.</p>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-12 cf-info" data-animated="0">
									<h3>Informaci&oacute;n de Contacto</h3>
									<p>Escr&iacute;beme me interesa tu opini&oacute;n</p>
									<ul>
										<?php
										$consultarCot = 'SELECT * FROM contacto';
										$resultadoCot = mysqli_query($enlaces,$consultarCot) or die('Consulta fallida: ' . mysqli_error($enlaces));
										while($filaCot = mysqli_fetch_array($resultadoCot)){
											$xMobile		= $filaCot['mobile'];
											$xEmail			= $filaCot['email'];
											$xPhone			= $filaCot['phone'];
										?>
										<?php if (isset($xMobile)) { ?><li><span><i class="fa fa-phone"></i></span><h5>+51 989 126 644</h5></li><?php } ?>
										<?php if (isset($xEmail)) { ?><li><span><i class="fa fa-envelope"></i></span><h5>pvaldivia58@gmail.com</h5></li><?php } ?>
										<?php if (isset($xPhone)) { ?><li><span><i class="fa fa-whatsapp"></i></span><h5>+51 989 126 644</h5></li><?php } ?>
										<?php
										}
										mysqli_free_result($resultadoCot);
										?>
									</ul>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- Contact Content -->
			<?php include("includes/footer.php"); ?>
		</div>
		<!-- Right Main Content - END -->
	</div>
</div>
</body>
</html>
