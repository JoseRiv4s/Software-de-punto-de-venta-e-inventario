
<?php

    class clientes{
		public function agregaCliente($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$idusuario=$_SESSION['iduser'];

			$sql="INSERT INTO clientes (id_usuario,
										nombre,
										apellido,
										direccion,
										email,
										telefono,
										rfc)
							values ('$idusuario',
									'$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]')";
			return mysqli_query($conexion,$sql);	
		}


		public function obtenDatosCliente($idcliente){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_cliente, 
							nombre,
							apellido,
							direccion,
							email,
							telefono,
							rfc 
				FROM clientes";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
					'id_cliente' => $ver[0], 
					'nombre' => $ver[1],
					'apellido' => $ver[2],
					'direccion' => $ver[3],
					'email' => $ver[4],
					'telefono' => $ver[5],
					'rfc' => $ver[6]
						);
			return $datos;
		}


		public function actualizaCliente($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="UPDATE clientes SET nombre='$datos[1]',
										apellido='$datos[2]',
										direccion='$datos[3]',
										email='$datos[4]',
										telefono='$datos[5]',
										rfc='$datos[6]' 
								WHERE id_cliente='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}


		public function eliminaCliente($idcliente){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="DELETE FROM clientes WHERE id_cliente='$idcliente'";

			return mysqli_query($conexion,$sql);
		}

    }

?>