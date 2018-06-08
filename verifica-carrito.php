<?php include "cms/modulos/conexion.php" ?>
<?php
/* NOTA: REVISAR BASES DE DATOS MAS ABAJO */
session_start();
$varCliente = $_SESSION["IdCliente"];
$varProducto = $_REQUEST["cod_curso"];
$varCantidad = $_REQUEST["cantidad"];
$varAccion = $_REQUEST["proceso"];

// creando sesion
$varOrden = $_SESSION["IdOrden"];

if ($varOrden == "") {
	$IdOrden = Verifica_Pedido($varCliente,$varOrden, $enlace);
} else {
	$IdOrden = $varOrden;
}

switch ($varAccion) {
	case ($varAccion == "Actualizar"):
		ActualizarProductos($varOrden, $varCliente, $enlace);
	case ($varAccion == "Eliminar"):
		EliminarProductos($varOrden, $varCliente, $enlace);
	default:
		if ($varProducto != "") {
			$varOrden = $IdOrden;
			$varExiste = ExisteProducto($varOrden, $varProducto, $enlace);
			if (intval($varExiste) == 1) {
				if ($varCantidad != "") {
					$varOrden = $IdOrden;
					$IdCliente = $varCliente;
					$IdProducto = $varProducto;
					$IdCantidad = $varCantidad;
					ActualizarItem($varOrden,$IdCliente,$IdProducto,$IdCantidad);
				}
			} else {
				$varOrden = $IdOrden;
				$IdCliente = $varCliente;
				$IdProducto = $varProducto;
				$IdCantidad = $varCantidad;
				AgregarItem($varOrden,$IdCliente,$IdProducto,$IdCantidad);
			}
		}
}
/*----------------------------------------------------------------*/
header("Location: carrito-compras.php");
/*----------------------------------------------------------------*/
function Verifica_Pedido($varCliente,$varOrden, $enlace) {
	if ($varCliente != "x") {
		$varOrden = ExistePedidoUsuario($varCliente, $enlace);
	}
	if (($varOrden == "") && ($IdOrden == "")) {
		$IdOrden = GenCodOrden($varCliente);
		$_SESSION["IdOrden"] = $IdOrden;
	} else {
		if (($varOrden == "") && ($IdOrden != "")) {
			$varOrden = $IdOrden;
		} else {
			$_SESSION["IdOrden"] = $varOrden;
		}
	}
	return $IdOrden;
}
/*----------------------------------------------------------------*/
function ExistePedidoUsuario($varCliente, $enlace) {
	$sqlPedido = "select cod_orden from carrito where cod_cliente='$varCliente'";
	/*$rsPedido = mysqli_query(mysqli_connect("localhost","root","", "cietecper"), $sqlPedido);*/
	$rsPedido = mysqli_query(mysqli_connect("localhost","cietecpe_pedro","gY}[Y2viu8v_", "cietecpe_pedro"), $sqlPedido);
	while($rowPedido = mysqli_fetch_array($rsPedido)) {
		$Orden = $rowPedido['cod_orden'];
	}
	$contador = mysqli_num_rows($rsPedido);
	if ($contador  == 0) {
		$Orden = "";
	}
	return $Orden;
}
/*----------------------------------------------------------------*/
function GenCodOrden($varCliente) {
	$date = getdate();

	$hrs = $date['hours'];
	$min = $date['minutes'];
	$sec = $date['seconds'];
	$mon = $date['mon'];
	$day = $date['mday'];
	$yr = $date['year'];

	$intRam = (rand()%100) + 1;
	for ($conti=0;$conti<strlen($varCliente);$conti++) {
		$strIdunico = $strIdunico + substr($varCliente,$conti,1);
	}
	$strIdunico = $strIdunico . '-' . $min . ($yr - $intRam) . $mon . $hrs . $day . $sec;
	return $strIdunico;
}
/*----------------------------------------------------------------*/
function ExisteProducto($varOrden, $varProducto, $enlace) {
	$sqlProducto = "select cod_curso from carrito where cod_orden='$varOrden' and cod_curso='$varProducto'";
	/*$rsProducto = mysqli_query(mysqli_connect("localhost","root","", "cietecper"), $sqlProducto);*/
	$rsProducto = mysqli_query(mysqli_connect("localhost","cietecpe_pedro","gY}[Y2viu8v_", "cietecpe_pedro"), $sqlProducto);
	$contador = mysqli_num_rows($rsProducto);
	if ($contador  == 0) {
		return 0;
	} else {
		return 1;
	}
}
/*----------------------------------------------------------------*/
function AgregarItem($varOrden,$IdCliente,$IdProducto,$IdCantidad) {
	$sql = "INSERT INTO carrito (cod_orden,cod_cliente,cod_curso,cantidad) VALUES('$varOrden','$IdCliente','$IdProducto','$IdCantidad')";
	/*$result = mysqli_query(mysqli_connect("localhost","root","", "cietecper"), $sql);*/
	$result = mysqli_query(mysqli_connect("localhost","cietecpe_pedro","gY}[Y2viu8v_", "cietecpe_pedro"), $sql);
}
/*----------------------------------------------------------------*/
function ActualizarItem($varOrden,$IdCliente,$IdProducto,$IdCantidad) {
	$sql = "UPDATE carrito SET cantidad=cantidad+'$IdCantidad' WHERE cod_orden='$varOrden' AND cod_cliente='$IdCliente' AND cod_curso='$IdProducto'";
	/*$result = mysqli_query(mysqli_connect("localhost","root","", "cietecper"), $sql);*/
	$result = mysqli_query(mysqli_connect("localhost","cietecpe_pedro","gY}[Y2viu8v_", "cietecpe_pedro"), $sql);
}
/*----------------------------------------------------------------*/
function ActualizarProductos($varOrden,$varCliente, $enlace) {
	$sqlProductos = "SELECT cod_curso FROM carrito WHERE cod_orden='$varOrden' AND cod_cliente='$varCliente'";
	/*$rsProductos = mysqli_query(mysqli_connect("localhost","root","", "cietecper"), $sqlProductos);*/
	$rsProductos = mysqli_query(mysqli_connect("localhost","cietecpe_pedro","gY}[Y2viu8v_", "cietecpe_pedro"), $sqlProductos);
	while($rowProductos = mysqli_fetch_array($rsProductos)) {
		$xproducto = $rowProductos['cod_curso'];
		//actualizar
		$codigo = 'txt' . $xproducto;
		if ($_REQUEST[$codigo] != 0) {
				$xcantidad = $_REQUEST[$codigo];
				$sql = "UPDATE carrito SET cantidad='$xcantidad' WHERE cod_orden='$varOrden' AND cod_cliente='$varCliente' AND cod_curso='$xproducto'";
				/*$result = mysqli_query(mysqli_connect("localhost","root","", "cietecper"), $sql);*/
				$result = mysqli_query(mysqli_connect("localhost","cietecpe_pedro","gY}[Y2viu8v_", "cietecpe_pedro"), $sql);
		}
	}
}
/*----------------------------------------------------------------*/
function EliminarProductos($varOrden,$varCliente, $enlace) {
	$sqlProductos = "SELECT cod_curso FROM carrito WHERE cod_orden='$varOrden' AND cod_cliente='$varCliente'";
	/*$rsProductos = mysqli_query(mysqli_connect("localhost","root","", "cietecper"), $sqlProductos);*/
	$rsProductos = mysqli_query(mysqli_connect("localhost","cietecpe_pedro","gY}[Y2viu8v_", "cietecpe_pedro"), $sqlProductos);
	while($rowProductos = mysqli_fetch_array($rsProductos)) {
		$xproducto = $rowProductos['cod_curso'];
		//eliminar
		$codigo = 'chk' . $xproducto;
		if ($_REQUEST[$codigo] == true) {
			$sql = "DELETE FROM carrito WHERE cod_orden='$varOrden' AND cod_cliente='$varCliente' AND cod_curso='$xproducto'";
			/*$result = mysqli_query(mysqli_connect("localhost","root","", "cietecper"), $sql);*/
			$result = mysqli_query(mysqli_connect("localhost","cietecpe_pedro","gY}[Y2viu8v_", "cietecpe_pedro"), $sql);
		}
	}
}
?>