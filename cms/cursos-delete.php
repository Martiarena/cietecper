<?php include "modulos/conexion.php"; ?>
<?php include "modulos/verificar.php"; ?>
<?php 
$cod_curso = $_REQUEST['cod_curso'];
$eliminar = "DELETE FROM cursos WHERE cod_curso='$cod_curso'";
$resultado = mysqli_query($enlaces,$eliminar);
header("Location:cursos.php");
?>