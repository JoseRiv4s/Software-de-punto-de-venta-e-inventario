
<?php 
	
	require_once "../../class/Conexion.php";
	require_once "../../class/Ventas.php";

	$obj= new ventas();

	echo json_encode($obj->obtenDatosProducto($_POST['idproducto']))

?>