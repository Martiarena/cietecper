				<select id="qn">
					<option <?php echo ($page == "curriculum" ? "selected" : "")?> value="cv.php" >Logo & CV</option>
					<option <?php echo ($page == "banners" ? "selected" : "")?> value="banners.php">Banners</option>
					<option <?php echo ($page == "generalidades" ? "selected" : "")?> value="generalidades.php" >Generalidades</option>
					<option <?php echo ($page == "enlaces" ? "selected" : "")?> value="enlaces.php" >Enlaces</option>
					<option <?php echo ($page == "metatags" ? "selected" : "")?> value="inicio.php">Metatags</option>
				</select>
				<!-- /DropDown Responsive -->
				<div class="quick-nav">
					<ul>
						<li class="qn-first <?php echo ($page == "curriculum" ? "active" : "")?>"><a href="inicio.php"><i class="fa fa-bookmark"></i> Logo & CV</a></li>
						<li class="<?php echo ($page == "banners" ? "active" : "")?>"><a href="banners.php"><i class="fa fa-picture-o"></i> Banners</a></li>
						<li class="<?php echo ($page == "generalidades" ? "active" : "")?>"><a href="generalidades.php"><i class="fa fa-list"></i> Generalidades</a></li>
						<li class="<?php echo ($page == "enlaces" ? "active" : "")?>"><a href="enlaces.php"><i class="fa fa-link"></i> Enlaces</a></li>
						<li class="<?php echo ($page == "metatags" ? "active" : "")?>"><a href="metatags.php"><i class="fa fa-file-text-o"></i> Metatags</a></li>
					</ul>
				</div>