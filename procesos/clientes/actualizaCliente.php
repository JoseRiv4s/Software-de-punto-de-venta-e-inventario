
<?php 

session_start();
	require_once "../../class/Conexion.php";
	require_once "../../class/Clientes.php";

	$obj= new clientes();


	$datos=array(
			$_POST['idclienteU'],
			$_POST['nombreU'],
			$_POST['apellidosU'],
			$_POST['direccionU'],
			$_POST['emailU'],
			$_POST['telefonoU'],
			$_POST['rfcU']
				);

	echo $obj->actualizaCliente($datos);

	
	
 ?>