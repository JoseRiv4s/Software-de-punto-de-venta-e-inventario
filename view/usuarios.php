
<?php 

    session_start();

    if(isset($_SESSION['usuario']) and $_SESSION['usuario']=='admin'){
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>

    <?php  require_once"menu.php"; ?>

</head>
<body>
    

    <div class="container">
        <h1>Administrar Usuarios</h1>

        <div class="row">

            <div class="col-sm-4">

                <form id="frmRegistro">

                    <label>Nombre </label>
                    <input type="text" class="form-control input-sm" name="nombre" id="nombre">

                    <label>Apellido</label>
                    <input type="text" class="form-control input-sm" name="apellido" id="apellido">

                    <label>Usuario</label>
                    <input type="text" class="form-control input-sm" name="usuario" id="usuario">

                    <label>Password</label>
                    <input type="text" class="form-control input-sm" name="password" id="password">

                    <p></p>
                    <span class="btn btn-primary" id="registro">Registrar</span>

                </form>

            </div>

            <div class="col-sm-8">

                <div id="tablaUsuariosLoad"></div>

            </div>

        </div>

    </div>


    <!-- Modal para cambiar el dato de usuarios -->
    <div class="modal fade" id="actualizaUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-sm" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">ACTUALIZA USUARIO</h4>
                </div>

                <div class="modal-body">

                    <form id="frmRegistroU">

                        <input type="text" hidden="" id="idUsuario" name="idUsuario">

                        <label>Nombre </label>
                        <input type="text" class="form-control input-sm" name="nombreU" id="nombreU">

                        <label>Apellido</label>
                        <input type="text" class="form-control input-sm" name="apellidoU" id="apellidoU">

                        <label>Usuario</label>
                        <input type="text" class="form-control input-sm" name="usuarioU" id="usuarioU">


                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" id="btnActualizaUsuario" class="btn btn-warning" data-dismiss="modal">Actuliaza Usuario</button>
                </div>

            </div>

        </div>

    </div>


</body>
</html>


<script type="text/javascript">
	function agregaDatosUsuario(idusuario){

		$.ajax({
			type:"POST",
			data:"idusuario=" + idusuario,
			url:"../procesos/usuarios/obtenDatosUsuario.php",
			success:function(r){
				dato=jQuery.parseJSON(r);

				$('#idUsuario').val(dato['id_usuario']);
				$('#nombreU').val(dato['nombre']);
				$('#apellidoU').val(dato['apellido']);
				$('#usuarioU').val(dato['email']);
			}
		});
	}

	function eliminarUsuario(idusuario){
		alertify.confirm('¿Desea eliminar este usuario?', function(){ 
			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"../procesos/usuarios/eliminarUsuario.php",
				success:function(r){
					if(r==1){
						$('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
						alert("Eliminado con exito");
					}else{
						alert("No se pudo eliminar");
					}
				}
			});
		}, function(){ 
			alert('Cancelo !')
		});
	}


</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnActualizaUsuario').click(function(){

			datos=$('#frmRegistroU').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/usuarios/actualizaUsuario.php",
				success:function(r){

					if(r==1){
						$('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
						alertify.success("Actualizado");
					}else{
						alertify.error("No se pudo actualizar");
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){

		$('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');

		$('#registro').click(function(){

			vacios=validarFormVacio('frmRegistro');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/regLogin/registrarUsuario.php",
				success:function(r){
					//alert(r);

					if(r==1){
						$('#frmRegistro')[0].reset();
						$('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
						alert("Agregado con exito");
					}else{
						alert("Fallo al agregar :(");
					}
				}
			});
		});
	});
</script>


<?php 

    }else{
        header("location:../index.php");
    }

?>