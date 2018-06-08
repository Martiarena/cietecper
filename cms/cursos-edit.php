<?php include "modulos/conexion.php"; ?>
<?php include "modulos/verificar.php"; ?>
<?php
$cod_curso = $_REQUEST['cod_curso'];
if (isset($_REQUEST['proceso'])){
	$proceso = $_POST['proceso'];
} else {
	$proceso = "";
}
$cod_curso = $_REQUEST['cod_curso'];
if($proceso == ""){
	$consultaCur="SELECT * FROM cursos WHERE cod_curso='$cod_curso'";
	$resultadoCur=mysqli_query($enlaces, $consultaCur);
	$filaCur = mysqli_fetch_array($resultadoCur);
	$cod_curso			= $filaCur['cod_curso'];
	$titulo				= htmlspecialchars($filaCur['titulo']);
	$descripcion		= htmlspecialchars($filaCur['descripcion']);
	$precio_normal		= substr($filaCur['precio_normal'],0,20);
	$imagen				= $filaCur['imagen'];
	$ficha_tecnica		= $filaCur['ficha_tecnica'];
	$orden				= $filaCur['orden'];
	$estado				= $filaCur['estado'];
}
if($proceso == "Actualizar"){
	$titulo				= mysqli_real_escape_string($enlaces,$_POST['titulo']);
	$descripcion		= mysqli_real_escape_string($enlaces,$_POST['descripcion']);
	$precio_normal		= substr($_POST['precio_normal'],0,20);
	$imagen				= $_POST['imagen'];
	$ficha_tecnica		= $_POST['ficha_tecnica'];
	$orden				= $_POST['orden'];
	$estado				= $_POST['estado'];
	
	//Validar si el registro existe
	$actualizarCursos = "UPDATE cursos SET
		cod_curso='$cod_curso', 
		titulo='$titulo', 
		descripcion='$descripcion', 
		precio_normal='$precio_normal', 
		imagen='$imagen', 
		ficha_tecnica='$ficha_tecnica', 
		orden='$orden', 
		estado='$estado' 
		WHERE cod_curso='$cod_curso'";
	
	$resultadoActualizar = mysqli_query($enlaces, $actualizarCursos);
	header ("Location: cursos.php");
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
			if(document.fcms.imagen.value==""){
				alert("Debe subir una imagen");
				document.fcms.imagen.focus();
				return;	
			}
			if(document.fcms.orden.value==""){
				alert("Debe asignar un orden");
				document.fcms.orden.focus();
				return;	
			}
			document.fcms.action = "cursos-edit.php";
			document.fcms.proceso.value="Actualizar";
			document.fcms.submit();
		}
		function Imagen(codigo){
			url = "agregar-foto.php?id=" + codigo;
			AbrirCentro(url,'Agregar', 475, 180, 'no', 'no');
		}
		function soloNumeros(e){
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
        <?php $menu = "tienda"; $page = "cursos";  include("includes/header.php") ?>
		<div id="content" class="clearfix">
	        <div class="header">
				<h1 class="page-title">Mi Tienda</h1>
			</div>
			<div class="breadcrumbs">
            	<i class="fa fa-home"></i> Mi Tienda<i class="fa fa-caret-right"></i> Cursos <i class="fa fa-caret-right"></i> Editar curso
			</div>
			<div class="wrp clearfix">
            	<?php $page = "cursos"; include("includes/menu-tienda.php"); ?>
                <div class="fluid">
					<div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-th"></i> <strong>Editar curso</strong>
							</div>
						</div>
						<div class="widget-content">
                            <form name="fcms" method="post" action="">
                            	<div class="form-int">
                                	<div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<label><strong>T&iacute;tulo del Curso: *</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        	<input name="titulo" type="text" value="<?php echo $titulo; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<label><strong>Descripci&oacute;n:</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        	<textarea name="descripcion" /><?php echo $descripcion ?></textarea>
                                            <script>
												CKEDITOR.replace('descripcion');
											</script>
                                        </div>
                                    </div>
                                    <div class="separador-20"></div>
                                    <div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<label><strong>Precio Normal:</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <input name="precio_normal" type="text" id="precio_normal" value="<?php echo number_format($precio_normal,2); ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<label><strong>Imagen *</strong><br><span>(-px x -px)</span>:</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        	<?php if($xVisitante=="Si"){ ?><p><?php echo $imagen; ?></p><?php } ?>
                                            <input name="imagen" id="imagen" type="<?php if($xVisitante=="Si"){ ?>hidden<?php }else{ ?>text<?php } ?>" value="<?php echo $imagen; ?>" />
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                        <?php if($xVisitante=="No"){ ?>
	                                        <button class="btn btn-red" type="button" name="boton2" onClick="javascript:Imagen('IP');" /><i class="fa fa-save"></i> Examinar</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="separador-20"></div>
									<div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<label><strong>Ficha T&eacute;cnica:</strong><br><span>(Formato .pdf)</span></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        	<?php if($xVisitante=="Si"){ ?><p><?php echo $ficha_tecnica; ?></p><?php } ?>
                                            <input name="ficha_tecnica" id="ficha_tecnica" type="<?php if($xVisitante=="Si"){ ?>hidden<?php }else{ ?>text<?php } ?>" value="<?php echo $ficha_tecnica; ?>" />
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        	<?php if($xVisitante=="No"){ ?>
	                                        <button class="btn btn-red" type="button" name="boton2" onClick="javascript:Imagen('FT');" /><i class="fa fa-save"></i> Examinar</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="separador-20"></div>
                					<div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        	<label><strong>Orden: *</strong></label>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-12">
                                        	<input name="orden" type="text" onKeyPress="return soloNumeros(event)" value="<?php echo $orden; ?>" />
                                        </div>
                                    </div>
                					<div class="row">
                                    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        	<label><strong>Estado:</strong></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="custom-input">
                                            	<input <?php if (!(strcmp($estado,"Activo"))) {echo "checked=\"checked\"";} ?> type="radio" name="estado" id="activo" value="Activo" checked="checked"><label for="Activo">Activo</label>
						                        <input <?php if (!(strcmp($estado,"Inactivo"))) {echo "checked=\"checked\"";} ?> type="radio" id="inactivo" name="estado" value="Inactivo"><label for="inactivo">Inactivo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separador-20"></div>
                					<div class="row">
                                    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="btn-group">
                                            	<a href="cursos.php" class="btn btn-pink"><i class="fa fa-times"></i> Cancelar</a>
                                                <button class="btn btn-green" type="button" name="boton" onClick="javascript:Validar();" /><i class="fa fa-refresh"></i> Editar Curso</button>
											</div>
					                        <input type="hidden" name="proceso">
                                            <input type="hidden" name="cod_curso" value="<?php echo $cod_curso; ?>">
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