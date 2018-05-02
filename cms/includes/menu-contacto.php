				<select id="qn">
					<option <?php echo ($page == "contacto" ? "selected" : "")?> value="contacto.php" >Contacto</option>
					<option <?php echo ($page == "social" ? "selected" : "")?> value="social.php">Redes Sociales</option>
				</select>
				<!-- /DropDown Responsive -->
				<div class="quick-nav">
					<ul>
						<li class="qn-first <?php echo ($page == "contacto" ? "active" : "")?>"><a href="contacto.php"><i class="fa fa-address-card-o"></i> Contacto</a></li>
						<li class="<?php echo ($page == "social" ? "active" : "")?>"><a href="social.php"><i class="fa fa-link"></i> Redes Sociales</a></li>
					</ul>
				</div>