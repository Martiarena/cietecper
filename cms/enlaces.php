<?php include "modulos/conexion.php"; ?>
<?php include "modulos/verificar.php"; ?>
<?php include "modulos/clean.php"; ?>
<?php
if (isset($_REQUEST['eliminar'])) {
$eliminar = $_POST['eliminar'];
} else {
$eliminar = "";
}
if ($eliminar == "true") {
	$sqlEliminar = "SELECT cod_enlace FROM enlaces ORDER BY orden";
	$sqlResultado = mysqli_query($enlaces,$sqlEliminar);
	$x = 0;
	while($filaElim = mysqli_fetch_array($sqlResultado)){
		$id_enlace = $filaElim["cod_enlace"];
		if ($_REQUEST["chk" . $id_enlace] == "on") {
			$x++;
			if ($x == 1) {
					$sql = "DELETE FROM enlaces WHERE cod_enlace=$id_enlace";
				} else { 
					$sql = $sql . " OR cod_enlace=$id_enlace";
				}
		}
	}
	mysqli_free_result($sqlResultado);
	if ($x > 0) { 
		$rs = mysqli_query($enlaces,$sql);
	}
	header ("Location:enlaces.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/head.php") ?>
    <style>
		@media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px)  {
			td:nth-of-type(1):before { content: "Titulo"; }
			td:nth-of-type(2):before { content: "Orden"; }
			td:nth-of-type(3):before { content: "Estado"; }
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
				alert("Debes de seleccionar una Imagen.")
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
        <?php $menu = "contacto"; $page = "enlaces"; include("includes/header.php") ?>
		<div id="content" class="clearfix">
	        <div class="header">
				<h1 class="page-title">Datos de Contacto</h1>
			</div>
			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Contacto <i class="fa fa-caret-right"></i> Enlaces de Inter&eacute;s
			</div>
			<div class="wrp clearfix">
            	<?php $page="enlaces"; include("includes/menu-contacto.php"); ?>
                <div class="fluid">
					<div class="widget grid12">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-th"></i> <strong>Lista de enlaces</strong>
							</div>
						</div>
						<div class="widget-content">
                            <a class="btn btn-blue" href="<?php if($xVisitante=="No"){ ?>enlace-nuevo.php<?php }else{ ?>javascript:visitante();<?php } ?>"><i class="fa fa-plus" aria-hidden="true"></i> A&ntilde;adir nuevo</a>
                            <hr>
							<form name="fcms" method="post" action="">
                                <table class="text-center" width="100%" border="1" id="enlaces">
	                                <thead>
                                        <tr>
                                            <th width="65%" scope="col">T&iacute;tulo
                                                <input type="hidden" name="proceso">
                                                <input type="hidden" name="eliminar" value="false">
                                            </th>
                                            <th width="10%" scope="col">Orden</th>
                                            <th width="10%" scope="col">Estado</th>
                                            <th width="5%" scope="col">&nbsp;</th>
                                            <th width="5%" scope="col">&nbsp;</th>
                                            <th width="5%" scope="col"><a href="javascript:Procedimiento('eliminar','N');"><img src="images/borrar.png" width="18" height="25" alt="Borrar"></a></th>
                                        </tr>
                                    </thead>
                                    <?php
			                        $consultarEnlaces = "SELECT * FROM enlaces ORDER BY orden";
			                        $resultadoEnlaces = mysqli_query($enlaces,$consultarEnlaces) or die('Consulta fallida: ' . mysqli_error($enlaces));
			                        while($filaEnl = mysqli_fetch_array($resultadoEnlaces)){
			                            $xCodigo		= $filaEnl['cod_enlace'];
			                            $xTitulo		= $filaEnl['titulo'];
			                            $xOrden			= $filaEnl['orden'];
			                            $xEstado		= $filaEnl['estado'];
				                    ?>
                                    <tr>
                                        <td><?php echo $xTitulo; ?></td>
                                        <td><?php echo $xOrden; ?></td>
                                        <td><strong>[<?php echo $xEstado; ?>]</strong></td>
                                        <td>
                                        <a class="boton-eliminar <?php if($xVisitante=="Si"){ ?>boton-eliminar-bloqueado<?php } ?>" href="<?php if($xVisitante=="No"){ ?>enlace-delete.php?cod_enlace=<?php echo $xCodigo; ?><?php }else{ ?>javascript:visitante();<?php } ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        <td><a class="boton-editar" href="enlace-edit.php?cod_enlace=<?php echo $xCodigo; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a><td>
                                        <?php if($xVisitante=="No"){ ?>
                                        	<div class="custom-input">
		                                        <input type="checkbox" class="hidden-xs" id="chkbx-<?php echo $xCodigo; ?>" name="chk<?php echo $xCodigo; ?>" /><label for="chkbx-<?php echo $xCodigo; ?>"></label>
                                            </div>
                                        <?php } ?>
										</td>
                                    </tr>
                                    <?php
                                        }
                                        mysqli_free_result($resultadoEnlaces);
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
			$("#generalidades").dataTable({
				"sDom": 'T<"nada">lftrip',
				"sPaginationType": "full_numbers"
			});
		});
		</script>
	</div>
</body>
</html>