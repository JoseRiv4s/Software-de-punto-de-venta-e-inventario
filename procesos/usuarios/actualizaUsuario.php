
<?php 

	require_once "../../class/Conexion.php";
	require_once "../../class/Usuarios.php";

	$obj= new usuarios;

	$datos=array(
			$_POST['idUsuario'],  
		    $_POST['nombreU'] , 
		    $_POST['apellidoU'],  
		    $_POST['usuarioU']
				);  
	echo $obj->actualizaUsuario($datos);


?>