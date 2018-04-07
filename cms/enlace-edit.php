<?php include "modulos/conexion.php"; ?>
<?php include "modulos/verificar.php"; ?>
<?php
$cod_enlace	= $_REQUEST['cod_enlace'];
if (isset($_REQUEST['proceso'])) {
	$proceso 	= $_POST['proceso'];
} else {
	$proceso 	= "";
}
if($proceso == ""){
	$consultaEnlaces = "SELECT * FROM enlaces WHERE cod_enlace='$cod_enlace'";
	$ejecutarEnlaces = mysqli_query($enlaces,$consultaEnlaces) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$filaEnl = mysqli_fetch_array($ejecutarEnlaces);
	$cod_enlace			= $filaEnl['cod_enlace'];
	$titulo 			= htmlspecialchars($filaEnl['titulo']);
	$descripcion		= htmlspecialchars($filaEnl['descripcion']);
	$enlace				= htmlspecialchars($filaEnl['enlace']);
	$orden	 			= $filaEnl['orden'];
	$estado 			= $filaEnl['estado'];
}
if($proceso=="Actualizar"){	
	$cod_enlace				= $_POST['cod_enlace'];
	$titulo					= mysqli_real_escape_string($enlaces, $_POST['titulo']);
	$descripcion 			= mysqli_real_escape_string($enlaces, $_POST['descripcion']);
	$enlace 				= mysqli_real_escape_string($enlaces, $_POST['enlace']);
	if(isset($_POST['orden'])){
		$orden			= $_POST['orden'];
	}else{
		$orden			= '0';
	}
	$estado					= $_POST['estado'];
	$actualizarEnlaces	= "UPDATE enlaces SET cod_enlace='$cod_enlace', titulo='$titulo', descripcion='$descripcion', enlace='$enlace', orden='$orden', estado='$estado' WHERE cod_enlace='$cod_enlace'";
	$resultadoActualizar = mysqli_query($enlaces,$actualizarEnlaces) or die('Consulta fallida: ' . mysqli_error($enlaces));
	
	header("Location:enlaces.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/head.php") ?>
	<script>
		function Validar(){
			if(document.fcms.titulo.value==""){
				alert("Debe escribir un título");
				document.fcms.titulo.focus();
				return;
			}
			if(document.fcms.enlace.value==""){
				alert("Debe escribir un enlace");
				document.fcms.enlace.focus();
				return;
			}
			document.fcms.action = "enlace-edit.php";
			document.fcms.proceso.value="Actualizar";
			document.fcms.submit();
		}
		function soloNumeros(e) 
		{ 
			var key = window.Event ? e.which : e.keyCode 
			return ((key >= 48 && key <= 57) || (key==8)) 
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
        <?php $menu = "contacto"; $page = "enlaces"; include("includes/header.php") ?>
		<div id="content" class="clearfix">
	        <div class="header">
				<h1 class="page-title">Datos de Contacto</h1>
			</div>
			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Inicio <i class="fa fa-caret-right"></i> Enlaces <i class="fa fa-caret-right"></i> Editar enlaces
			</div>
			<div class="wrp clearfix">
            	<?php $page="enlaces"; include("includes/menu-contacto.php"); ?>
                <div class="fluid">
					<div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-th"></i> <strong>Editar generalidades</strong>
							</div>
						</div>
						<div class="widget-content">
                            <form class="fcms" name="fcms" method="post" action="">
								<div class="form-int">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        	<label><strong>T&iacute;tulo: *</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        	<input name="titulo" type="text" id="titulo" value="<?php echo $titulo; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label><strong>Descripci&oacute;n:</strong></label>
                                        </div>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label><strong>Enlace: *<br><span>(ejemplo: www.enlace.com)</span></strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <input name="enlace" type="text" id="enlace" value="<?php echo $enlace; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        	<label><strong>Orden:</strong></label>
										</div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                         	<input name="orden" type="text" id="orden" value="<?php echo $orden; ?>" onKeyPress="return soloNumeros(event)" /></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        	<label><strong>Estado:</strong></label>
                                        </div>
                                    	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        	<div class="custom-input">
                                            	<input <?php if (!(strcmp($estado,"Activo"))) {echo "checked=\"checked\"";} ?> type="radio" name="estado" value="Activo" id="activo" checked="checked"><label for="activo">Activo</label>
                                                <input <?php if (!(strcmp($estado,"Inactivo"))) {echo "checked=\"checked\"";} ?> type="radio" name="estado" value="Inactivo" id="inactivo"><label for="inactivo">Inactivo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separador-20"></div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        	<div class="btn-group">
                                            	<a href="enlaces.php" class="btn btn-pink"><i class="fa fa-times"></i> Cancelar</a>
                                                <button class="btn btn-green" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Editar Enlace</button>
											</div>
							                <input type="hidden" name="proceso">
                                            <input type="hidden" name="cod_enlace" value="<?php echo $cod_enlace; ?>">
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
	</div>
	<?php include("includes/footer.php") ?>
</body>
</html>