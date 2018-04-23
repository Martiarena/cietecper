<?php include "cms/modulos/conexion.php" ?>
<?php include "modulos/session-core.php"; ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
	<?php include("includes/head.php"); ?>
	
	<script>
		function ValidarClave() {
	        var valid;
	        valid = Validar();
	        if(valid) {
	            jQuery.ajax({
	                url: "recuperar.php",
	                data:'email='+$("#emailcla").val(),
	                type: "POST",
	                success:function(data){
	                    $("#mail-status").html(data);
	                },
	                error:function (){}
	            });
	        }
	    }

	    function Validar(){
	    	valid = true;
			if(!$("#emailcla").val()) {
            	$("#emailcla").css('background-color','#f2dede');
            	valid = false;
	        }
	        if(!$("#emailcla").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
	            $("#emailcla").css('background-color','#f2dede');
	            valid = false;
	        }
			return valid;
		}
	</script>
</head>
<body id="page-top">
<!-- Outer-wrap -->
<div class="outer-wrap">
	<div class="container">
		<?php $page = "articulos"; include("includes/menu.php"); ?>
		<!-- Right Main Content -->
		<div class="col-md-9 m-right">
			<!-- Page Header -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="page-header">
						<h3><span>Recuperar Clave</span></h3>
						<ul class="bread_crumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><strong>Recuperar Clave</strong></li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Blog Post Content -->
			<div class="row" data-animated="0">
				<div class="col-md-12">
					<div id="m-blog-content">
						<div class="row">
							<div id="contact-form" class="col-md-12">
								<h3 class="titulo">Recuperar Clave</h3>
								<div id="recoverForm">
									<p>Ingrese el email registrado para recibir sus datos de usuario.</p>
									<div class="row">
										<div id="mail-status"></div>
										<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
											<div class="mc-email">
												<input type="email" name="email" id="emailcla" placeholder="Dirección de Email" />
												<span><i class="fa fa-envelope-o"></i></span>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
											<button name="submit" class="btn_green_1" onClick="ValidarClave();">Enviar Clave</button>
										</div>
									</div>
                				</div>
                				<hr>
                				<p><a class="btn-more" href="index.php">&laquo; Volver al inicio</a></p>
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