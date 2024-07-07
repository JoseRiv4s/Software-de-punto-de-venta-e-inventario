
<?php 

session_start();
	require_once "../../class/Conexion.php";
	require_once "../../class/Clientes.php";

	$obj= new clientes();


	$datos=array(
			$_POST['nombre'],
			$_POST['apellido'],
			$_POST['direccion'],
			$_POST['email'],
			$_POST['telefono'],
			$_POST['rfc']
				);

	echo $obj->agregaCliente($datos);

	
	
 ?>