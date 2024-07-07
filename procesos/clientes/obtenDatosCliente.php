
<?php 

	require_once "../../class/Conexion.php";
	require_once "../../class/Clientes.php";

	$obj= new clientes();

	echo json_encode($obj->obtenDatosCliente($_POST['idcliente']));

 ?>