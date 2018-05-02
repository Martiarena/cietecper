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
	$xTitulo 	= htmlspecialchars(utf8_encode($filaMet['title']));
	$xEslogan 	= htmlspecialchars(utf8_encode($filaMet['slogan']));
	$xLogo		= $filaMet['logo'];
}

if($proceso == "Actualizar"){
	$cod_meta		= $_POST['cod_meta'];
	$title			= mysqli_real_escape_string($enlaces, utf8_decode($_POST['title']));
	$slogan			= mysqli_real_escape_string($enlaces, utf8_decode($_POST['slogan']));
	$logo			= $_POST['logo'];
	
	$ActualizarMeta = "UPDATE metatags SET cod_meta='$cod_meta', title='$title', slogan='$slogan', logo='$logo' WHERE cod_meta='$cod_meta'";
	$resultadoActualizar = mysqli_query($enlaces,$ActualizarMeta) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$mensaje = "<div class='alert alert-danger' role='alert'>
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		<p><strong>Nota:</strong> Logo actualizado con &eacute;xito.</p>
	</div>";
	header("Location:inicio.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/head.php"); ?>
    <script type="text/javascript" src="js/rutinas.js"></script>
    <script>
		function Validar(){
			if(document.fcms.title.value==""){
				alert("Debes ingresar un título para la web");
				document.fcms.title.focus();
				return;	
			}
			if(document.fcms.logo.value==""){
				alert("Debes subir un logotipo");
				document.fcms.logo.focus();
				return;	
			}
			document.fcms.action = "logo-edit.php";
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
        <?php include("includes/header.php"); ?>
		<div id="content" class="clearfix">
			<div class="header">
				<h1 class="page-title">P&aacute;gina de Inicio</h1>
			</div>
			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Inicio <i class="fa fa-caret-right"></i> Logo & CV <i class="fa fa-caret-right"></i> Editar Logotipo
			</div>
			<div class="wrp clearfix">
            	<?php $page = "curriculum"; include("includes/menu-inicio.php"); ?>
                <div class="fluid">
					<div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-th"></i> <strong>Editar Logotipo</strong>
							</div>
						</div>
						<div class="widget-content">
                        	<div class="alert alert-info alert-dismissible" role="alert">
                            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Aqu&iacute; se edita el logotipo de la web, que tambi&eacute;n es el nombre con el cual se posicionar&aacute; en la web.
							</div>
                        	<form class="fcms" name="fcms" method="post" action="">
                            	<div class="form-int">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label><strong>Logotipo:</strong><br><span>(90px x 99px)</span></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <?php if($xVisitante=="Si"){ ?><p><?php echo $xLogo; ?></p><?php } ?>
                                            <input name="logo" type="<?php if($xVisitante=="Si"){ ?>hidden<?php }else{ ?>text<?php } ?>" value="<?php echo $xLogo; ?>" />
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <?php if($xVisitante=="No"){ ?><button class="btn btn-red" type="button" name="boton4" onClick="javascript:Imagen('LOGO');" /><i class="fa fa-save"></i> Examinar</button><?php } ?>
                                        </div>
                                    </div>
                                    <div style="height:15px;"></div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label><strong>T&iacute;tulo de la web: *</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="title" value="<?php echo $xTitulo; ?>" />
                                        </div>
                                   	</div>
                                   	<div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label><strong>Eslogan de la web:</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="slogan" value="<?php echo $xEslogan; ?>" />
                                        </div>
                                   	</div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        	<div class="btn-group">
                                            	<a href="inicio.php" class="btn btn-pink"><i class="fa fa-times"></i> Cancelar</a>
                                                <button class="btn btn-green" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Editar Logotipo</button>
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