<?php 
$enlaces = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($enlaces));
mysqli_select_db($enlaces,'cietecper') or die('No se pudo seleccionar la base de datos'); 

/*$enlaces = mysqli_connect('localhost', 'cietecpe_pedro', 'gY}[Y2viu8v_') or die('No se pudo conectar: ' . mysqli_error($enlaces));
mysqli_select_db($enlaces,'cietecpe_pedro') or die('No se pudo seleccionar la base de datos'); */
?>