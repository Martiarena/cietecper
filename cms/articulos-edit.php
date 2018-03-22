<?php include "modulos/conexion.php"; ?>
<?php include "modulos/verificar.php"; ?>
<?php
$cod_articulo		= $_REQUEST['cod_articulo'];
if (isset($_REQUEST['proceso'])) {
	$proceso 	= $_POST['proceso'];
} else {
	$proceso 	= "";
}
if($proceso == ""){
	$consultaarticulos = "SELECT * FROM articulos WHERE cod_articulo='$cod_articulo'";
	$ejecutararticulos = mysqli_query($enlaces,$consultaarticulos) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$filaArt = mysqli_fetch_array($ejecutararticulos);
	$cod_articulo	= $filaArt['cod_articulo'];
	$imagen 		= $filaArt['imagen'];
	$titulo			= htmlspecialchars($filaArt['titulo']);
	$categoria		= htmlspecialchars($filaArt['categoria']);
	$descripcion	= htmlspecialchars($filaArt['descripcion']);
	$autor			= htmlspecialchars($filaArt['autor']);
	$estado 		= $filaArt['estado'];
}
if($proceso=="Actualizar"){	
	$cod_articulo			= $_POST['cod_articulo'];
	$imagen					= $_POST['imagen'];
	$titulo					= mysqli_real_escape_string($enlaces, $_POST['titulo']);
	$categoria				= mysqli_real_escape_string($enlaces, $_POST['categoria']);
	$descripcion			= mysqli_real_escape_string($enlaces, $_POST['descripcion']);
	$autor					= mysqli_real_escape_string($enlaces, $_POST['autor']);
	$estado					= $_POST['estado'];
	$actualizararticulos	= "UPDATE articulos SET cod_articulo='$cod_articulo', imagen='$imagen', titulo='$titulo', categoria='$categoria', descripcion='$descripcion', autor='$autor', estado='$estado' WHERE cod_articulo='$cod_articulo'";
	$resultadoActualizar 	= mysqli_query($enlaces,$actualizararticulos) or die('Consulta fallida: ' . mysqli_error($enlaces));
	header("Location:articulos.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/head.php") ?>
    <script type="text/javascript" src="js/rutinas.js"></script>
    <script src="js-editor/ckeditor.js" type="text/javascript"></script>
	<script>
		function Validar(){
			if(document.fcms.titulo.value==""){
				alert("Debe escribir un título");
				document.fcms.titulo.focus();
				return;	
			}
			if(document.fcms.autor.value==""){
				alert("Debe escribir un autor");
				document.fcms.autor.focus();
				return;	
			}
			document.fcms.action = "articulos-edit.php";
			document.fcms.proceso.value="Actualizar";
			document.fcms.submit();
		}	
		function Imagen(codigo){
			url = "agregar-foto.php?id=" + codigo;
			AbrirCentro(url,'Agregar', 475, 180, 'no', 'no');
		}
		function soloNumeros(e) 
		{ 
			var key = window.Event ? e.which : e.keyCode 
			return ((key >= 48 && key <= 57) || (key==8)) 
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
        <?php $menu = "articulos"; include("includes/header.php") ?>
		<div id="content" class="clearfix">
	        <div class="header">
				<h1 class="page-title">Art&iacute;culos</h1>
			</div> <!-- /header -->
			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Art&iacute;culos <i class="fa fa-caret-right"></i> Editar art&iacute;culo
			</div>
			<div class="wrp clearfix">
                <div class="fluid">
					<div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-th"></i> <strong>Editar art&iacute;culo</strong>
							</div>
						</div> <!-- /widget-header -->
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
	                                        <label><strong>Categor&iacute;a:</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        	<input name="categoria" type="text" id="categoria" value="<?php echo $categoria; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label><strong>Imagen:</strong><br><span>(780px x 420px)</span></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        	<?php if($xVisitante=="Si"){ ?><p><?php echo $imagen; ?></p><?php } ?>
                                            <input name="imagen" type="<?php if($xVisitante=="Si"){ ?>hidden<?php }else{ ?>text<?php } ?>" id="imagen" size="30" value="<?php echo $imagen; ?>" />
                                        </div>
										<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        	<?php if($xVisitante=="No"){ ?>
                                        	<button class="btn btn-red" type="button" name="boton2" onClick="javascript:Imagen('NOT');" /><i class="fa fa-save"></i> Examinar</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="separador-20"></div>
                                    <div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                        <label><strong>Texto:</strong></label>
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
                                        	<label><strong>Estado:</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        	<div class="custom-input">
												<input <?php if (!(strcmp($estado,"Activo"))) {echo "checked=\"checked\"";} ?> type="radio" name="estado" id="activo" value="Activo" checked="checked"><label for="activo">Activo</label>
												<input <?php if (!(strcmp($estado,"Inactivo"))) {echo "checked=\"checked\"";} ?> type="radio" name="estado" id="inactivo" value="Inactivo"><label for="inactivo">Inactivo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separador-20"></div>
                                    <div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                        <label><strong>Autor: *</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        	<input name="autor" type="text" id="autor" value="<?php echo $autor; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        	<div class="btn-group">
                                            	<a href="articulos.php" class="btn btn-pink"><i class="fa fa-times"></i> Cancelar</a>
                                                <button class="btn btn-green" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Editar articulo</button>
											</div>
							                <input type="hidden" name="proceso">
							                <input type="hidden" name="cod_articulo" value="<?php echo $cod_articulo; ?>">
                                        </div>
                                    </div>
								</div>
							</form>
                            <label><span>Los campos con ( <strong>*</strong> ) son obligatorios.</span></label>
						</div>
                    </div>
				</div>
			</div> <!-- /wrp -->
		</div> <!-- /content -->
		<?php include("includes/footer.php") ?>
	</div> <!-- /wrapper -->
</body>
</html>