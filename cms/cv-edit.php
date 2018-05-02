<?php include("modulos/conexion.php"); ?>
<?php include("modulos/verificar.php"); ?>
<?php
$cod_contact    = $_REQUEST['cod_contact'];
if (isset($_REQUEST['proceso'])) {
    $proceso    = $_POST['proceso'];
} else {
    $proceso    = "";
}
if($proceso==""){
    $consultaContact = "SELECT * FROM contacto WHERE cod_contact='$cod_contact'";
    $ejecutarContact = mysqli_query($enlaces,$consultaContact) or die('Consulta fallida: ' . mysqli_error($enlaces));
    $filaCot = mysqli_fetch_array($ejecutarContact);
    $xCodigo        = $filaCot['cod_contact'];
    $xCv            = $filaCot['cv'];
}

if($proceso == "Actualizar"){
    $cod_contact    = $_POST['cod_contact'];
    $cv             = $_POST['cv'];

    $ActualizarContact = "UPDATE contacto SET cod_contact='$cod_contact', cv='$cv' WHERE cod_contact='$cod_contact'";
    $resultadoActualizar = mysqli_query($enlaces,$ActualizarContact);
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
			document.fcms.action = "cv-edit.php";
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
        <?php $menu = "inicio"; $page = "curriculum"; include("includes/header.php"); ?>
		<div id="content" class="clearfix">
			<div class="header">
				<h1 class="page-title">P&aacute;gina de Inicio</h1>
			</div>
			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Inicio <i class="fa fa-caret-right"></i> Logo & CV <i class="fa fa-caret-right"></i> Editar Hoja de vida
			</div>
			<div class="wrp clearfix">
            	<?php $page = "curriculum"; include("includes/menu-inicio.php"); ?>
                <div class="fluid">
					<div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-th"></i> <strong>Editar Hoja de vida</strong>
							</div>
						</div>
						<div class="widget-content">
                        	<div class="alert alert-info alert-dismissible" role="alert">
                            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Suba su hoja de vida en formato PDF.
							</div>
                        	<form class="fcms" name="fcms" method="post" action="">
                            	<div class="form-int">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label><strong>Hoja de vida:</strong><br><span>(Formato: pdf)</span></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <?php if($xVisitante=="Si"){ ?><p><?php echo $xCv; ?></p><?php } ?>
                                            <input name="cv" type="<?php if($xVisitante=="Si"){ ?>hidden<?php }else{ ?>text<?php } ?>" value="<?php echo $xCv; ?>" />
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <?php if($xVisitante=="No"){ ?><button class="btn btn-red" type="button" name="boton4" onClick="javascript:Imagen('CV');" /><i class="fa fa-save"></i> Examinar</button><?php } ?>
                                        </div>
                                    </div>
                                    <div style="height:20px;"></div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        	<div class="btn-group">
                                            	<a href="inicio.php" class="btn btn-pink"><i class="fa fa-times"></i> Cancelar</a>
                                                <button class="btn btn-green" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Editar Hoja de vida</button>
                                                <input type="hidden" name="proceso">
	            			    				<input type="hidden" name="cod_contact" value="<?php echo $xCodigo; ?>">
											</div>
                                        </div>
                                    </div>
								</div>
    	                    </form>
						</div>
					</div> <!-- /widget -->
				</div> <!-- /fluid -->	
			</div> <!-- /wrp -->
		</div> <!-- /content -->
		<?php include("includes/footer.php") ?>
	</div> <!-- /wrapper -->
</body>
</html>