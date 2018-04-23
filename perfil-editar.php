<?php include "cms/modulos/conexion.php"; ?>
<?php include "modulos/session-core.php"; ?>
<?php
$cod_cliente		= $_REQUEST['cod_cliente'];
if (isset($_REQUEST['proceso'])) {
	$proceso 	= $_POST['proceso'];
	$chk 		= $_POST['chk'];
} else {
	$proceso 	= "";
	$chk 		= "";
}
if($proceso == ""){
	$consultaClientes = "SELECT * FROM clientes WHERE cod_cliente='$cod_cliente'";
	$ejecutarClientes = mysqli_query($enlaces,$consultaClientes) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$filaCli = mysqli_fetch_array($ejecutarClientes);
	$cod_cliente		= $filaCli['cod_cliente'];
	$nombres 			= $filaCli['nombres'];
	$direccion			= $filaCli['direccion'];
	$telefono			= $filaCli['telefono'];
	$sexo				= $filaCli['sexo'];
}

if($proceso=="Actualizar"){	
	$cod_cliente		= $_POST['cod_cliente'];
	$direccion			= mysqli_real_escape_string($enlaces, $_POST['direccion']);
	$telefono			= mysqli_real_escape_string($enlaces, $_POST['telefono']);
	$empresa			= mysqli_real_escape_string($enlaces, $_POST['empresa']);
	$actualizarClientes	= "UPDATE clientes SET cod_cliente='$cod_cliente', direccion='$direccion', telefono='$telefono' WHERE cod_cliente='$cod_cliente'";
	$resultadoActualizar = mysqli_query($enlaces,$actualizarClientes) or die('Consulta fallida: ' . mysqli_error($enlaces));
	
	if($chk=="s") {	
		$consultaClientes = "SELECT * FROM clientes WHERE cod_cliente='$cod_cliente'";
		$ejecutarClientes = mysqli_query($enlaces,$consultaClientes) or die('Consulta fallida: ' . mysqli_error($enlaces));
		$filaCli = mysqli_fetch_array($ejecutarClientes);
		$cod_cliente		= $filaCli['cod_cliente'];
		$nombres 			= $filaCli['nombres'];
		$direccion			= htmlspecialchars($filaCli['direccion']);
		$telefono			= htmlspecialchars($filaCli['telefono']);
		$email 				= $filaCli['email'];
		$clave				= $filaCli['clave'];
		$sexo				= $filaCli['sexo'];
	
		$consultarCot = 'SELECT * FROM contacto';
		$resultadoCot = mysqli_query($enlaces,$consultarCot) or die('Consulta fallida: ' . mysqli_error($enlaces));
		while($filaCot = mysqli_fetch_array($resultadoCot)){
			$xDesemail = $filaCot['form_mail'];
		}

		$consultarMet = 'SELECT * FROM metatags';
		$resultadoMet = mysqli_query($enlaces,$consultarMet) or die('Consulta fallida: ' . mysqli_error($enlaces));
		$filaMet = mysqli_fetch_array($resultadoMet);
			$Nombre_web	= utf8_encode($filaMet['title']);
			$URL_web	= $filaMet['url'];

		$emailDestino = $email;
		$encabezado = "Perfil Actualizado - ".$Nombre_web;
		$mensaje .= "
			<p>Cambio de datos realizado, acceda en: <a href='".$URL_web."'>Enlace</a></p>		
			<h3>Nuevos Datos de Perfil</h3>
			<table width='100%' border=0 cellpadding=0 cellspacing=0 align=center>
				<tr>
					<td width='25%'><strong>Nombre : </strong></th>
					<td width='75%'>".$nombres."<br></th>
				</tr>
				<tr>
					<td><strong>Direcci&oacute;n : </strong></th>
					<td>".$direccion."<br></th>
				</tr>
				<tr>
					<td><strong>Tel&eacute;fono : </strong></th>
					<td>".$telefono."<br></th>
				</tr>
				<tr>
					<td><strong>Sexo : </strong></th>
					<td>".$sexo."<br></th>
				</tr>
			</table>
			<br>
			<h4>Informaci&oacute;n de la Cuenta</h4>
			<table width='100%' border=0 cellpadding=0 cellspacing=0 align=center>
				<tr>
					<td width='25%'><strong>Email : </strong></th>
					<td width='75%'>".$email."</th>
				</tr>
				<tr>
					<td><strong>Clave : </strong></th>
					<td>".$clave."</th>
				</tr>
			</table>
			<p>Cualquier duda contacte a soporte: ".$xDesemail."</p>";
		$mailcabecera = 'MIME-Version: 1.0'."\r\n";
		$mailcabecera.= 'Content-type:text/html; charset-iso-8859-1'."\r\n";
		$mailcabecera.= "Desde: ".$xDesemail;
		$mailcabecera.= "<".$xDesemail.">\r\n";
		$mailCabecera.= "Responder a: ".$xDesemail;
		$mensajeEmail = $mensaje;
		mail($emailDestino,$encabezado,$mensajeEmail,$mailcabecera);
	}
	header("Location:perfil.php");
}
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
	<?php include("includes/head.php"); ?>
	<script>
		function Validar(){
			if(document.perfil.direccion.value==""){
				alert("Debe escribir su dirección");
				document.perfil.direccion.focus();
				return;	
			}
			if(document.perfil.telefono.value==""){
				alert("Ingrese su telefono");
				document.perfil.telefono.focus();
				return;	
			}
			document.perfil.action = "perfil-editar.php";
			document.perfil.proceso.value="Actualizar";
			document.perfil.submit();
		}
	</script>
