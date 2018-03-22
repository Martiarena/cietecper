<?php include "modulos/conexion.php"; ?>
<?php include "modulos/verificar.php"; ?>
<?php 
$cod_articulo = $_REQUEST['cod_articulo'];
$eliminar = "DELETE FROM articulos WHERE cod_articulo='$cod_articulo'";
$resultado = mysqli_query($enlaces,$eliminar);
header("Location:articulos.php");
?>