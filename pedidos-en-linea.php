<?php include "cms/modulos/conexion.php" ?>
<?php include "modulos/verificar-ingreso-cliente.php"; ?>
<?php
$varOrden 	= $_SESSION['IdOrden'];
$varCliente = $_SESSION['IdCliente'];
$total = "";
$carrito = "SELECT * FROM cursos as p, carrito as c WHERE c.cod_orden='$varOrden' AND c.cod_cliente='$varCliente' AND p.cod_curso=c.cod_curso";
$resultado = mysqli_query($enlaces, $carrito);
$fila = mysqli_fetch_assoc($resultado);
$totalCarrito=mysqli_num_rows($resultado);

/*-- Consulta para mostra datos del cliente ---*/
$clientes = "SELECT * FROM clientes WHERE cod_cliente='$xCodCliente'";
$resultCli = mysqli_query($enlaces, $clientes);
$filaCli = mysqli_fetch_array($resultCli);
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
	<?php include("includes/head.php"); ?>
	<script>
		function Enviar(){
			document.ftienda.action="envia-pedido.php";
			document.ftienda.metod="POST";
			document.ftienda.submit();
		}
	</script>
</head>
<body id="page-top">
<!-- Outer-wrap -->
<div class="outer-wrap">
	<div class="container">
		<?php $page = "cursos"; include("includes/menu.php"); ?>
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
			<!-- Page Header -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="page-header">
						<h3><span>Pedidos en L&iacute;nea</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><a href="carrito-compras.php">Carrito de Compras</a></li>
							<li><strong>Pedidos en L&iacute;nea</strong></li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Blog Post Content -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="m-carrito-content">
						<?php
		            		if($totalCarrito>0){
						?>
						<p class="texto-der"><strong>N&deg; de Orden : </strong><?php echo $fila['cod_orden']; ?></p>
						<form id="ftienda" method="post" name="ftienda">
							<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
								<tr>
									<th width="50%" scope="col">CURSO</th>
									<th width="10%" scope="col">CANT.</th>
									<th width="10%" scope="col">PRECIO</th>
									<th width="30%" scope="col">TOTAL</th>
								</tr>
								<?php
									do{
										$xCodigo 	= $fila['cod_curso'];
										$xNombre 	= utf8_decode($fila['titulo']);
										$xImagen 	= $fila['imagen'];
										$xCantidad 	= 1;
										$pmostrar 	= $fila['precio_normal'];
										$subtotal 	= ($xCantidad*$pmostrar);
										$total  	= number_format(($total+$subtotal),2);
								?>
		                        <tr>
									<td>
										<p class="text-center">
		                                	<img class="img-responsive" src="cms/images/productos/<?php echo $xImagen; ?>"><br>
											<strong><?php echo $xNombre; ?></strong>
										</p>
									</td>
									<td><?php echo $xCantidad; ?></td>
									<td>$.<?php echo number_format($pmostrar,2); ?> </td>
									<td>$.<?php echo number_format($subtotal,2); ?> </td>
								</tr>
								<?php
									}while($fila=mysqli_fetch_array($resultado))
								?>
							</table>
								<?php 
									$igv = number_format(($total/10),2);
									$neto = number_format(($total+$igv),2);
								?>
		                    <div class="row">
		    	                <div class="col-lg-offset-8 col-lg-4 col-md-offset-8 col-md-4 col-sm-offset-8 col-sm-4 col-xs-12">
									<div class="row">
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				                            <strong>Monto Bruto : </strong>
		                                </div>
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                    $.<?php echo number_format($total,2); ?>
										</div>
									</div>
		                            <div class="row">
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		        		                    <strong>+ IGV (10%) : </strong>
		                                </div>
		                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                    $.<?php echo number_format($igv,2); ?>
										</div>
									</div>
		                            <div class="row">
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<strong>Neto a Pagar : </strong>
										</div>
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			                                $.<?php echo number_format($neto,2); ?>
		                                </div>
									</div>
								</div>
							</div>
		                    <div class="row">
		    	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                        	<h3>Datos del Cliente</h3>
		                        	<div class="row">
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<strong>Nombres :</strong>
		                                </div>
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<?php echo $filaCli['nombres'] ?>
		                                </div>
									</div>
		                        	<div class="row">
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<strong>Direcci&oacute;n :</strong>
		                                </div>
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<?php echo $filaCli['direccion'] ?>
		                                </div>
									</div>
		                            <div class="row">
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<strong>Tel&eacute;fono :</strong>
		                                </div>
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<?php echo $filaCli['telefono'] ?>
		                                </div>
									</div>
		                            <div class="row">
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<strong>Email :</strong>
		                                </div>
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<?php echo $filaCli['email'] ?>
		                                </div>
									</div>
									<div class="row">
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<strong>Sexo :</strong>
		                                </div>
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<?php echo $filaCli['sexo'] ?>
		                                </div>
									</div>
									<div class="row">
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<strong>Comentarios :</strong>
		                                </div>
		    	                		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                                	<textarea class="form-control" name="comentarios" rows="10"></textarea>
		                                </div>
									</div>
									<div style="clear:both; height: 20px;"></div>
		            			</div>
		                	</div>
						</form>
			            <div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
			    	                <a class="btn btn-primary" href="cerrar-sesion.php"><i class="fa fa-power-off"></i> Cerrar Sesi&oacute;n</a>
			        	            <a class="btn btn-info" href="javascript:print();"><i class="fa fa-print"></i> Imprimir</a>
			            	        <a class="btn btn-success" href="javascript:Enviar();"><i class="fa fa-paper-plane"></i> Ordenar Pedido</a>
									<?php
										}else{
									?>
									<p>En estos momentos el carrito esta sin productos, por favor seleccione uno o m&aacute;s productos desde el cat&aacute;logo para hacer su pedido en l&iacute;nea</p>
									<?php
										}
									?>
			    	       			<!--Formulario paypal-->
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="upload" value="1">
									<input type="hidden" name="business" value="raulmartiarena89-facilitator@gmail.com">            
									<?php 
										$consulCarrito = "SELECT * FROM cursos, carrito WHERE carrito.cod_orden='$varOrden' AND carrito.cod_cliente='$varCliente' AND cursos.cod_curso=carrito.cod_curso";
										$resultCarrito = mysqli_query($enlaces,$consulCarrito);	
										$i = 1;
										while($fila_carr=mysqli_fetch_array($resultCarrito)){
											$xCodigo 	= $fila_carr['cod_curso'];
											$xNombre	= utf8_encode($fila_carr['titulo']);
											$xCantidad	= $fila_carr['cantidad'];
											$pmostrar	= $fila_carr['precio_normal'];
									?>
									<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $xNombre; ?>">
									<input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $xCodigo; ?>">
									<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pmostrar; ?>">
									<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $xCantidad; ?>">
									<?php
										$i++;
										}; 
			            			?>
			            			<input type="hidden" name="currency_code" value="USD">
			            			<input type="hidden" name="lc" value="US">
				            		<input type="hidden" name="rm" value="2">
			        	    		<input type="hidden" name="return" value="http://cietecper.com/prueba/gracias-cliente.php?view=thankyou">
			            			<input type="hidden" name="cancel_return" value="http://cietecper.com/prueba/cancelacion.php">
			            			<input type="hidden" name="notify_url" value="http://cietecper.com/prueba/paypal.php">
				            		<input class="btn btn-danger" type="submit" name="pay now" value="Comprar Ahora" />
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<!-- Blog Post Content -->			
			<?php include("includes/footer-contact.php"); ?>
			<!-- Footer - copyright -->
			<?php include("includes/footer.php"); ?>
		</div>
		<!-- Right Main Content - END -->
	</div>
</div>

</body>
</html>