</head>
<body id="page-top">
<!-- Outer-wrap -->
<div class="outer-wrap">
	<div class="container">
		<?php $page = "articulos"; include("includes/menu.php"); ?>
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
			<!-- Page Header -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="page-header">
						<h3><span>Datos de Usuario</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><a href="perfil.php">Perfil</a></li>
							<li><strong>Editar</strong></li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Blog Post Content -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="m-blog-content">
						<div class="row">
							<div class="col-md-12">
								<h4 class="page-header">Datos de Usuario</h4>
								<form name="perfil" method="post" action="">
			                        <div class="row">
			                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			                            	<label><strong>Nombres: </strong></label>
										</div>
			                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
											<?php echo $nombres; ?>
										</div>
			                        </div>
			                        <div class="clearfix" style="height:10px;"></div>
			                        <div class="row">
			                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			                            	<label><strong>Direcci&oacute;n: *</strong></label>
										</div>
			                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			                            	<input class="form-control" type="text" name="direccion" value="<?php echo $direccion; ?>">
			                            </div>
			                        </div>
			                        <div class="clearfix" style="height:10px;"></div>
			                        <div class="row">
			                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			                            	<label><strong>Tel&eacute;fono: *</strong></label>
										</div>
			                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			                            	<input class="form-control" type="tel" name="telefono" value="<?php echo $telefono; ?>">
										</div>
			                        </div>
			                        <div class="clearfix" style="height:10px;"></div>
			                        <div class="row">
			                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><label><strong>Sexo: </strong></label></div>
			                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			                                <?php echo $sexo; ?>
			                            </div>
			                        </div>
			                        <div class="clearfix" style="height:10px;"></div>
			                        <div class="row">
			                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
			                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
											<input name="chk" type="checkbox" value="s"> <label>Enviar cambios al correo electr&oacute;nico</label>
			                            </div>
			                        </div>
			                        <div class="clearfix" style="height:10px;"></div>
			                        <div class="row">
			                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			                                <p class="linea">
			                                    <input type="button" value="Cambiar Datos" class="btn_green" onClick="javascript:Validar();">
			                                </p>
			                            </div>
			                            <input type="hidden" name="cod_cliente" value="<?php echo $cod_cliente; ?>">
			                            <input type="hidden" name="proceso">
			                        </div>
								</form>
								<hr>
								<p><a class="btn-more" href="perfil.php">&laquo; Volver al Perfil</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("includes/footer.php"); ?>
		</div>
		<!-- Right Main Content - END -->
	</div>
</div>
<!-- Outer-wrap - END -->

</body>
</html>