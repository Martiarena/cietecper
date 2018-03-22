<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<?php
		$consultarMet = 'SELECT * FROM metatags';
		$resultadoMet = mysqli_query($enlaces,$consultarMet) or die('Consulta fallida: ' . mysqli_error($enlaces));
		while($filaMet = mysqli_fetch_array($resultadoMet)){
			$xCodigo	= $filaMet['cod_meta'];
			$xTitulo	= utf8_encode($filaMet['title']);
			$xEslogan	= utf8_encode($filaMet['slogan']);
			$xImage		= $filaMet['logo'];
			$xDes		= utf8_encode($filaMet['description']);
			$xKey		= utf8_encode($filaMet['keywords']);
			$xUrl		= $filaMet['url'];
			$xFace1		= $filaMet['face1'];
			$xFace2		= $filaMet['face2'];
			$xIco		= $filaMet['ico'];
	?>
    <title><?php echo $xTitulo; ?> | <?php echo $xEslogan; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $xDes; ?>" />
	<meta name="keywords" content="<?php echo $xKey; ?>" />
	<meta name="author" content="<?php echo $xUrl; ?>" />
	<meta name="DC.title" content="<?php echo $xTitulo; ?> | <?php echo $xEslogan; ?>" />
	<meta name="DC.description" content="<?php echo $xDes; ?>" />
	<meta name="geo.region" content="PE-LIM" />

	<meta property="og:title" content="<?php echo $xTitulo; ?> | <?php echo $xEslogan; ?>" />
	<meta property="og:type" content="Ciencia y Tecnología" />
	<meta property="og:description" content="<?php echo $xDes; ?>" />
	<meta property="og:url" content="<?php echo $xUrl; ?>" />
	<meta property="og:image" content="<?php echo $xUrl; ?>/cms/images/<?php echo $xFace1; ?>" />
	<meta property="og:image" content="<?php echo $xUrl; ?>/cms/images/<?php echo $xFace2; ?>" />

	<!-- Favicons -->
	<link rel="shortcut icon" href="cms/images/meta/<?php echo $xIco; ?>">
	<link rel="apple-touch-icon" href="cms/images/meta/<?php echo $xIco; ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="cms/images/meta/<?php echo $xIco; ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="cms/images/meta/<?php echo $xIco; ?>">
	<link rel="apple-touch-icon" sizes="144x144" href="cms/images/meta/<?php echo $xIco; ?>">
	<?php 
		}
		mysqli_free_result($resultadoMet);
	?>
	<!-- Google Webfonts -->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,300,300italic,400italic,500,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,100,100italic,200,300,300italic,400italic,500,700,900' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="js/easytabs/easy-responsive-tabs.css" rel="stylesheet"/>
    <link href="js/flex-slider/flexslider.css" rel="stylesheet" />
    <link href="css/prettyphoto.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

	<!-- Add custom CSS here -->
	<link href="css/custom.css" rel="stylesheet">

	<!--[if lt IE 9]>
      	<script src="./js/html5shiv.js"></script>
	      <script src="./js/respond.js"></script>
	<![endif]-->
</head>