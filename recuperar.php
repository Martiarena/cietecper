<?php include "cms/modulos/conexion.php"; ?>
<?php
	$toEmail = $_POST["email"];
	$subject = "Solicitud de Password (Datos de usuario)";

	$consultaClientes = "SELECT * FROM clientes WHERE email='$toEmail'";
	$ejecutarClientes = mysqli_query($enlaces,$consultaClientes) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$filaCli = mysqli_fetch_array($ejecutarClientes);
		$nombres 			= $filaCli['nombres'];
		$direccion			= $filaCli['direccion'];
		$telefono			= $filaCli['telefono'];
		$email 				= $filaCli['email'];
		$clave				= $filaCli['clave'];
		$sexo				= $filaCli['sexo'];

	$consultarCot = 'SELECT * FROM contacto';
	$resultadoCot = mysqli_query($enlaces,$consultarCot) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$filaCot = mysqli_fetch_array($resultadoCot);
		$xDesemail = $filaCot['form_mail'];

	$consultarMet = 'SELECT * FROM metatags';
	$resultadoMet = mysqli_query($enlaces,$consultarMet) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$filaMet = mysqli_fetch_array($resultadoMet);
		$Nombre_web	= utf8_encode($filaMet['title']);
		$URL_web	= $filaMet['url'];

	$mailHeaders = "From: ".$Nombre_web."<". $xDesemail .">\r\n";

	$mensaje = "
			<p>Solicitud de password y datos, acceda en: <a href='".$URL_web."'>".$Nombre_web."</a></p>		
			<h3>Datos de Perfil</h3>
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
					<td><strong>".$clave."</strong></th>
				</tr>
			</table>
			<p>Cualquier duda contacte a soporte: ".$xDesemail."</p>";

	if(mail($toEmail, $subject, $mensaje, $mailHeaders)) {
		print "<div class='alert alert-success' role='alert'>Email Enviado Exitosamente.</div>";
	} else {
		print "<div class='alert alert-danger' role='alert'>Problema al enviar el correo, intentelo m&aacute;s tarde.</div>";
	}
?>