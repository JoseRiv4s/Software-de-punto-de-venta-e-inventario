
<?php 
	require_once "../../class/Conexion.php";
	require_once "../../class/Ventas.php";

	$objv= new ventas();

	$c=new conectar();
	$conexion= $c->conexion();	
	$idventa=$_GET['idventa'];

    $sql="SELECT ve.id_venta,
		        ve.fechaCompra,
		        ve.id_cliente,
		        art.nombre,
                art.precio,
                art.descripcion
	    FROM ventas AS ve 
	    INNER JOIN articulos AS art
	    on ve.id_producto=art.id_producto
	    AND ve.id_venta='$idventa'";

    $result=mysqli_query($conexion,$sql);

	$ver=mysqli_fetch_row($result);

	$folio=$ver[0];
	$fecha=$ver[1];
	$idcliente=$ver[2];

?>	

<!DOCTYPE html>
<html>
<head>
<title>factura</title>
<style type="text/css">
		
@page {
        margin-top: 0.3em;
        margin-left: 0.6em;
    }
body{
    font-size: xx-small;
}
</style>

</head>
<body>

 	<p>NOMBRE EMPRESA</p>

 	<p>
 		Fecha: <?php echo $fecha; ?>
 	</p>

 	<p>
 		Folio: <?php echo $folio ?>
 	</p>

 	<p>
 		Cliente: <?php echo $objv->nombreCliente($idcliente); ?>
 	</p>

 		
 	<table style="border-collapse: collapse;" border="1">

 		<tr>

 			<td>Nombre</td>
 			<td>Precio</td>

 		</tr>

 		<?php 
 			$sql="SELECT ve.id_venta,
						ve.fechaCompra,
						ve.id_cliente,
						art.nombre,
					    art.precio,
					    art.descripcion
					FROM ventas AS ve 
					INNER JOIN articulos AS art
					on ve.id_producto=art.id_producto
					AND ve.id_venta='$idventa'";

			$result=mysqli_query($conexion,$sql);
			$total=0;
			while($mostrar=mysqli_fetch_row($result)){
 		?>


 		<tr>

 			<td><?php echo $mostrar[3]; ?></td>
 			<td><?php echo $mostrar[4] ?></td>

 		</tr>


 		<?php
 			$total=$total + $mostrar[4];
 			} 
 		?>

 			<tr>
 			<td>Total: <?php echo "$".$total ?></td>
 			</tr>
            
 	</table>

 		
</body>
</html>
 