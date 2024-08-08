
<?php 

	class ventas{
		public function obtenDatosProducto($idproducto){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql = "SELECT 
						art.nombre,
						art.descripcion,
						art.cantidad,
						img.ruta,
						art.precio
					FROM
						articulos AS art
							INNER JOIN
						imagenes AS img ON art.id_imagen = img.id_imagen
							AND art.id_producto = '$idproducto'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$d=explode('/', $ver[3]);

			$img=$d[1].'/'.$d[2].'/'.$d[3];

			$data=array(
				'nombre' => $ver[0],
				'descripcion' => $ver[1],
				'cantidad' => $ver[2],
				'ruta' => $img,
				'precio' => $ver[4]
			);		
			return $data;
		}



		public function crearVenta(){
			$c= new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');
			$idventa=self::creaFolio();
			$datos=$_SESSION['tablaComprasTemp'];
			$idusuario=$_SESSION['iduser'];
			$r=0;

			for ($i=0; $i < count($datos) ; $i++) { 
				$d=explode("||", $datos[$i]);

				$sql="INSERT INTO ventas (id_venta,
										id_cliente,
										id_producto,
										id_usuario,
										precio,
										fechaCompra)
								values ('$idventa',
										'$d[5]',
										'$d[0]',
										'$idusuario',
										'$d[3]',
										'$fecha')";
				$r=$r + $result=mysqli_query($conexion,$sql);

				self::descontarArticulo($d[0],1);

			}

			return $r;
		}


		public function descontarArticulo($idproducto,$cantidad){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT cantidad FROM articulos WHERE id_producto='$idproducto'";
			$result=mysqli_query($conexion,$sql);

			$cantidad1=mysqli_fetch_row($result)[0];

			$cantidadNueva=abs($cantidad - $cantidad1);

			$sql="UPDATE articulos SET cantidad='$cantidadNueva' WHERE id_producto='$idproducto'";

			mysqli_query($conexion,$sql);
		}


		public function creaFolio(){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_venta FROM ventas group by id_venta desc";

			$resul=mysqli_query($conexion,$sql);
			$id=mysqli_fetch_row($resul)[0];

			if($id=="" OR $id==null OR $id==0){
				return 1;
			}else{
				return $id + 1;
			}
		}


		public function nombreCliente($idCliente){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT apellido,nombre FROM clientes WHERE id_cliente='$idCliente'";

			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			return $ver[0]." ".$ver[1];
		}

		public function obtenerTotal($idventa){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT precio FROM ventas WHERE id_venta='$idventa'";

			$result=mysqli_query($conexion,$sql);

			$total=0;

			while($ver=mysqli_fetch_row($result)){
				$total=$total + $ver[0];
			}

			return $total;
		}
	}

?>