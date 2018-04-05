<?php include "modulos/conexion.php"; ?>
<?php include "modulos/verificar.php"; ?>
<?php 
$cod_enlace = $_REQUEST['cod_enlace'];
$eliminar = "DELETE FROM enlaces WHERE cod_enlace='$cod_enlace'";
$resultado = mysqli_query($enlaces,$eliminar);
header("Location:enlaces.php");
?>