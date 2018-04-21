<?php
if (isset($_REQUEST['proceso'])) {
  $proceso  = $_POST['proceso'];
} else {
  $proceso = "";
}
$resultado = 1;
if($proceso=="Registrar"){
  $nombres      = $_POST['nombres'];
  $direccion    = $_POST['direccion'];
  $telefono     = $_POST['telefono'];
  $email        = $_POST['email'];
  $clave        = $_POST['password'];
  $mascota      = $_POST['sexo'];
  $estado       = $_POST['estado'];

  /*-- Validar cliente para que no se repita ---*/
  $verificar = "SELECT * FROM clientes WHERE email='$email'";
  $ejecutar = mysqli_query($enlaces, $verificar);
  $numcli = mysqli_num_rows($ejecutar);
  if($numcli==0){
    /*---- Mensaje para el correo electronico ----*/
    $emailDestino = $email;
    $encabezado = "Bienvenido - Tienda Virtual";
    $encabezada = "Nuevo Usuario Registrado";
    $mensaje = "
      <p>Acceda en: <a href='http://cietecper.com' target='_target'>Enlace</a></p>

      <h3>Informaci&oacute;n de la Cuenta</h3>
      <table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'>
    	<tr>
          <td width='25%'><strong>Email : </strong></th>
          <td width='75%'>".$email."</th>
        </tr>
        <tr>
          <td><strong>Clave : </strong></th>
          <td>".$clave."</th>
        </tr>
      </table>
      <br>
      <h3>Datos de Perfil</h3>
      <table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'>
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
      </table>";
      
      /*----- Codigo enviar pedidos al correo ---*/

    $consultarCot = 'SELECT * FROM contacto';
    $resultadoCot = mysqli_query($enlaces,$consultarCot) or die('Consulta fallida: ' . mysqli_error($enlaces));
    while($filaCot = mysqli_fetch_array($resultadoCot)){
      $xFormemail   = $filaCot['form_mail'];
    }
    $destino = $xFormemail;
    $mailCabecera = 'MIME-Version: 1.0'."\r\n";
    $mailCabecera.= 'Content-type:text/html; charset-iso-8859-1'."\r\n";
    $mailCabecera.= "FROM: ".$xFormemail;
    $mailCabecera.= "<".$xFormemail.">\r\n";
    $mailCabecera.= "Reply-To: ".$xFormemail;
    $mensajeEmail = $mensaje;
    mail($emailDestino,$encabezado,$mensajeEmail,$mailCabecera);
    
    mail($destino,$encabezada,$mensajeEmail,$mailCabecera);
    
    $insertar="INSERT INTO clientes(nombres, direccion, telefono, email, clave, sexo, estado) VALUE('$nombres', '$direccion', '$telefono', '$email', '$clave', '$sexo', '$estado')";
    $resultado = mysqli_query($enlaces, $insertar);
    $resultado = 0;
  }else{
    $advertencia = "¡ Cliente registrado ya existe !";
  }
}
?>