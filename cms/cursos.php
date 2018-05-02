<?php include "modulos/conexion.php"; ?>
<?php include "modulos/verificar.php"; ?>
<?php include "modulos/clean.php"; ?>
<?php
$num = ""; 
if (isset($_REQUEST['eliminar'])) {
	$eliminar = $_POST['eliminar'];
} else {
	$eliminar = "";
}
if ($eliminar == "true") {
	$sqlEliminar = "SELECT cod_curso FROM cursos ORDER BY cod_curso";
	$sqlResultado = mysqli_query($enlaces, $sqlEliminar);
	$x = 0;
	while($filaElim = mysqli_fetch_array($sqlResultado)){
		$id_curso = $filaElim["cod_curso"];
		if ($_REQUEST["chk" . $id_curso] == "on") {
			$x++;
			if ($x == 1) {
					$sql = "DELETE FROM cursos WHERE cod_curso=$id_curso";
				} else { 
					$sql = $sql . " OR cod_curso=$id_curso";
				}
		}
	}
	mysqli_free_result($sqlResultado);
	if ($x > 0) { 
		$rs = mysqli_query($enlaces, $sql);
	}
	header ("Location: cursos.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/head.php") ?>
    <style>
		@media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px)  {
			td:nth-of-type(1):before { content: "Curso"; }
			td:nth-of-type(2):before { content: "Imagen"; }
			td:nth-of-type(3):before { content: "Adjunto"; }
			td:nth-of-type(4):before { content: ""; }
			td:nth-of-type(5):before { content: ""; }
			td:nth-of-type(6):before { content: ""; }
		}
	</style>
    <script>
	function Procedimiento(proceso,seccion){
		document.fcms.proceso.value = "";
		estado = 0;
		for (i = 0; i < document.fcms.length; i++)
				
		if(document.fcms.elements[i].name.substring(0,3) == "chk"){
			if(document.fcms.elements[i].checked == true){
				estado = 1
			}
		}
		if (estado == 0) {
			if (seccion == "N"){
				alert("Debes de seleccionar un categoria.")
			}
			return
		}
		procedimiento = "document.fcms." + proceso + ".value = true"
		eval(procedimiento)
		document.fcms.submit()	
	}
	</script>
    <script src="js/visitante-alert.js"></script>
	<style>
		@import "media/css/demo_page.css";
		@import "media/css/demo_table.css";
		@import "media/css/TableTools.css";
	</style>
	
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
        <?php $menu = "tienda"; $page = "cursos"; include("includes/header.php") ?>

		<div id="content" class="clearfix">
	        <div class="header">
				<h1 class="page-title">Su Tienda</h1>
			</div>
			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Su Tienda<i class="fa fa-caret-right"></i> Cursos
			</div>
			<div class="wrp clearfix">
            	<?php $page = "cursos"; include("includes/menu-tienda.php"); ?>
                <div class="fluid">
					<div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
                            	<i class="fa fa-th"></i> <strong>Lista de Cursos</strong>
							</div>
						</div>
						<div class="widget-content">
							<a class="btn btn-blue" href="<?php if($xVisitante=="No"){ ?>curso-nuevo.php<?php }else{ ?>javascript:visitante();<?php } ?>"><i class="fa fa-plus" aria-hidden="true"></i> A&ntilde;adir nuevo</a>
                            <hr>
							<form name="fcms" method="post" action="">
                                <table class="text-center" width="100%" border="1" id="productos">
                                	<thead>
                                    	<tr>
                                        	<th width="5%" scope="col">Nº</th>
											<th width="30%" scope="col">Curso</th>
                                            <th width="40%" scope="col">Imagen
												<input type="hidden" name="proceso">
												<input type="hidden" name="eliminar" value="false">
											</th>
                                            <th width="10%" scope="col">Adjuntos</th>
											<th width="5%" scope="col">&nbsp;</th>
											<th width="5%" scope="col">&nbsp;</th>
											<th width="5%" scope="col"><a href="javascript:Procedimiento('eliminar','N');"><img src="images/borrar.png" width="18" height="25" alt="Borrar"></a></th>
										</tr>
									</thead>
                                    <?php
				                        $consultarCur = "SELECT * FROM cursos ORDER BY orden ASC";
			    	                    $resultadoCur = mysqli_query($enlaces, $consultarCur);
			        	                while($filaCur = mysqli_fetch_array($resultadoCur)){
			            	                $xCodigo		= $filaCur['cod_curso'];
			                        	    $xTitulo		= $filaCur['titulo'];
			                            	$xImagen		= $filaCur['imagen'];
											$xFicha			= $filaCur['ficha_tecnica'];
											$num++;
				                    ?>
                                    <tr>
				                        <td><?php echo $num; ?></td>
				                        <td><?php echo $xTitulo; ?></td>
				                        <td><img class="banner-int" src="images/productos/<?php echo $xImagen; ?>" /></td>
				                        <td><strong><?php if($xFicha!=""){echo "<i class='fa fa-file-pdf-o'></i> ";} ?></strong></td>
				                        <td><a class="boton-eliminar <?php if($xVisitante=="Si"){ ?>boton-eliminar-bloqueado<?php } ?>" href="<?php if($xVisitante=="No"){ ?>cursos-delete.php?cod_curso=<?php echo $xCodigo; ?><?php }else{ ?>javascript:visitante();<?php } ?>"><i class="fa fa-trash"></i></a></td>
                				        <td><a class="boton-editar" href="cursos-edit.php?cod_curso=<?php echo $xCodigo; ?>"><i class="fa fa-pencil-square"></i></a></td>
				                        <td>
	                                        <?php if($xVisitante=="No"){ ?>
	                                        <div class="custom-input">
                                                <input class="hidden-xs" type="checkbox" id="chkbx-<?php echo $xCodigo; ?>" name="chk<?php echo $xCodigo; ?>" /><label for="chkbx-<?php echo $xCodigo; ?>"></label>
											</div>
                                            <?php } ?>
                                        </td>
                				    </tr>
				                    <?php
										}
										mysqli_free_result($resultadoCur);
									?>
                                </table>
                            </form>
						</div>
                    </div>
				</div>
			</div>
		</div>
		<?php include("includes/footer.php") ?>
        <script src="media/js/jquery.dataTables.js"></script>
        <script src="media/ZeroClipboard/ZeroClipboard.js"></script>
        <script src="media/js/TableTools.js"></script>
        <script>
            $(document).ready(function(){
                $("#productos").dataTable({
                    "sDom": 'T<"nada">lftrip',
                    "sPaginationType": "full_numbers"
                });
            });
        </script>
	</div>
</body>
</html>