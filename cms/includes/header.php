		<div id="top">
			<div class="main-logo">
				<a href="index.php" onclick="return false;"><img src="images/administrador.png"></a>
			</div>
			<div class="m-nav"><i class="fa fa-bars"></i></div>
			<div class="profile-nav">
				<ul>
					<li class="profile-user-info">
						<a href="#" onclick="return false;">
							<b>Bienvenido, </b><span><?php echo $xAlias; ?></span> <i class="fa fa-user"></i>
						</a>
					</li>
					<li>
						<a href="usuarios.php">
							<i class="fa fa-gear"></i> Usuarios
						</a>
					</li>
					<li>
						<a href="cerrar_sesion.php">
							<i class="fa fa-times-circle"></i> Logout
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="sidebar">
			<ul class="main-nav">
				<li class="<?php echo ($menu == "inicio" ? "active open" : "")?> collapsible">
					<a href="#" onclick="return false;"><i class="fa fa-home"></i> Inicio</a>
					<ul class="sub-menu">
						<li class="<?php echo ($page == "metatags" ? "activo" : "")?>"><a href="inicio.php"><i class="fa fa-file-text-o"></i> Meta tags</a></li>
						<li class="<?php echo ($page == "banners" ? "activo" : "")?>"><a href="banners.php"><i class="fa fa-picture-o"></i> Banners</a></li>
						<li class="<?php echo ($page == "generalidades" ? "activo" : "")?>"><a href="generalidades.php"><i class="fa fa-list"></i> Generalidades</a></li>
					</ul>
				</li>
				<li class="<?php echo ($menu == "articulos" ? "active" : "")?>"><a href="articulos.php"><i class="fa fa-newspaper-o"></i> Art&iacute;culos</a></li>
				<!-- 
				<li class="collapsible">
					<a href="#" onclick="return false;"><i class="fa fa-folder"></i> Portafolio</a>
                    <ul class="sub-menu">
						<li><a href="portafolio-categorias.php"><i class="fa fa-window-restore"></i> Categor&iacute;as</a></li>
						<li><a href="portafolio.php"><i class="fa fa-folder-open"></i> Trabajos</a></li>
						<li><a href="portafolio-galerias.php"><i class="fa fa-picture-o"></i> Fotos</a></li>
					</ul>
                </li>
            	
				<li class="collapsible">
					<a href="#" onclick="return false;"><i class="fa fa-cube"></i> Cursos</a>
                    <ul class="sub-menu">
						<li><a href="productos.php"><i class="fa fa-cube"></i> Cursos</a></li>
						<li><a href="pedidos.php"><i class="fa fa-shopping-cart"></i> Registrados</a></li>
					</ul>
                </li>
				<li><a href="clientes.php"><i class="fa fa-users"></i> Clientes</a></li> -->
				<li class="<?php echo ($menu == "contacto" ? "active" : "")?>"><a href="contacto.php"><i class="fa fa-map-marker"></i> Contacto</a></li>
				<li class="<?php echo ($menu == "social" ? "active" : "")?>"><a href="social.php"><i class="fa fa-share-alt"></i> Redes Sociales</a></li>
			</ul>
		</div> <!-- /sidebar -->