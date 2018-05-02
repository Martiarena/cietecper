				<select id="qn">
					<option <?php echo ($page == "cursos" ? "selected" : "")?> value="cursos.php" >Cursos</option>
					<option <?php echo ($page == "pedidos" ? "selected" : "")?> value="pedidos.php">Pedidos</option>
					<option <?php echo ($page == "clientes" ? "selected" : "")?> value="clientes.php" >Clientes</option>
				</select>
				<!-- /DropDown Responsive -->
				<div class="quick-nav">
					<ul>
						<li class="qn-first <?php echo ($page == "cursos" ? "active" : "")?>"><a href="cursos.php"><i class="fa fa-book"></i> Cursos</a></li>
						<li class="<?php echo ($page == "pedidos" ? "active" : "")?>"><a href="pedidos.php"><i class="fa fa-cube"></i> Pedidos</a></li>
						<li class="<?php echo ($page == "clientes" ? "active" : "")?>"><a href="clientes.php"><i class="fa fa-users"></i> Clientes</a></li>
					</ul>
				</div>