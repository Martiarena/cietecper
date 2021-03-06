<?php include("modulos/conexion.php"); ?>
<?php include("modulos/verificar.php"); ?>
<?php
$cod_contact	= $_REQUEST['cod_contact'];
if (isset($_REQUEST['proceso'])) {
	$proceso 	= $_POST['proceso'];
} else {
	$proceso 	= "";
}
if($proceso==""){
	$consultaContact = "SELECT * FROM contacto WHERE cod_contact='$cod_contact'";
	$ejecutarContact = mysqli_query($enlaces,$consultaContact) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$filaCot = mysqli_fetch_array($ejecutarContact);
	$xCodigo 		= $filaCot['cod_contact'];
	$xPhone 		= htmlspecialchars(utf8_encode($filaCot['phone']));
	$xMobile 		= htmlspecialchars(utf8_encode($filaCot['mobile']));
	$xEmail 		= htmlspecialchars(utf8_encode($filaCot['email']));
}

if($proceso == "Actualizar"){
	$cod_contact	= $_POST['cod_contact'];
	$phone			= mysqli_real_escape_string($enlaces, utf8_decode($_POST['phone']));
	$mobile			= mysqli_real_escape_string($enlaces, utf8_decode($_POST['mobile']));
	$email			= mysqli_real_escape_string($enlaces, utf8_decode($_POST['email']));

	$ActualizarContact = "UPDATE contacto SET cod_contact='$cod_contact', phone='$phone', mobile='$mobile', email='$email' WHERE cod_contact='$cod_contact'";
	$resultadoActualizar = mysqli_query($enlaces,$ActualizarContact);
	header("Location:contacto.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/head.php"); ?>
	<script type="text/javascript" src="js/rutinas.js"></script>
    <script>
		function Validar(){
			document.fcms.action = "contacto-edit.php";
			document.fcms.proceso.value="Actualizar";
			document.fcms.submit();
		}
		function Imagen(codigo){
			url = "agregar-foto.php?id=" + codigo;
			AbrirCentro(url,'Agregar', 475, 180, 'no', 'no');
		}
	</script>
</head>
<body>
	<div id="loading">
		<div>
			<div></div>
		    <div></div>
		    <div></div>
		</div>
	</div>
	<div id="wrapper">
        <?php $menu = "contacto"; $page = "contacto"; include("includes/header.php"); ?>
		<div id="content" class="clearfix">
			<div class="header">
				<h1 class="page-title">Contacto</h1>
			</div>
			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Contacto <i class="fa fa-caret-right"></i> Editar datos de contacto
			</div>
			<div class="wrp clearfix">
				<?php $page = "contacto"; include("includes/menu-contacto.php"); ?>
                <div class="fluid">
					<div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-th"></i> <strong>Editar Datos de contacto</strong>
							</div>
						</div>
						<div class="widget-content">
                        	<form class="fcms" name="fcms" method="post" action="">
                            	<div class="form-int">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label><strong>Email:</strong></label>
                                        </div>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <input type="email" name="email" value="<?php echo $xEmail; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label><strong>Whatsapp:</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="phone" value="<?php echo $xPhone; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label><strong>Celular:</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="mobile" value="<?php echo $xMobile; ?>" />
                                        </div>
                                    </div>
                                    <div class="separador-20"></div>
                                    <div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="btn-group">
                                            	<a href="contacto.php" class="btn btn-pink"><i class="fa fa-times"></i> Cancelar</a>
                                                <button class="btn btn-green" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Actualizar Datos de Contacto</button>
											</div>
											<input type="hidden" name="proceso">
                							<input type="hidden" name="cod_contact" value="<?php echo $xCodigo; ?>">
                                        </div>
									</div>
                                </div>
    	                    </form>
							<label><span>Los campos con ( <strong>*</strong> ) son obligatorios.</span></label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("includes/footer.php") ?>
	</div>
</body>
</html>