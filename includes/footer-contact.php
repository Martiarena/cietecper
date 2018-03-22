			<!-- Footer contact -->
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12" id="m-contact" data-animated="0">
						<h3>Escr&iacute;beme me interesa tu opini&oacute;n</h3>
						<form class="contact-form" data-animated="0" id="contactForm" action="php/contact.php" method="post">
							<div class="row">
								<div class="col-md-6">
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
								</div>
								<div class="col-md-6">
									<div class="mc-message">
										<textarea name="message" id="message" placeholder="Mensaje" Required></textarea>
										<button type="submit"><span>Enviar</span></button>
									</div>
								</div>
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