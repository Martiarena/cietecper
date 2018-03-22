<?php include "modulos/conexion.php"; ?>
<?php include "modulos/verificar.php"; ?>
<?php
$cod_generalidad	= $_REQUEST['cod_generalidad'];
if (isset($_REQUEST['proceso'])) {
	$proceso 	= $_POST['proceso'];
} else {
	$proceso 	= "";
}
if($proceso == ""){
	$consultageneralidades = "SELECT * FROM generalidades WHERE cod_generalidad='$cod_generalidad'";
	$ejecutargeneralidades = mysqli_query($enlaces,$consultageneralidades) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$filaGen = mysqli_fetch_array($ejecutargeneralidades);
	$cod_generalidad	= $filaGen['cod_generalidad'];
	$titulo 			= htmlspecialchars($filaGen['titulo']);
	$descripcion		= htmlspecialchars($filaGen['descripcion']);
	$orden	 			= $filaGen['orden'];
	$estado 			= $filaGen['estado'];
}
if($proceso=="Actualizar"){	
	$cod_generalidad		= $_POST['cod_generalidad'];
	$titulo					= mysqli_real_escape_string($enlaces, $_POST['titulo']);
	$descripcion 			= mysqli_real_escape_string($enlaces, $_POST['descripcion']);
	if(isset($_POST['orden'])){
		$orden			= $_POST['orden'];
	}else{
		$orden			= '0';
	}
	$estado					= $_POST['estado'];
	$actualizargeneralidades	= "UPDATE generalidades SET cod_generalidad='$cod_generalidad', titulo='$titulo', descripcion='$descripcion', orden='$orden', estado='$estado' WHERE cod_generalidad='$cod_generalidad'";
	$resultadoActualizar = mysqli_query($enlaces,$actualizargeneralidades) or die('Consulta fallida: ' . mysqli_error($enlaces));
	
	header("Location:generalidades.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/head.php") ?>
    <script src="js-editor/ckeditor.js" type="text/javascript"></script>
	<script>
		function Validar(){
			if(document.fcms.titulo.value==""){
				alert("Debe escribir un título");
				document.fcms.titulo.focus();
				return;
			}
			document.fcms.action = "generalidades-edit.php";
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
        <?php $menu = "inicio"; $page = "generalidades"; include("includes/header.php") ?>
		<div id="content" class="clearfix">
	        <div class="header">
				<h1 class="page-title">Página de Inicio</h1>
			</div>
			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Inicio <i class="fa fa-caret-right"></i> Generalidades <i class="fa fa-caret-right"></i> Editar generalidades
			</div>
			<div class="wrp clearfix">
            	<?php $page="generalidades"; include("includes/menu-inicio.php"); ?>
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
                                            <script>
												CKEDITOR.replace('descripcion');
											</script>
                                        </div>
                                    </div>
                                    <div class="separador-20"></div>
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
                                            	<a href="generalidades.php" class="btn btn-pink"><i class="fa fa-times"></i> Cancelar</a>
                                                <button class="btn btn-green" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Editar generalidad</button>
											</div>
							                <input type="hidden" name="proceso">
                                            <input type="hidden" name="cod_generalidad" value="<?php echo $cod_generalidad; ?>">
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