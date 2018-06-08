<?php include "cms/modulos/conexion.php" ?>
<?php include "modulos/session-core.php"; ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
<?php include("includes/head.php"); ?>
<?php $cod_curso	= $_REQUEST['cod_curso']; ?>
<?php 
	$consultaCurso = "SELECT * FROM cursos WHERE cod_curso='$cod_curso'";
	$ejecutarCurso = mysqli_query($enlaces,$consultaCurso) or die('Consulta fallida: ' . mysqli_error($enlaces));
	$filaArt = mysqli_fetch_array($ejecutarCurso);
		$cod_curso		= $filaArt['cod_curso'];
		$titulo			= $filaArt['titulo'];
		$imagen			= $filaArt['imagen'];
		$ficha 			= $filaArt['ficha_tecnica'];
		$precio_normal	= $filaArt['precio_normal'];
		$descripcion	= $filaArt['descripcion'];
?>
<script>
	function Agregar(){
		document.fcarrito.action="verificar.php";
		valor=document.fcarrito.cantidad.value;
		if(isNaN(valor)||(valor=="")||(valor==0)){
			alert("Insertar una cantidad valida");
			return;
		}
		document.fcarrito.submit();
	}
</script>
</head>
<body id="page-top">
<!-- Outer-wrap -->
<div class="outer-wrap">
	<div class="container">
		<?php $page = "cursos"; include("includes/menu.php"); ?>
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
			<!-- Page Header -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="page-header">
						<h3><span>Cursos</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><a href="cursos.php">Cursos</a></li>
							<li><strong>Curso</strong></li>
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
								<article class="item">
									<h4 style="margin-top:0px !important;"><?php echo $titulo; ?></h4>
									<div class="row">
										<div class="col-lg-5">
											<div class="">
												<div class="mb-thumb">
													<img src="cms/images/productos/<?php echo $imagen; ?>" class="img-responsive img-thumbnail" alt=""/>
												</div>
												<p style="margin-bottom:10px !important;"><strong>Precio:</strong></p>
												<div class="blog-meta precio">
													<span><i class="fa fa-chevron-right"></i> S/. <?php echo number_format($precio_normal,2); ?></span>
												</div>
												<?php if($ficha!=""){?>
												<a class="btn-more btn-attach" href="cms/archivos/<?php echo $ficha; ?>"><i class="fa fa-file-pdf-o"></i> Ver Ficha del Curso</a>
												<?php } ?>
												<?php if($xAlias!=""){ ?>
												<div class="btn-separador">
													<form name="fcarrito" action="" method="post">
														<input type="hidden" name="cod_curso" id="cod_curso" value="<?php echo $cod_curso; ?>" />
														<input type="hidden" name="cantidad" id="cantidad" value="1" />
                            							<a class="btn-more btn-shop" href="javascript:Agregar();"><i class="fa fa-shopping-cart"></i> A&ntilde;adir al Carrito</a>
													</form>
												</div>
												<?php } ?>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="texto-curso">
												<?php echo $descripcion; ?>
											</div>	
										</div>
									</div>
									<hr>
									<p><a class="btn-more" href="cursos.php">&laquo; Volver a Cursos</a></p>	
								</article>
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