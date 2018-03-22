<?php include "modulos/conexion.php"; ?>
<?php include "modulos/verificar.php"; ?>
<?php 
$cod_generalidad = $_REQUEST['cod_generalidad'];
$eliminar = "DELETE FROM generalidades WHERE cod_generalidad='$cod_generalidad'";
$resultado = mysqli_query($enlaces,$eliminar);
header("Location:generalidades.php");
?>