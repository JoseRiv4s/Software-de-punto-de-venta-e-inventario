
<?php 


require_once "../../class/Conexion.php";
require_once "../../class/Articulos.php";
$idart=$_POST['idarticulo'];

	$obj=new articulos();

	echo $obj->eliminaArticulo($idart);

 ?>