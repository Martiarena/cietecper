			<!-- Footer contact -->
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12" id="m-contact" data-animated="0">
						<div class="contact-info" data-animated="0">
							<h4>Información de Contacto</h4>
							<ul>
								<?php
									$consultarCot = 'SELECT * FROM contacto';
									$resultadoCot = mysqli_query($enlaces,$consultarCot) or die('Consulta fallida: ' . mysqli_error($enlaces));
									while($filaCot = mysqli_fetch_array($resultadoCot)){
										$xMobile		= $filaCot['mobile'];
										$xEmail			= $filaCot['email'];
										$xPhone			= $filaCot['phone'];
								?>
								<?php if (isset($xMobile)) { ?><li><i class="fa fa-phone"></i> <?php echo $xMobile; ?></li><?php } ?>
								<?php if (isset($xEmail)) { ?><li><i class="fa fa-envelope"></i> <?php echo $xEmail; ?></li><?php } ?>
								<?php if (isset($xPhone)) { ?><li><i class="fa fa-whatsapp"></i> <?php echo $xPhone; ?></li><?php } ?>
								<?php
									}
									mysqli_free_result($resultadoCot);
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>