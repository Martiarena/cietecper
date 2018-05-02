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
						<li class="<?php echo ($page == "curriculum" ? "activo" : "")?>"><a href="inicio.php"><i class="fa fa-bookmark"></i> Logo & C.V.</a></li>
						<li class="<?php echo ($page == "banners" ? "activo" : "")?>"><a href="banners.php"><i class="fa fa-picture-o"></i> Banners</a></li>
						<li class="<?php echo ($page == "generalidades" ? "activo" : "")?>"><a href="generalidades.php"><i class="fa fa-list"></i> Generalidades</a></li>
						<li class="<?php echo ($page == "enlaces" ? "activo" : "")?>"><a href="enlaces.php"><i class="fa fa-link"></i> Enlaces</a></li>
						<li class="<?php echo ($page == "metatags" ? "activo" : "")?>"><a href="metatags.php"><i class="fa fa-file-text-o"></i> Metatags</a></li>
					</ul>
				</li>

				<li class="<?php echo ($menu == "articulos" ? "active" : "")?>"><a href="articulos.php"><i class="fa fa-newspaper-o"></i> Art&iacute;culos</a></li>

				<li class="<?php echo ($menu == "tienda" ? "active open" : "")?> collapsible">
					<a href="#" onclick="return false;"><i class="fa fa-shopping-cart"></i> Su tienda</a>
					<ul class="sub-menu">
						<li class="<?php echo ($page == "cursos" ? "activo" : "")?>"><a href="cursos.php"><i class="fa fa-book"></i> Cursos</a></li>
						<li class="<?php echo ($page == "pedidos" ? "activo" : "")?>"><a href="pedidos.php"><i class="fa fa-cube"></i> Pedidos</a></li>
						<li class="<?php echo ($page == "clientes" ? "activo" : "")?>"><a href="clientes.php"><i class="fa fa-users"></i> Clientes</a></li>
					</ul>
				</li>

				<li class="<?php echo ($menu == "contacto" ? "active open" : "")?> collapsible">
					<a href="#" onclick="return false;"><i class="fa fa-address-card-o"></i> Contacto</a>
					<ul class="sub-menu">
						<li class="<?php echo ($page == "contacto" ? "activo" : "")?>"><a href="contacto.php"><i class="fa fa-address-card-o"></i> Contacto</a></li>
						<li class="<?php echo ($page == "social" ? "activo" : "")?>"><a href="social.php"><i class="fa fa-share-alt"></i> Redes Sociales</a></li>
					</ul>
				</li>

			</ul>
		</div> <!-- /sidebar -->