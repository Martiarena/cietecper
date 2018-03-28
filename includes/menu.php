		<div class="navbar-fixed-top black-back">
			<div class="container">
				<div class="row" data-animated="0">
					<div class="col-md-6 text-left">
						<p>
						<?php
							$consultarCot = 'SELECT * FROM contacto';
							$resultadoCot = mysqli_query($enlaces,$consultarCot) or die('Consulta fallida: ' . mysqli_error($enlaces));
							while($filaCot = mysqli_fetch_array($resultadoCot)){
								$xMobile		= $filaCot['mobile'];
								$xEmail			= $filaCot['email'];
								$xPhone			= $filaCot['phone'];
						?>
						<?php if (isset($xMobile)) { ?><span><i class="fa fa-phone"></i> <?php echo $xMobile; ?></span><?php } ?>
						<?php if (isset($xEmail)) { ?><span><i class="fa fa-envelope"></i> <?php echo $xEmail; ?></span><?php } ?>
						<?php if (isset($xPhone)) { ?><span><i class="fa fa-whatsapp"></i> <?php echo $xPhone; ?></span> <?php } ?>
						<?php
							}
							mysqli_free_result($resultadoCot);
						?>
						</p>
					</div>
					<div class="col-md-6 text-right">
						<p><span><i class="fa fa-user"></i> <a href="#">Login</a></span> | <span><i class="fa fa-plus-circle"></i> <a href="#">Registrarse</a></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 m-left">
			<!-- Navmenu -->
			<header>
				<nav class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="index.php"><img src="cms/images/meta/<?php echo $xImage; ?>" class="img-responsive" alt=""/></a>
							<h2 class="logotext"><?php echo $xTitulo; ?></h2>
							<h6 class="logoslogan"><?php echo $xEslogan; ?></h6>
						</div>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right menu-effect">
							<li class="<?php echo ($page == "inicio" ? "current" : "")?>"><a href="index.php" data-hover="Inicio">Inicio</a></li>
							<li class="<?php echo ($page == "articulos" ? "current" : "")?>"><a href="articulos.php" data-hover="Art&iacute;culos">Artículos</a></li>
							<li><a href="#" data-hover="Asesor&iacute;a&nbsp;y&nbsp;Consultor&iacute;a">Asesor&iacute;a y Consultor&iacute;a</a></li>
							<li><a href="cursos.php" data-hover="Cursos">Cursos</a></li>
							<li class="<?php echo ($page == "contacto" ? "current" : "")?>"><a href="contacto.php" data-hover="Contacto">Contacto</a></li>
						</ul>
					</div>
				</nav>
				<!-- Navmenu -->
				<!-- Hidden Content -->
				<div class="m-header">
					<ul class="mh-social">
						<?php
                       		$consultarSol = 'SELECT * FROM social WHERE estado="Activo" ORDER BY orden';
							$resultadoSol = mysqli_query($enlaces,$consultarSol) or die('Consulta fallida: ' . mysqli_error($enlaces));
							while($filaSol = mysqli_fetch_array($resultadoSol)){
								$xType			= $filaSol['type'];
								$xLinks			= $filaSol['links'];
						?>
						<li><a href="<?php echo $xLinks; ?>"><i class="fa <?php echo $xType; ?>"></i></a></li>
						<?php
							}
							mysqli_free_result($resultadoSol);
						?>
					</ul>
					<p class="mh-copy">&copy; 2018 Ciencia y Tecnolog&iacute;a</p>
				</div>
				<div class="m-hide"><i class="fa fa-plus-circle"></i></div>
				<!-- Hidden Content -->
			</header>
		</div>
		<!-- Fixed Left Navigaton - END -->