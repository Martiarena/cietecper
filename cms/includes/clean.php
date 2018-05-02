<?php
$result = mysqli_query($enlaces,"SELECT logo FROM metatags") or die('Consulta fallida: ' . mysqli_error($enlaces));
while($row = mysqli_fetch_assoc($result)) {
   $do_not_delete[] = "images/meta/".$row['logo'];
}

$result = mysqli_query($enlaces,"SELECT face1 FROM metatags") or die('Consulta fallida: ' . mysqli_error($enlaces));
while($row = mysqli_fetch_assoc($result)) {
   $do_not_delete[] = "images/meta/".$row['face1'];
}

$result = mysqli_query($enlaces,"SELECT face2 FROM metatags") or die('Consulta fallida: ' . mysqli_error($enlaces));
while($row = mysqli_fetch_assoc($result)) {
   $do_not_delete[] = "images/meta/".$row['face2'];
}

$result = mysqli_query($enlaces,"SELECT ico FROM metatags") or die('Consulta fallida: ' . mysqli_error($enlaces));
while($row = mysqli_fetch_assoc($result)) {
   $do_not_delete[] = "images/meta/".$row['ico'];
}

$directory = "images/meta/";
$Meta = glob($directory."*.");
foreach($Meta as $filename) {
    if (!in_array($filename, $do_not_delete)){
		unlink($filename);
	}
}

$result = mysqli_query($enlaces,"SELECT imagen FROM banners") or die('Consulta fallida: ' . mysqli_error($enlaces));
while($row = mysqli_fetch_assoc($result)) {
   $do_not_delete[] = "images/banner/".$row['imagen'];
}

$directory = "images/banner/";
$Banners = glob($directory."*.");
foreach($Banners as $filename) {
    if (!in_array($filename, $do_not_delete)){
		unlink($filename);
	}
}

$result = mysqli_query($enlaces,"SELECT imagen FROM carrusel") or die('Consulta fallida: ' . mysqli_error($enlaces));
while($row = mysqli_fetch_assoc($result)) {
   $do_not_delete[] = "images/carrusel/".$row['imagen'];
}

$directory = "images/carrusel/";
$Carrusel = glob($directory."*.");
foreach($Carrusel as $filename) {
    if (!in_array($filename, $do_not_delete)){
		unlink($filename);
	}
}

$result = mysqli_query($enlaces,"SELECT img_contenido FROM contenidos") or die('Consulta fallida: ' . mysqli_error($enlaces));
while($row = mysqli_fetch_assoc($result)) {
   $do_not_delete[] = "images/nosotros/".$row['img_contenido'];
}

$directory = "images/nosotros/";
$Nosotros = glob($directory."*.");
foreach($Nosotros as $filename) {
    if (!in_array($filename, $do_not_delete)){
		unlink($filename);
	}
}

$result = mysqli_query($enlaces,"SELECT imagen FROM noticias") or die('Consulta fallida: ' . mysqli_error($enlaces));
while($row = mysqli_fetch_assoc($result)) {
   $do_not_delete[] = "images/noticias/".$row['imagen'];
}

$directory = "images/noticias/";
$Noticias = glob($directory."*.");
foreach($Noticias as $filename) {
    if (!in_array($filename, $do_not_delete)){
		unlink($filename);
	}
}

$result = mysqli_query($enlaces,"SELECT imagen FROM productos") or die('Consulta fallida: ' . mysqli_error($enlaces));
while($row = mysqli_fetch_assoc($result)) {
   $do_not_delete[] = "images/productos/".$row['imagen'];
}

$directory = "images/productos/";
$Productos = glob($directory."*.");
foreach($Productos as $filename) {
    if (!in_array($filename, $do_not_delete)){
		unlink($filename);
	}
}


$result = mysqli_query($enlaces,"SELECT ficha_tecnica FROM productos") or die('Consulta fallida: ' . mysqli_error($enlaces));
while($row = mysqli_fetch_assoc($result)) {
   $do_not_delete[] = "archivos/".$row['ficha_tecnica'];
}

$directory = "archivos/";
$Archivos = glob($directory."*.");
foreach($Archivos as $filename) {
    if (!in_array($filename, $do_not_delete)){
		unlink($filename);
	}
}

?>