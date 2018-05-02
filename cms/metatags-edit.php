<?php include("modulos/conexion.php"); ?>
<?php include("modulos/verificar.php"); ?>
<?php
$cod_meta	= $_REQUEST['cod_meta'];
if (isset($_REQUEST['proceso'])) {
	$proceso 	= $_POST['proceso'];
} else {
	$proceso 	= "";
}
if($proceso==""){
	$consultaMet = "SELECT * FROM metatags WHERE cod_meta='$cod_meta'";
	$ejecutarMet = mysqli_query($enlaces,$consultaMet) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$filaMet = mysqli_fetch_array($ejecutarMet);
	$xCodigo 	= $filaMet['cod_meta'];
	$xDes 		= htmlspecialchars(utf8_encode($filaMet['description']));
	$xKey 		= htmlspecialchars(utf8_encode($filaMet['keywords']));
	$xUrl 		= $filaMet['url'];
	$xFace1		= $filaMet['face1'];
	$xFace2 	= $filaMet['face2'];
	$xIco 		= $filaMet['ico'];
}

if($proceso == "Actualizar"){
	$cod_meta		= $_POST['cod_meta'];
	$description	= mysqli_real_escape_string($enlaces, utf8_decode($_POST['description']));
	$keywords		= mysqli_real_escape_string($enlaces, utf8_decode($_POST['keywords']));
	$url			= $_POST['url'];
	$face1			= $_POST['face1'];
	$face2			= $_POST['face2'];
	$ico			= $_POST['ico'];

	$ActualizarMeta = "UPDATE metatags SET cod_meta='$cod_meta', description='$description', keywords='$keywords', url='$url', face1='$face1', face2='$face2', ico='$ico' WHERE cod_meta='$cod_meta'";
	$resultadoActualizar = mysqli_query($enlaces,$ActualizarMeta) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$mensaje = "<div class='alert alert-danger' role='alert'>
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		<p><strong>Nota:</strong> Metatags actualizados con &eacute;xito.</p>
	</div>";
	header("Location:metatags.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/head.php"); ?>
    <script type="text/javascript" src="js/rutinas.js"></script>
    <script>
		function Validar(){
			if(document.fcms.url.value==""){
				alert("¡La Url es obligatoria!");
				document.fcms.url.focus();
				return;	
			}
			document.fcms.action = "metatags-edit.php";
			document.fcms.proceso.value="Actualizar";
			document.fcms.submit();
		}
		function Imagen(codigo){
			url = "agregar-foto.php?id=" + codigo;
			AbrirCentro(url,'Agregar', 475, 180, 'no', 'no');
		}
	</script>
    <script src="js/visitante-alert.js"></script>
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
        <?php $menu = "inicio"; $page = "metatags"; include("includes/header.php"); ?>
		<div id="content" class="clearfix">
			<div class="header">
				<h1 class="page-title">P&aacute;gina de Inicio</h1>
			</div>
			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Inicio <i class="fa fa-caret-right"></i> Metatags <i class="fa fa-caret-right"></i> Editar Metatags
			</div>
			<div class="wrp clearfix">
            	<?php $page = "metatags"; include("includes/menu-inicio.php"); ?>
                <div class="fluid">
					<div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-th"></i> <strong>Editar Metatags</strong>
							</div>
						</div>
						<div class="widget-content">
                        	<div class="alert alert-info alert-dismissible" role="alert">
                            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Metatags son los nombres, descripci&oacute;n y palabras clave con las que apareceran su web para los buscadores y redes sociales.
							</div>
                        	<form class="fcms" name="fcms" method="post" action="">
                            	<div class="form-int">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label><strong>Descripci&oacute;n:</strong></label>
                                        </div>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <textarea name="description" id="description"><?php echo $xDes; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        	<label><strong>Palabras clave:</strong><br><span>(sep&aacute;relas con una coma)</span></label>
                                        </div>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        	<input name="keywords" id="keywords" type="text" value="<?php echo $xKey; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        	<label><strong>Url: *</strong><br><span>(ejem: www.susitio.com)</span></label>
                                        </div>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        	<?php if($xVisitante=="Si"){ ?><p><?php echo $xUrl; ?></p><?php } ?>
                                        	<input name="url" id="url" type="<?php if($xVisitante=="Si"){ ?>hidden<?php }else{ ?>text<?php } ?>" value="<?php echo $xUrl; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        	<label><strong>Im&aacute;genes para redes sociales:</strong><br><span>(470px x 246px)</span></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        	<?php if($xVisitante=="Si"){ ?><p><?php echo $xFace1; ?></p><?php } ?>
                                            <input name="face1" type="<?php if($xVisitante=="Si"){ ?>hidden<?php }else{ ?>text<?php } ?>" value="<?php echo $xFace1; ?>" />
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <?php if($xVisitante=="No"){ ?><button class="btn btn-red" type="button" name="boton4" onClick="javascript:Imagen('FIA');" /><i class="fa fa-save"></i> Examinar</button><?php } ?>
                                        </div>
                                   	</div>
                                    <div style="height:12px;"></div>
                                    <div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        	<?php if($xVisitante=="Si"){ ?><p><?php echo $xFace2; ?></p><?php } ?>
                                            <input name="face2" type="<?php if($xVisitante=="Si"){ ?>hidden<?php }else{ ?>text<?php } ?>" value="<?php echo $xFace2; ?>" />
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <?php if($xVisitante=="No"){ ?><button class="btn btn-red" type="button" name="boton4" onClick="javascript:Imagen('FIB');" /><i class="fa fa-save"></i> Examinar</button><?php } ?>
                                        </div>
                                    </div>
                                    <div style="height:12px;"></div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        	<label><strong>Favicon:</strong></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        	<?php if($xVisitante=="Si"){ ?><p><?php echo $xIco; ?></p><?php } ?>
                                            <input name="ico" type="<?php if($xVisitante=="Si"){ ?>hidden<?php }else{ ?>text<?php } ?>" value="<?php echo $xIco; ?>" />
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <?php if($xVisitante=="No"){ ?><button class="btn btn-red" type="button" name="boton4" onClick="javascript:Imagen('ICO');" /><i class="fa fa-save"></i> Examinar</button><?php } ?>
                                        </div>
                                    </div>
                                    <div style="height:20px;"></div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        	<div class="btn-group">
                                            	<a href="inicio.php" class="btn btn-pink"><i class="fa fa-times"></i> Cancelar</a>
                                                <button class="btn btn-green" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Editar Metatags</button>
                                                <input type="hidden" name="proceso">
	            			    				<input type="hidden" name="cod_meta" value="<?php echo $xCodigo; ?>">
											</div>
                                        </div>
                                    </div>
								</div>
    	                    </form>
                            <label><span>Los campos con ( <strong>*</strong> ) son obligatorios.</span></label>
						</div>
					</div> <!-- /widget -->
				</div> <!-- /fluid -->	
			</div> <!-- /wrp -->
		</div> <!-- /content -->
		<?php include("includes/footer.php") ?>
	</div> <!-- /wrapper -->
</body>
</html>