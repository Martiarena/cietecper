<?php
session_start();

// Capturar las variables que vienen del detalle de productos
$varProducto = $_POST['cod_curso'];
$varCantidad = $_POST['cantidad'];

// recepcionar la variable de sesion del cliente
$varCliente = $_SESSION['IdCliente'];

if($varCliente==""){
	//creamos una variable de sesion para el producto
	$_SESSION['IdProducto']=$varProducto;
	header("Location: ingreso.php");
}else{
	//Iguala a nada y destruye la variable de sesion
	$_SESSION['IdProducto']="";
	unset($_SESSION['IdProducto']);
	//Enviamos el proceso a verificar carrito
	header("Location:verifica-carrito.php?cod_curso=$varProducto&cantidad=$varCantidad");
}

?>