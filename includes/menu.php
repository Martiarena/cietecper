<script>
	function ValidarLog(){
		document.flogin.action="validar.php";
		if(document.flogin.emaillog.value==""){
			alert("Debes ingresar tu email");
			document.flogin.emaillog.focus();
			return;
		}
		if (document.flogin.emaillog.value.indexOf('@') == -1){
			alert ("La \"dirección de email\" no es correcta");
			document.flogin.emaillog.focus();
			return;
		}
		if(document.flogin.clavelog.value==""){
			alert("Debes ingresar su clave");
			document.flogin.clavelog.focus();
			return;
		}
		document.flogin.proceso.value="iniciar";
		document.flogin.submit();
	}
</script>
<div class="hide">
	<div id="demo-modal-content" class="demo-modal-content">
		<form class="contact-form" data-animated="0" id="flogin" name="flogin" action="" method="post">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3>Login para Usuarios</h3>
					<div class="mc-name">
						<input type="text" name="email" id="emaillog" placeholder="Correo" Required>
						<span><i class="fa fa-user"></i></span>
					</div>
					<div class="mc-email">
						<input type="password" name="clave" id="clavelog" placeholder="Clave" Required>
						<span><i class="fa fa-key"></i></span>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<p><a href="olvido.php">&iquest;Olvid&oacute; su clave?</a></p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="text-right">
						<input type="hidden" name="proceso" id="proceso" />
						<input type="button" name="boton1" value="Ingresar" class="btn_green" onClick="javascript:ValidarLog();" />
					</div>
				</div>
			</div>
		</form>
	</div>
	<script>
		function ValidarReg(){
	    	document.fregistro.action="registrar.php";
			if(document.fregistro.nombresreg.value==""){
				alert("Debes llenar tu nombre");
				document.fregistro.nombresreg.focus();
				return;
			}
			if(document.fregistro.direccionreg.value==""){
				alert("Debes llenar tu direccion");
				document.fregistro.direccionreg.focus();
				return;
			}
			if(document.fregistro.telefonoreg.value==""){
				alert("Debes llenar tu teléfono");
				document.fregistro.telefonoreg.focus();
				return;
			}
			if(document.fregistro.emailreg.value==""){
				alert("Debes llenar tu email");
				document.fregistro.emailreg.focus();
				return;
			}
			if (document.fregistro.emailreg.value.indexOf('@') == -1){
				alert ("La \"dirección de email\" no es correcta");
				document.fregistro.emailreg.focus();
				return;
			}
			if(document.fregistro.clavereg.value==""){
				alert("Debes llenar su clave");
				document.fregistro.clavereg.focus();
				return;
			}
			document.fregistro.proceso.value="Registrar";
			document.fregistro.submit();
		}
	</script>
	<div id="demo-modal-content-1" class="demo-modal-content">
		<form class="contact-form" data-animated="0" id="fregistro" name="fregistro" action="" method="post">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3>Registro de Usuarios</h3>
					<div class="mc-website">
						<input type="text" name="nombres" id="nombresreg" placeholder="Nombres" Required>
						<span><i class="fa fa-align-justify"></i></span>
					</div>
					<div class="mc-website">
						<input type="text" name="direccion" id="direccionreg" placeholder="Dirección" Required>
						<span><i class="fa fa-home"></i></span>
					</div>
					<div class="mc-website">
						<input type="text" name="telefono" id="telefonoreg" placeholder="Telefono" Required>
						<span><i class="fa fa-phone"></i></span>
					</div>
					<div class="mc-website">
						<input type="text" name="email" id="emailreg" placeholder="Email" Required>
						<span><i class="fa fa-envelope"></i></span>
					</div>
					<div class="mc-website">
						<input type="password" name="clave" id="clavereg" placeholder="Password" Required>
						<span><i class="fa fa-key"></i></span>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
					<p><strong style="color:#fff;">Sexo:</strong></p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
					<div class="radio">
						<input id="radio-1" name="sexo" type="radio" value="Masculino" checked>
						<label for="radio-1" class="radio-label">Masculino</label>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
					<div class="radio">
						<input id="radio-2" name="sexo" type="radio" value="Femenino">
						<label  for="radio-2" class="radio-label">Femenino</label>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 20px;">
					<div id="mail-status"></div>
					<input type="hidden" name="proceso" id="proceso" />
					<button type="reset" class="btn-limpiar">Limpiar</button> <input type="button"  class="btn_green" value="Registrarse" onClick="javascript:ValidarReg();" />
				</div>
			</div>
		</form>
	</div>
</div>
<div class="navbar-fixed-top black-back">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-6 text-contact">
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
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-6 text-login">
				<?php if($xAlias!=""){ ?>
				<p><span><i class="fa fa-user"></i> <a href="perfil.php"><strong>Perfil</strong></a></span> | <span><a href="carrito-compras.php"><i class="fa fa-shopping-cart"></i> Ver Compras</a></span> | <span><a href="cerrar-sesion.php"><i class="fa fa-power-off"></i> Salir</a></span></p>
				<?php }else{ ?>
				<p><span><i class="fa fa-user"></i> <a id="fadePopup" href="#">Login</a></span> | <span><i class="fa fa-plus-circle"></i> <a id="fadePopup1" href="#">Registro</a></span></p>
				<?php } ?>
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
					<li class="<?php echo ($page == "articulos" ? "current" : "")?>"><a href="articulos.php" data-hover="Art&iacute;culos">Art&iacute;culos</a></li>
					<li class="<?php echo ($page == "asesoria" ? "current" : "")?>"><a href="#" data-hover="Asesor&iacute;a&nbsp;y&nbsp;consultor&iacute;a">Asesor&iacute;a y consultor&iacute;a</a></li>
					<li class="<?php echo ($page == "cursos" ? "current" : "")?>"><a href="cursos.php" data-hover="Cursos">Cursos</a></li>
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