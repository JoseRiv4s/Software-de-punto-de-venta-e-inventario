
<?php 

	require_once "../../class/Conexion.php";
	require_once "../../class/Clientes.php";

	$obj= new clientes();

	
	echo $obj->eliminaCliente($_POST['idcliente']);
 ?>