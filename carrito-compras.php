<?php include "cms/modulos/conexion.php" ?>
<?php include "modulos/verificar-ingreso-cliente.php"; ?>
<?php
	$varOrden 	= $_SESSION['IdOrden'];
	$varCliente = $_SESSION['IdCliente'];
	$total = "";

	$carrito = "SELECT * FROM cursos as p, carrito as c WHERE c.cod_orden='$varOrden' AND c.cod_cliente='$varCliente' AND p.cod_curso=c.cod_curso";
	$resultado = mysqli_query($enlaces,$carrito);
	$fila = mysqli_fetch_assoc($resultado);
	$totalCarrito=mysqli_num_rows($resultado);
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
	<?php include("includes/head.php"); ?>
	<script>
		function Procesar(strAccion){
			if(strAccion=="Ordenar"){
				document.ftienda.action="pedidos-en-linea.php";
			}else{
				document.ftienda.action="verifica-carrito.php";
			}
			document.ftienda.method="POST";
			document.ftienda.proceso.value=strAccion;
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
						<h3><span>Carrito de Compras</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><strong>Carrito de Compras</strong></li>
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
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        	        	<p class="texto-der"><strong>N&ordm; de Orden :</strong> <?php echo $fila['cod_orden']; ?></p>
							</div>
						</div>
						<div class="row">
		                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			        	        <p><strong>Usuario : </strong><?php echo utf8_decode($xAlias); ?></p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    	        	    <p class="texto-der"><strong>Email :</strong><?php echo $xEmailc; ?></p>
		                	</div>
		                </div>
		                <form id="ftienda" method="post" name="ftienda">
				            <div class="row">
			    	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
										<tr>
											<th width="5%" scope="col">&nbsp;</th>
											<th width="45%" scope="col">CURSO</th>
											<th width="20%" scope="col">PRECIO</th>
											<th width="30%" scope="col">TOTAL</th>
										</tr>
										<?php
			                                do{
			                                    $xCodpro 	= $fila['cod_curso'];
			                                    $xNombre 	= utf8_decode($fila['titulo']);
			                                    $xImagen 	= $fila['imagen'];
			                                    $xCantidad 	= 1;
			                                    $pmostrar 	= $fila['precio_normal'];
			                                    $subtotal 	= ($xCantidad*$pmostrar);
			                                    $total 		= number_format(($total+$subtotal),2);
			                            ?>
										<tr>
											<td><input type="checkbox" name="chk<?php echo $xCodpro; ?>"></td>
											<td>
			                                    <p class="text-center">
			                                        <img class="img-responsive" style="display:inline-block; max-width:150px;" src="cms/images/productos/<?php echo $xImagen; ?>"><br>
			                                        <strong><?php echo $xNombre; ?></strong>
			                                        <input name="txt<?php echo $xCodpro; ?>" type="hidden" id="txt" value="<?php echo $xCantidad; ?>" />
			                                    </p>
			                                </td>
											<td>$.<?php echo number_format($pmostrar,2); ?> </td>
											<td>$.<?php echo number_format($subtotal,2); ?> </td>
										</tr>
										<?php
											}
											while($fila=mysqli_fetch_array($resultado))
										?>
									</table>
								</div>
							</div>
							<?php 
								$igv = ($total/10);
								$neto = ($total+$igv);
							?>
		                    <div class="row">
		    	                <div class="col-lg-offset-8 col-lg-4 col-md-offset-8 col-md-4 col-sm-offset-8 col-sm-4 col-xs-12">
		                    		<input type="hidden" name="proceso">
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
		        		                    <strong>+ IGV(10%) : </strong>
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
			                                $.<?php echo number_format(($total+$igv),2); ?>
		                                </div>
									</div>
								</div>
							</div>
		                    <div class="row">
		                    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                            <a class="btn btn-primary" href="cursos.php"><i class="fa fa-shopping-cart"></i> Ver cursos</a>
		                            <a class="btn btn-danger" href="javascript:Procesar('Eliminar')"><i class="fa fa-trash"></i> Borrar</a>
		                            <a class="btn btn-success" href="javascript:Procesar('Ordenar')"><i class="fa fa-paper-plane"></i> Ordenar Pedido</a>
		                        </div>
							</div>
						</form>
						<?php
							}else{
						?>
						<p>En estos momentos el carrito esta sin productos, por favor seleccione uno o mas productos desde el cat&aacute;logo</p>
						<?php
							}
						?>
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